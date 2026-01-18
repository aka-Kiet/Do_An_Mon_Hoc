<div class="max-w-xl glass p-6 rounded-3xl bg-white/50 dark:bg-slate-800/50">
<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT') @method('PUT') @endif

    <label>Hình ảnh sản phẩm</label>
    <input type="file" name="image" class="w-full mb-3 px-4 py-2 rounded border">

    @if(isset($book) && $book->image)
        <div class="mb-4">
            <img src="{{ asset('storage/' . $book->image) }}"
                 alt="{{ $book->name }}"
                 class="w-32 h-32 object-cover rounded">
        </div>
    @endif

    <label>Tên sản phẩm</label>
    <input name="name"
           value="{{ old('name', $book->name ?? '') }}"
           class="w-full mb-3 px-4 py-2 rounded border">

    <label>Danh mục</label>
    <select name="category_id" class="w-full mb-3 px-4 py-2 rounded border">
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}"
                @selected(old('category_id', $book->category_id ?? '') == $cat->id)>
                {{ $cat->name }}
            </option>
        @endforeach
    </select>

    <label>Giá</label>
    <input type="number" name="price"
           value="{{ old('price', $book->price ?? 0) }}"
           class="w-full mb-3 px-4 py-2 rounded border">

    <label>Số lượng</label>
    <input type="number" name="quantity"
           value="{{ old('quantity', $book->quantity ?? 0) }}"
           class="w-full mb-4 px-4 py-2 rounded border">

    <button class="px-5 py-2 bg-brown-primary text-white rounded font-bold">
        Lưu
    </button>
</form>
</div>
