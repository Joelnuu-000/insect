<?php // organization.php ?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>組織架構 - 鱗的執行人 | 台大昆蟲營</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-50 text-stone-800 pt-20">
    <?php include 'navbar.php'; ?>

    <main class="max-w-6xl mx-auto px-4 py-16">
        <h1 class="text-4xl font-black text-center mb-4">工作團隊</h1>
        <p class="text-center text-stone-500 mb-16">由台大昆蟲系學生自發組成，最專業的生態營隊團隊</p>

        <div class="flex justify-center mb-16">
            <div class="bg-white p-8 rounded-3xl shadow-xl border-2 border-emerald-500 text-center w-64">
                <div class="w-24 h-24 bg-stone-200 rounded-full mx-auto mb-4 overflow-hidden">
                    <img src="https://ui-avatars.com/api/?name=Leader&background=10b981&color=fff" class="w-full">
                </div>
                <h3 class="text-xl font-bold">總召集人</h3>
                <p class="text-emerald-600 font-bold">王小明</p>
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <?php 
            $teams = ['課程組', '活動組', '生活組', '總務組'];
            foreach($teams as $team): 
            ?>
            <div class="bg-white p-6 rounded-2xl shadow-sm text-center border border-stone-100">
                <h4 class="text-lg font-bold text-stone-800 mb-2"><?= $team ?></h4>
                <p class="text-sm text-stone-500">負責該組別規劃與執行</p>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-20 bg-white p-10 rounded-3xl text-centernter shadow-lg border border-emerald-100">
            <h3 class="text-xl font-bold mb-4 italic">「為了這三天，我們準備了半年。」</h3>
            <p class="text-stone-500">2026 台大昆蟲營籌備委員會</p>
        </div>
    </main>
</body>
</html>