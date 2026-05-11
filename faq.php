<?php
// faq.php
?>
<!DOCTYPE html>
<html lang="zh-TW" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>常見問題 (FAQ) - 台大昆蟲營</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* 控制折疊面板的平滑動畫 */
        .accordion-content {
            transition: max-height 0.3s ease-out, padding 0.3s ease, opacity 0.3s ease;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
        }
        .accordion-content.open {
            max-height: 500px; /* 足夠容納文字的高度 */
            opacity: 1;
            padding-top: 1rem;
            padding-bottom: 1rem;
        }
        /* 旋轉箭頭動畫 */
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
            <p class="text-lg text-stone-600">我們整理了歷屆最常被問到的問題，報名前請務必詳閱！</p>
        </div>

        <div class="space-y-4">

            <div class="bg-white border border-stone-200 rounded-2xl shadow-sm overflow-hidden group">
                <button class="accordion-button w-full flex justify-between items-center p-6 text-left focus:outline-none hover:bg-emerald-50 transition-colors" onclick="toggleAccordion(this)">
                    <h3 class="text-lg font-bold text-stone-800 group-hover:text-emerald-700 transition-colors">
                        <span class="text-emerald-500 mr-2">Q:</span> 請問有冷氣吹嗎？我小孩很怕熱，睡覺沒有 22 度會睡不著。
                    </h3>
                    <svg class="chevron w-6 h-6 text-stone-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="accordion-content px-6 bg-white text-stone-600 border-t border-stone-100 hidden">
                    <p class="leading-relaxed">
                        <span class="font-bold text-emerald-600">A:</span> 我們的室內課程皆在台大校園內有空調的教室進行。但這畢竟是「生態營隊」，我們有大量的戶外採集與森林夜間觀察行程，<strong class="text-red-500">大自然是沒有冷氣的</strong>。若學員極度排斥流汗或無法接受蚊蟲，建議報名其他室內型靜態營隊會比較開心喔！
                    </p>
                </div>
            </div>

            <div class="bg-white border border-stone-200 rounded-2xl shadow-sm overflow-hidden group">
                <button class="accordion-button w-full flex justify-between items-center p-6 text-left focus:outline-none hover:bg-emerald-50 transition-colors" onclick="toggleAccordion(this)">
                    <h3 class="text-lg font-bold text-stone-800 group-hover:text-emerald-700 transition-colors">
                        <span class="text-emerald-500 mr-2">Q:</span> 參加完昆蟲營，我小孩可以考上台大嗎？可以放在備審資料裡加分嗎？
                    </h3>
                    <svg class="chevron w-6 h-6 text-stone-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="accordion-content px-6 bg-white text-stone-600 border-t border-stone-100 hidden">
                    <p class="leading-relaxed">
                        <span class="font-bold text-emerald-600">A:</span> 營隊結束後我們會頒發結業證書，您可以將其放入學習歷程檔案中。<br><br>但必須誠實地說，<strong class="text-stone-800">參加營隊和考上台大沒有絕對關係</strong>。我們希望學員來參加是因為「喜歡昆蟲」與「熱愛自然」，而不是單純為了升學履歷。有熱情的人，自然能在學習中發光發熱。
                    </p>
                </div>
            </div>

            <div class="bg-white border border-stone-200 rounded-2xl shadow-sm overflow-hidden group">
                <button class="accordion-button w-full flex justify-between items-center p-6 text-left focus:outline-none hover:bg-emerald-50 transition-colors" onclick="toggleAccordion(this)">
                    <h3 class="text-lg font-bold text-stone-800 group-hover:text-emerald-700 transition-colors">
                        <span class="text-emerald-500 mr-2">Q:</span> 聽說會有標本製作課程，請問會殺生嗎？我覺得很殘忍可以不要上嗎？
                    </h3>
                    <svg class="chevron w-6 h-6 text-stone-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="accordion-content px-6 bg-white text-stone-600 border-t border-stone-100 hidden">
                    <p class="leading-relaxed">
                        <span class="font-bold text-emerald-600">A:</span> 這是非常好的問題！我們使用的標本素材皆為<strong class="text-stone-800">合法來源的人工繁殖個體</strong>，或是在野外自然死亡被採集回來的昆蟲。<br><br>標本製作是昆蟲學研究中極為重要的一環（分類學的基礎）。我們會教導學員以「敬畏生命」的科學態度來面對，若真的心理上無法克服，課程中可以在旁觀摩即可，我們不會強迫學員動手。
                    </p>
                </div>
            </div>

            <div class="bg-white border border-stone-200 rounded-2xl shadow-sm overflow-hidden group">
                <button class="accordion-button w-full flex justify-between items-center p-6 text-left focus:outline-none hover:bg-emerald-50 transition-colors" onclick="toggleAccordion(this)">
                    <h3 class="text-lg font-bold text-stone-800 group-hover:text-emerald-700 transition-colors">
                        <span class="text-emerald-500 mr-2">Q:</span> 可以讓家長陪同參加嗎？我小孩沒離開過家我會擔心。
                    </h3>
                    <svg class="chevron w-6 h-6 text-stone-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="accordion-content px-6 bg-white text-stone-600 border-t border-stone-100 hidden">
                    <p class="leading-relaxed">
                        <span class="font-bold text-emerald-600">A:</span> <strong class="text-red-500">很抱歉，不行喔。</strong><br><br>本營隊是為學生設計的獨立住宿營隊。學習離開舒適圈、與同年齡的夥伴過夜相處，是成長過程中很重要的一部分。我們的隊輔（台大昆蟲系學生）都經過嚴格的受訓，會將學員的安全與健康放在第一位，請家長放手讓孩子去飛吧！
                    </p>
                </div>
            </div>

             <div class="bg-white border border-stone-200 rounded-2xl shadow-sm overflow-hidden group">
                <button class="accordion-button w-full flex justify-between items-center p-6 text-left focus:outline-none hover:bg-emerald-50 transition-colors" onclick="toggleAccordion(this)">
                    <h3 class="text-lg font-bold text-stone-800 group-hover:text-emerald-700 transition-colors">
                        <span class="text-emerald-500 mr-2">Q:</span> 晚餐吃不飽怎麼辦？可以叫外送嗎？
                    </h3>
                    <svg class="chevron w-6 h-6 text-stone-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="accordion-content px-6 bg-white text-stone-600 border-t border-stone-100 hidden">
                    <p class="leading-relaxed">
                        <span class="font-bold text-emerald-600">A:</span> 營隊期間的餐飲我們都已安排妥當，絕對管夠。基於食安與營區管理考量，<strong class="text-stone-800">嚴禁學員私自叫外送（Foodpanda, UberEats 等）</strong>。若在晚上真的肚子餓，我們會提供簡單的宵夜餅乾。
                    </p>
                </div>
            </div>

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
            // 找到該按鈕對應的內容區塊與箭頭圖示
            const content = button.nextElementSibling;
            const chevron = button.querySelector('.chevron');
            
            // 切換目前的狀態
            const isOpen = content.classList.contains('open');

            // (選用功能) 點擊一個時，關閉其他所有面板
            document.querySelectorAll('.accordion-content').forEach(item => {
                item.classList.remove('open');
                item.classList.add('hidden');
            });
            document.querySelectorAll('.chevron').forEach(item => {
                item.classList.remove('open');
            });

            // 如果原本是關閉的，則打開它
            if (!isOpen) {
                content.classList.remove('hidden');
                // 使用 setTimeout 確保 display:block 生效後再執行動畫
                setTimeout(() => {
                    content.classList.add('open');
                    chevron.classList.add('open');
                }, 10);
            }
        }
    </script>

</body>
</html>