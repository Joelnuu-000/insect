<?php
// faq.php

// 1. 連接後台建立的 SQLite 資料庫
$db_file = __DIR__ . '/camp_data.sqlite';

try {
    $pdo = new PDO('sqlite:' . $db_file);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // 2. 從資料庫讀取所有 FAQ (依照建立時間倒序，新的在最上面)
    // 加上表單存在的檢查，避免剛開始完全沒有建立資料庫時報錯
    $stmt = $pdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name='faqs'");
    if ($stmt->fetch()) {
        $faqs = $pdo->query("SELECT * FROM faqs ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $faqs = [];
    }
} catch (PDOException $e) {
    // 發生錯誤時給予空陣列
    $faqs = [];
}
?>
<!DOCTYPE html>
<html lang="zh-TW" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>常見問題 (FAQ) - 台大昆蟲營</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .accordion-content {
            transition: max-height 0.3s ease-out, padding 0.3s ease, opacity 0.3s ease;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
        }
        .accordion-content.open {
            max-height: 800px; /* 足夠容納長篇文字的高度 */
            opacity: 1;
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .chevron {
            transition: transform 0.3s ease;
        }
        .chevron.open {
            transform: rotate(180deg);
        }
    </style>
</head>
<body class="bg-stone-50 text-stone-800 font-sans antialiased pt-24 min-h-screen flex flex-col">

    <?php include 'navbar.php'; ?>

    <main class="flex-grow max-w-4xl mx-auto w-full px-4 py-12">
        
        <div class="text-center mb-16">
            <div class="inline-block bg-emerald-100 text-emerald-800 font-bold px-4 py-1 rounded-full text-sm mb-4">有疑問嗎？</div>
            <h1 class="text-4xl md:text-5xl font-black text-stone-800 mb-6 tracking-wide">常見問題 <span class="text-emerald-600">FAQ</span></h1>
            <p class="text-lg text-stone-600">我們整理了營隊最常被問到的問題，報名前請務必詳閱！</p>
        </div>

        <div class="space-y-4">
            <?php if (empty($faqs)): ?>
                <div class="bg-white border border-stone-200 rounded-2xl shadow-sm p-10 text-center text-stone-500">
                    目前還沒有常見問題，請至 <a href="admin.php" class="text-emerald-600 font-bold hover:underline">後台管理系統</a> 新增資料。
                </div>
            <?php else: ?>
                <?php foreach ($faqs as $faq): ?>
                <div class="bg-white border border-stone-200 rounded-2xl shadow-sm overflow-hidden group">
                    <button class="accordion-button w-full flex justify-between items-center p-6 text-left focus:outline-none hover:bg-emerald-50 transition-colors" onclick="toggleAccordion(this)">
                        <h3 class="text-lg font-bold text-stone-800 group-hover:text-emerald-700 transition-colors pr-4 leading-relaxed">
                            <span class="text-emerald-500 mr-2 font-black text-xl">Q:</span> <?= htmlspecialchars($faq['question']) ?>
                        </h3>
                        <svg class="chevron w-6 h-6 text-stone-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="accordion-content px-6 md:px-10 bg-emerald-50/50 text-stone-700 border-t border-stone-100 hidden">
                        <p class="leading-relaxed text-lg">
                            <span class="font-bold text-emerald-600 mr-2 text-xl">A:</span> 
                            <?= nl2br(htmlspecialchars($faq['answer'])) ?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        
        <div class="mt-16 text-center">
            <p class="text-stone-500 mb-4">沒有找到您的問題嗎？</p>
            <a href="contact.php" class="inline-flex items-center gap-2 bg-stone-800 text-white px-8 py-3 rounded-full hover:bg-emerald-600 transition-colors font-bold shadow">
                聯絡總召團隊 
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>

    </main>

    <footer class="bg-stone-900 text-stone-400 py-8 text-center mt-auto">
        <p>&copy; 2026 國立台灣大學昆蟲研習營. All rights reserved.</p>
    </footer>

    <script>
        function toggleAccordion(button) {
            const content = button.nextElementSibling;
            const chevron = button.querySelector('.chevron');
            const isOpen = content.classList.contains('open');

            // 1. 關閉「除了當前點擊之外」的其他面板
            document.querySelectorAll('.accordion-content').forEach(item => {
                if (item !== content) {
                    item.classList.remove('open');
                    setTimeout(() => {
                        if (!item.classList.contains('open')) {
                            item.classList.add('hidden');
                        }
                    }, 300);
                }
            });

            document.querySelectorAll('.chevron').forEach(item => {
                if (item !== chevron) {
                    item.classList.remove('open');
                }
            });

            // 2. 切換當前點擊的面板狀態
            if (!isOpen) {
                // 展開
                content.classList.remove('hidden');
                setTimeout(() => {
                    content.classList.add('open');
                    chevron.classList.add('open');
                }, 10);
            } else {
                // 收合
                content.classList.remove('open');
                chevron.classList.remove('open');
                setTimeout(() => {
                    content.classList.add('hidden');
                }, 300);
            }
        }
    </script>
</body>
</html>