<div class="max-w-5xl mx-auto glass p-8 rounded-3xl bg-white/70 dark:bg-slate-800/60">

<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT') @method('PUT') @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        {{-- CỘT TRÁI: THÔNG TIN --}}
        <div class="md:col-span-2 space-y-5">

            <div>
                <label class="font-semibold text-sm">Tên sản phẩm</label>
                <input name="name"
                       value="{{ old('name', $book->name ?? '') }}"
                       class="w-full mt-1 px-4 py-2 rounded-lg border focus:ring-2 focus:ring-brown-primary">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="font-semibold text-sm">Danh mục</label>
                    <select name="category_id"
                            class="w-full mt-1 px-4 py-2 rounded-lg border">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}"
                                @selected(old('category_id', $book->category_id ?? '') == $cat->id)>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="font-semibold text-sm">
                        Tác giả
                        <span class="text-red-500">*</span>
                    </label>

                    <select name="author_id"
                        class="w-full mt-1 px-4 py-2 rounded-lg border
                            focus:ring-2 focus:ring-brown-primary">

                        <option value="">-- Chọn tác giả --</option>

                        @foreach($authors as $author)
                            <option value="{{ $author->id }}"
                                @selected(old('author_id', $book->author_id ?? '') == $author->id)>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="font-semibold text-sm">Giá</label>
                    <input type="number" name="price"
                           value="{{ old('price', $book->price ?? 0) }}"
                           class="w-full mt-1 px-4 py-2 rounded-lg border">
                </div>
            </div>

            <div>
                <label class="font-semibold text-sm">Số lượng tồn kho</label>
                <input type="number" name="quantity"
                       value="{{ old('quantity', $book->quantity ?? 0) }}"
                       class="w-full mt-1 px-4 py-2 rounded-lg border">
            </div>
        </div>

        {{-- CỘT PHẢI: HÌNH ẢNH --}}
        <div class="space-y-6">

            {{-- ẢNH ĐẠI DIỆN --}}
            <div>
                <label class="font-semibold text-sm block mb-2">
                    Ảnh đại diện
                </label>

                <input type="file" name="image"
                    class="w-full px-3 py-2 border rounded-lg">

                @if(isset($book) && $book->image)
                    <img src="{{ asset('storage/'.$book->image) }}"
                        class="mt-3 w-full h-48 object-contain rounded-lg border bg-white">
                @endif
            </div>


            {{-- ẢNH CHI TIẾT --}}
            <div>
                <label class="font-semibold text-sm block mb-2">
                    Ảnh chi tiết (có thể chọn nhiều)
                </label>

                <input type="file" name="images[]"
                    multiple
                    class="w-full px-3 py-2 border rounded-lg">

                @if(isset($book) && $book->images->count())
                    <div class="grid grid-cols-3 gap-2 mt-3">
                        @foreach($book->images as $img)
                            <img src="{{ asset('storage/'.$img->image_path) }}"
                                class="h-24 w-full object-cover rounded border">
                        @endforeach
                    </div>
                @endif
            </div>


        </div>
    </div>

    {{-- ACTION --}}
    <div class="mt-8 flex justify-end gap-3">
        <a href="{{ route('admin.books.index') }}"
           class="px-5 py-2 border rounded-lg">
            Hủy
        </a>

        <button class="px-6 py-2 bg-brown-primary text-white rounded-lg font-bold">
            Lưu sản phẩm
        </button>
    </div>

</form>
</div>
