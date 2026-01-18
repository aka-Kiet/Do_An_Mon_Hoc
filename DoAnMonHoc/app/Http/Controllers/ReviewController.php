<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\Order;
use App\Models\Book;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validate dữ liệu đầu vào
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:10|max:1000',
        ], [
            'rating.required' => 'Vui lòng chọn số sao đánh giá.',
            'comment.required' => 'Vui lòng nhập nội dung đánh giá.'
        ]);

        $user = Auth::user();
        $bookId = $request->book_id;

        // 2. KIỂM TRA ĐIỀU KIỆN MUA HÀNG
        // Tìm xem user này có đơn hàng nào chứa cuốn sách này 
        // VÀ trạng thái đơn hàng là 'completed' (hoặc 'delivered' tùy database của bạn)
        $hasPurchased = Order::where('user_id', $user->id)
            ->where('status', 'completed') // <-- QUAN TRỌNG: Phải là trạng thái đã giao thành công
            ->whereHas('items', function($query) use ($bookId) {
                $query->where('book_id', $bookId);
            })
            ->exists();

        if (!$hasPurchased) {
            return back()->with('error', 'Bạn phải mua sách này thành công mới được đánh giá.');
        }

        // 3. Kiểm tra xem đã đánh giá chưa (Tránh spam 1 người review nhiều lần cho 1 sách)
        $existingReview = Review::where('user_id', $user->id)
                                ->where('book_id', $bookId)
                                ->first();

        if ($existingReview) {
            return back()->with('error', 'Bạn đã đánh giá sản phẩm này rồi.');
        }

        // 4. Lưu đánh giá
        Review::create([
            'user_id' => $user->id,
            'book_id' => $bookId,
            'rating'  => $request->rating,
            'comment' => $request->comment,
            'is_active' => true, // Mặc định hiện luôn, hoặc để false nếu cần duyệt
        ]);

        // 5. CẬP NHẬT LẠI ĐIỂM SỐ CHO SÁCH (Để sort và hiển thị nhanh hơn)
        $book = Book::find($bookId);
        $avgRating = Review::where('book_id', $bookId)->where('is_active', true)->avg('rating');
        $totalReviews = Review::where('book_id', $bookId)->where('is_active', true)->count();
        
        $book->avg_rating = round($avgRating, 1);
        $book->total_reviews = $totalReviews;
        $book->save();

        return back()->with('success', 'Cảm ơn bạn đã đánh giá sản phẩm!');
    }
}
