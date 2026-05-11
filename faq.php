<?php
// faq.php

// 營隊常見問題陣列
$faqs = [
    [
        'q' => '填寫報名表單後多久會收到錄取通知信？',
        'a' => '通常狀況下，填寫表單後三日內會收到報名登錄通知信。目前遭遇帳戶技術問題，寄信速度較慢，請家長靜候較長時間，造成困擾十分抱歉，望請海涵。'
    ],
    [
        'q' => '每一個梯次都有入門/進階班可以選擇嗎？',
        'a' => '每一個梯次都有入門/進階班別可以選擇！歡迎搭配留言置頂處的分班小測驗表單評估～'
    ],
    [
        'q' => '營隊會過夜嗎？',
        'a' => '不會！臺大昆研營是採取當日接送'
    ],
    [
        'q' => '報到和放學的時間是幾點？',
        'a' => '報到時間是早上 08：30，外採日是早上 08：00；放學時間統一是下午 05：00。若有特殊狀況都可以聯繫我們調整！'
    ],
    [
        'q' => '課程內容會和去年一樣嗎？',
        'a' => '不會。每個年度的臺大昆研營都會重新編寫課程。本年度的「鱗的執行人」會環繞昆蟲重要的生存技能：擬態、偽裝做發想和深入介紹！'
    ],
    [
        'q' => '國小生和國中生會一起上課嗎？',
        'a' => '正課時間會按照入門/進階班別分開上課，一般來說年齡較小的學員會集中在入門班。手作課程則是全部的學員一起上課！'
    ],
    [
        'q' => '今年有外縣市梯次可以選擇嗎？',
        'a' => '本年度五個梯次都在臺北！室內課程在國立臺灣大學學新館；外採課程則是在新店區的臺大農業試驗場安康分場進行。'
    ],
    [
        'q' => '取消報名可以退費嗎！',
        'a' => "若已填寫表單未匯款想取消，請直接私訊粉專或電子郵件告知\n若已匯款想取消請私訊或電子郵件告知取消：\n1. 於 5/31 23:59 前→可退全額\n2. 於 5/31～6/26→可退費用 50%\n3. 於 6/27 後→恕不退費"
    ]
];
?>
<!DOCTYPE html>
<html lang="zh-TW" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>常見問題 (FAQ) - 臺大昆蟲營</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .accordion-content {
            transition: max-height 0.3s ease-out, padding 0.3s ease, opacity 0.3s ease;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
        }
        .accordion-content.open {
            max-height: 800px;
            opacity: 1;
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .chevron { transition: transform 0.3s ease; }
        .chevron.open { transform: rotate(180deg); }
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
            <?php foreach ($faqs as $faq): ?>
            <div class="bg-white border border-stone-200 rounded-2xl shadow-sm overflow-hidden group">
                <button class="accordion-button w-full flex justify-between items-center p-6 text-left focus:outline-none hover:bg-emerald-50 transition-colors" onclick="toggleAccordion(this)">
                    <h3 class="text-lg font-bold text-stone-800 group-hover:text-emerald-700 transition-colors pr-4 leading-relaxed">
                        <span class="text-emerald-500 mr-2 font-black text-xl">Q:</span> <?= htmlspecialchars($faq['q']) ?>
                    </h3>
                    <svg class="chevron w-6 h-6 text-stone-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="accordion-content px-6 md:px-10 bg-emerald-50/50 text-stone-700 border-t border-stone-100 hidden">
                    <p class="leading-relaxed text-lg">
                        <span class="font-bold text-emerald-600 mr-2 text-xl">A:</span> 
                        <?= nl2br(htmlspecialchars($faq['a'])) ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
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
        <p>&copy; 2026 國立臺灣大學昆蟲研習營. All rights reserved.</p>
    </footer>

    <script>
        function toggleAccordion(button) {
            const content = button.nextElementSibling;
            const chevron = button.querySelector('.chevron');
            const isOpen = content.classList.contains('open');

            document.querySelectorAll('.accordion-content').forEach(item => {
                if (item !== content) {
                    item.classList.remove('open');
                    setTimeout(() => { if (!item.classList.contains('open')) item.classList.add('hidden'); }, 300);
                }
            });

            document.querySelectorAll('.chevron').forEach(item => {
                if (item !== chevron) item.classList.remove('open');
            });

            if (!isOpen) {
                content.classList.remove('hidden');
                setTimeout(() => { content.classList.add('open'); chevron.classList.add('open'); }, 10);
            } else {
                content.classList.remove('open'); chevron.classList.remove('open');
                setTimeout(() => content.classList.add('hidden'), 300);
            }
        }
    </script>
</body>
</html>