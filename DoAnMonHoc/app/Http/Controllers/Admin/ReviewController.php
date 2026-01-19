<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review; 
use App\Models\Book;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        // Eager load 'user' và 'book' (Model Review của bạn khai báo relation là function book())
        $reviews = Review::with(['user', 'book']) 
            ->when($keyword, function ($query, $keyword) {
                // Tìm kiếm trong cột 'comment' (Model Review dùng cột comment, không phải content)
                return $query->where('comment', 'like', "%{$keyword}%");
            })
            ->latest()
            ->paginate(10);

        return view('admin.reviews.index', compact('reviews', 'keyword'));
    }

    public function destroy($id)
    {
        $review = Review::find($id);
        
        if ($review) {
            $bookId = $review->book_id;
            
            // 1. Xóa review
            $review->delete();

            // 2. TÍNH TOÁN LẠI ĐIỂM SỐ CHO SÁCH (Cực kỳ quan trọng khi xóa admin)
            // Nếu xóa review 1 sao hoặc 5 sao thì điểm trung bình sẽ thay đổi
            $this->recalculateBookRating($bookId);

            return redirect()->back()->with('success', 'Đã xóa đánh giá thành công.');
        }

        return redirect()->back()->with('error', 'Không tìm thấy đánh giá.');
    }

    public function bulkDelete(Request $request)
    {
        $reviewIds = $request->input('review_ids'); // Đổi tên input cho đúng ngữ cảnh
        
        if ($reviewIds) {
            // Lấy danh sách book_id bị ảnh hưởng trước khi xóa để tính lại điểm
            $affectedBookIds = Review::whereIn('id', $reviewIds)->pluck('book_id')->unique();

            Review::whereIn('id', $reviewIds)->delete();

            // Tính lại điểm cho các sách bị ảnh hưởng
            foreach ($affectedBookIds as $bookId) {
                $this->recalculateBookRating($bookId);
            }

            return redirect()->back()->with('success', 'Đã xóa các đánh giá đã chọn.');
        }
        return redirect()->back()->with('error', 'Vui lòng chọn đánh giá để xóa.');
    }

    // Hàm phụ để tính lại điểm rating (Tái sử dụng code bên Frontend Controller của bạn)
    private function recalculateBookRating($bookId)
    {
        $book = Book::find($bookId);
        if ($book) {
            $avgRating = Review::where('book_id', $bookId)->where('is_active', true)->avg('rating');
            $totalReviews = Review::where('book_id', $bookId)->where('is_active', true)->count();
            
            $book->avg_rating = $avgRating ? round($avgRating, 1) : 0;
            $book->total_reviews = $totalReviews;
            $book->save();
        }
    }
}