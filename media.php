<?php // media.php ?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>媒體中心 - 鱗的執行人 | 台大昆蟲營</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-50 text-stone-800 pt-20">
    <?php include 'navbar.php'; ?>

    <main class="max-w-6xl mx-auto px-4 py-12">
        <h1 class="text-4xl font-black text-center mb-12">活動影像紀錄</h1>
        
        <div class="mb-20">
            <h2 class="text-2xl font-bold mb-6 border-l-4 border-emerald-500 pl-4">精選影片</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="aspect-video bg-black rounded-2xl overflow-hidden shadow-lg">
                    <iframe class="w-full h-full" src="https://www.youtube.com/embed/_aSBiOmaALA" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="bg-emerald-900 p-8 rounded-2xl text-white flex flex-col justify-center">
                    <h3 class="text-2xl font-bold mb-4">鱗的執行人：宣傳預告</h3>
                    <p class="opacity-80">透過鏡頭，我們記錄下昆蟲最真實的擬態瞬間。這不僅是一場營隊，更是一場視覺與科學的盛宴。</p>
                </div>
            </div>
        </div>

        <div>
            <h2 class="text-2xl font-bold mb-6 border-l-4 border-emerald-500 pl-4">精彩瞬間</h2>
            <div class="columns-1 md:columns-2 lg:columns-3 gap-4 space-y-4">
                <div class="break-inside-avoid"><img src="IMG_1859.jpg" class="w-full rounded-xl shadow hover:scale-[1.02] transition"></div>
                <div class="break-inside-avoid"><img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=600" class="w-full rounded-xl shadow hover:scale-[1.02] transition"></div>
                <div class="break-inside-avoid"><img src="https://images.unsplash.com/photo-1544383835-bca2bc6f5ea3?q=80&w=600" class="w-full rounded-xl shadow hover:scale-[1.02] transition"></div>
            </div>
        </div>
    </main>
</body>
</html>