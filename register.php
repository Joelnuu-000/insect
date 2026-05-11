<?php
// register.php

$status_message = "";

// 處理表單送出邏輯
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 取得並過濾輸入資料 (基礎資安防護)
    $student_name = htmlspecialchars($_POST['student_name'] ?? '');
    $parent_name = htmlspecialchars($_POST['parent_name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    
    // 這裡可以加入寫入 MySQL 資料庫或寄送 Email 的邏輯
    // ...

    // 模擬成功送出的訊息
    $status_message = "
        <div class='bg-emerald-100 text-emerald-800 border-2 border-emerald-200 p-6 rounded-2xl mb-8 text-center shadow-sm animate-[fadeIn_0.5s_ease-in-out]'>
            <div class='text-4xl mb-2'>🎉</div>
            <h3 class='text-xl font-bold mb-2'>報名資料已成功送出！</h3>
            <p class='text-emerald-700'>我們已收到 <strong>{$student_name}</strong> 同學的報名申請。<br>系統已發送確認信至 <strong>{$email}</strong>，請留意您的信箱。</p>
        </div>
    ";
}
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>報名專區 - 台大昆蟲營</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-50 text-stone-800 font-sans antialiased pt-24 min-h-screen flex flex-col">

    <?php include 'navbar.php'; ?>

    <main class="flex-grow max-w-4xl mx-auto w-full px-4 py-12">
        
        <div class="text-center mb-10">
            <span class="inline-block bg-emerald-600 text-white font-bold px-4 py-1 rounded-full text-sm mb-4 tracking-wider">JOIN US</span>
            <h1 class="text-4xl md:text-5xl font-black text-stone-800 mb-4">2026 夏令營報名</h1>
            <p class="text-lg text-stone-600">請仔細填寫下方報名資訊，名額有限，額滿為止！</p>
        </div>

        <?= $status_message ?>

        <?php if ($_SERVER['REQUEST_METHOD'] !== 'POST'): ?>
        
        <form action="register.php" method="POST" class="bg-white p-8 md:p-12 rounded-3xl shadow-xl border border-stone-100 space-y-10">
            
            <section>
                <h2 class="text-2xl font-bold text-emerald-800 border-b-2 border-emerald-100 pb-2 mb-6 flex items-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    學員基本資料
                </h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-stone-700 mb-2">學員姓名 <span class="text-red-500">*</span></label>
                        <input type="text" name="student_name" required class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 outline-none transition">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-stone-700 mb-2">生理性別 <span class="text-red-500">*</span></label>
                        <select name="gender" required class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 outline-none transition">
                            <option value="">請選擇</option>
                            <option value="male">男</option>
                            <option value="female">女</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-stone-700 mb-2">身分證字號 <span class="text-red-500">*</span> <span class="text-xs font-normal text-stone-400">(辦理保險用)</span></label>
                        <input type="text" name="id_number" required pattern="^[A-Z][1-2]\d{8}$" title="請輸入正確的身份證字號格式" class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 outline-none transition">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-stone-700 mb-2">出生年月日 <span class="text-red-500">*</span></label>
                        <input type="date" name="birthday" required class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 outline-none transition">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-stone-700 mb-2">就讀學校與年級 <span class="text-red-500">*</span></label>
                        <input type="text" name="school_grade" placeholder="例如：台北市建國中學 一年級" required class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 outline-none transition">
                    </div>
                </div>
            </section>

            <section>
                <h2 class="text-2xl font-bold text-emerald-800 border-b-2 border-emerald-100 pb-2 mb-6 flex items-center gap-2 mt-10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    家長與聯絡資訊
                </h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-stone-700 mb-2">家長/監護人姓名 <span class="text-red-500">*</span></label>
                        <input type="text" name="parent_name" required class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 outline-none transition">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-stone-700 mb-2">聯絡電話 (手機) <span class="text-red-500">*</span></label>
                        <input type="tel" name="phone" required pattern="^09\d{8}$" title="請輸入正確的手機號碼 (例如: 0912345678)" class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 outline-none transition">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-stone-700 mb-2">電子信箱 Email <span class="text-red-500">*</span> <span class="text-xs font-normal text-stone-400">(將寄送錄取通知與行前須知)</span></label>
                        <input type="email" name="email" required class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 outline-none transition">
                    </div>
                </div>
            </section>

            <section>
                <h2 class="text-2xl font-bold text-emerald-800 border-b-2 border-emerald-100 pb-2 mb-6 flex items-center gap-2 mt-10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    營隊選項調查
                </h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-stone-700 mb-2">飲食習慣 <span class="text-red-500">*</span></label>
                        <select name="diet" required class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 outline-none transition">
                            <option value="">請選擇</option>
                            <option value="meat">葷食</option>
                            <option value="veg">素食 (蛋奶素)</option>
                            <option value="vegan">全素</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-stone-700 mb-2">營服尺寸 (T-shirt) <span class="text-red-500">*</span></label>
                        <select name="shirt_size" required class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 outline-none transition">
                            <option value="">請選擇</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="2XL">2XL</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-stone-700 mb-2">特殊疾病或過敏史 (選填)</label>
                        <textarea name="medical_history" rows="3" placeholder="例如：氣喘、對堅果過敏、蠶豆症等，若無則免填。" class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 outline-none transition"></textarea>
                    </div>
                </div>
            </section>

            <div class="pt-6 border-t border-stone-100">
                <button type="submit" class="w-full md:w-auto md:px-16 bg-emerald-600 text-white text-lg font-bold py-4 rounded-xl hover:bg-emerald-700 transition shadow-lg hover:shadow-xl hover:-translate-y-1 block mx-auto">
                    確認送出報名表
                </button>
                <p class="text-center text-sm text-stone-400 mt-4">點擊送出即表示您同意本營隊之個人資料蒐集與隱私權政策</p>
            </div>

        </form>
        
        <?php endif; ?>

    </main>

    <footer class="bg-stone-900 text-stone-400 py-8 text-center mt-auto">
        <p>&copy; 2026 國立台灣大學昆蟲研習營. All rights reserved.</p>
    </footer>

</body>
</html>