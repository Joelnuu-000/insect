<?php
// index.php
$db_file = __DIR__ . '/camp_data.sqlite';
$texts = [];
try {
    $pdo = new PDO('sqlite:' . $db_file);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $check = $pdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name='site_texts'");
    if ($check->fetch()) { $texts = $pdo->query("SELECT * FROM site_texts")->fetchAll(PDO::FETCH_KEY_PAIR); }
} catch (PDOException $e) {}

// 輔助函式
function get_c($key, $default, $texts) {
    return isset($texts[$key]) && !empty($texts[$key]) ? htmlspecialchars($texts[$key]) : $default;
}
?>
<!DOCTYPE html>
<html lang="zh-TW" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>臺大昆蟲研習營</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-50 text-stone-800 font-sans antialiased pt-20">

    <?php include 'navbar.php'; ?>

    <header class="relative w-full h-[60vh] overflow-hidden bg-stone-900">
        <img src="IMG_1859.jpg" class="w-full h-full object-cover opacity-60">
        <div class="absolute inset-0 flex flex-col items-center justify-center text-white px-4">
            <span class="bg-emerald-600 text-white px-4 py-1 rounded-full text-sm font-bold mb-6 tracking-widest shadow-lg">
                <?= get_c('index_hero_badge', '2026 SUMMER CAMP', $texts) ?>
            </span>
            <h1 class="text-5xl md:text-7xl font-black mb-6 tracking-wider text-center drop-shadow-lg">
                <?= get_c('index_hero_title', '鱗的執行人', $texts) ?>
            </h1>
            <p class="text-xl md:text-3xl font-medium drop-shadow-md">
                <?= get_c('index_hero_sub', '臺大昆蟲研習營，今年夏天等你來挑戰！', $texts) ?>
            </p>
        </div>
    </header>

    <main class="w-full">
        <section class="max-w-5xl mx-auto px-4 py-20">
            <div class="text-center mb-10">
                <h2 class="text-4xl font-black text-emerald-800 mb-4">營隊精彩紀錄</h2>
                <div class="w-24 h-1 bg-emerald-500 mx-auto rounded-full"></div>
            </div>
            <div class="aspect-video bg-stone-900 rounded-3xl overflow-hidden shadow-2xl relative border-4 border-white">
                <iframe class="w-full h-full absolute inset-0" src="https://www.youtube.com/embed/_aSBiOmaALA?si=W1hMRwbgVuMhXFRh" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </section>

        <section class="bg-white py-20">
            <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
                <div class="rounded-3xl overflow-hidden shadow-xl aspect-square md:aspect-auto h-full">
                    <img src="https://images.unsplash.com/photo-1544383835-bca2bc6f5ea3?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover">
                </div>
                <div class="space-y-6">
                    <div class="inline-block bg-emerald-100 text-emerald-800 font-bold px-4 py-1 rounded-full text-sm">什麼是昆蟲營？</div>
                    <h2 class="text-4xl font-black text-stone-800 leading-tight">
                        <?= nl2br(get_c('s1_title', "走進大自然\n發掘微觀世界的奧秘", $texts)) ?>
                    </h2>
                    <p class="text-lg text-stone-600 leading-relaxed">
                        <?= nl2br(get_c('s1_desc', "臺大昆蟲營是由國立台灣大學昆蟲學系主辦的暑期營隊。在這裡，我們不只是坐在教室裡聽課，更會帶領大家走入森林、溪流，親手觸摸泥土...", $texts)) ?>
                    </p>
                </div>
            </div>
        </section>

        <section class="bg-emerald-50 py-20">
            <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
                <div class="space-y-6 md:order-1 order-2">
                    <div class="inline-block bg-emerald-600 text-white font-bold px-4 py-1 rounded-full text-sm">我們的特色</div>
                    <h2 class="text-4xl font-black text-emerald-900 leading-tight">
                        <?= nl2br(get_c('s2_title', "培養科學素養\n從做中學的實踐教育", $texts)) ?>
                    </h2>
                    <p class="text-lg text-stone-700 leading-relaxed">
                        <?= nl2br(get_c('s2_desc', "臺大昆蟲營透過的密集課程，讓學員體驗大學等級的學術環境。我們結合了學術知識、實地採集與團康遊戲...", $texts)) ?>
                    </p>
                </div>
                <div class="rounded-3xl overflow-hidden shadow-xl aspect-square md:aspect-auto h-full md:order-2 order-1">
                    <img src="https://images.unsplash.com/photo-1600204732101-b8ea4609873a?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover">
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-stone-900 text-stone-400 py-12 text-center">
        <p>&copy; 2026 國立台灣大學昆蟲研習營. All rights reserved.</p>
    </footer>
</body>
</html>