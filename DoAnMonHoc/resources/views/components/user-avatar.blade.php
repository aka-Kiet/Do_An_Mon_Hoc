@props(['name' => 'User', 'class' => 'w-10 h-10 text-sm'])

@php
    // 1. Xử lý lấy 2 chữ cái đầu (VD: "Nguyễn Văn A" -> "NA", "Admin" -> "AD")
    $name = trim($name);
    $words = explode(' ', $name);
    
    if (count($words) >= 2) {
        // Lấy chữ cái đầu của từ đầu tiên và từ cuối cùng
        $initials = mb_substr($words[0], 0, 1) . mb_substr(end($words), 0, 1);
    } else {
        // Nếu tên chỉ có 1 từ, lấy 2 ký tự đầu
        $initials = mb_substr($name, 0, 2);
    }
    $initials = strtoupper($initials);

    // 2. Xử lý màu background ngẫu nhiên nhưng cố định theo tên
    // (Tên giống nhau sẽ luôn ra màu giống nhau)
    $colors = [
        'bg-red-500', 'bg-orange-500', 'bg-amber-500', 
        'bg-green-600', 'bg-emerald-500', 'bg-teal-500',
        'bg-cyan-600', 'bg-blue-600', 'bg-indigo-500', 
        'bg-violet-600', 'bg-fuchsia-600', 'bg-pink-600', 'bg-rose-600'
    ];
    
    // Hàm crc32 biến chuỗi thành số nguyên -> chia lấy dư để chọn màu
    $colorIndex = crc32($name) % count($colors);
    $bgColor = $colors[$colorIndex];
@endphp

{{-- Hiển thị --}}
<div class="{{ $class }} rounded-full {{ $bgColor }} text-white flex items-center justify-center font-bold shadow-md select-none shrink-0">
    {{ $initials }}
</div>