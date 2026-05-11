<?php // department.php ?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>關於台大昆蟲系 - 鱗的執行人 | 台大昆蟲營</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-stone-800 pt-20">
    <?php include 'navbar.php'; ?>

    <main class="max-w-4xl mx-auto px-4 py-16">
        <div class="bg-emerald-50 rounded-[3rem] p-12 mb-16 flex flex-col md:flex-row items-center gap-12">
            <div class="md:w-1/3">
                <img src="https://www.entomol.ntu.edu.tw/wp-content/uploads/2021/01/logo.png" class="w-full grayscale hover:grayscale-0 transition">
            </div>
            <div class="md:w-2/3">
                <h1 class="text-4xl font-black text-emerald-900 mb-6">國立臺灣大學<br>昆蟲學系</h1>
                <p class="text-lg leading-relaxed text-emerald-800">
                    本系為全台灣唯二擁有完整昆蟲學教育體制的學系。從分子生物、生態演化到植物保護，我們致力於探索節肢動物的奧秘。
                </p>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-12">
            <div>
                <h3 class="text-2xl font-bold mb-4">學術實力</h3>
                <p class="text-stone-600">本系擁有多座專業實驗室、昆蟲標本館，館藏超過數十萬件標本，是亞洲重要的分類學研究中心。</p>
            </div>
            <div>
                <h3 class="text-2xl font-bold mb-4">社會責任</h3>
                <p class="text-stone-600">透過每年舉辦的昆蟲週與昆蟲營，我們將艱深的科學知識轉化為普羅大眾都能理解的生態教育。</p>
            </div>
        </div>
    </main>
</body>
</html>