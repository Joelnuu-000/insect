<?php
// story.php
?>
<!DOCTYPE html>
<html lang="zh-TW" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>昆蟲小故事 - 鱗的執行人 | 台大昆蟲營</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* 故事感的打字機與漸顯動畫 */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .reveal { animation: fadeInUp 0.8s ease-out forwards; }
        
        .parallax {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body class="bg-stone-950 text-stone-200 font-sans antialiased pt-20">

    <?php include 'navbar.php'; ?>

    <section class="relative h-[90vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1550614456-9764f6974169?q=80&w=1920&auto=format&fit=crop" class="w-full h-full object-cover opacity-40">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-stone-950"></div>
        </div>
        
        <div class="relative z-10 text-center px-4 reveal">
            <h2 class="text-emerald-500 font-bold tracking-[0.3em] mb-4 uppercase">Chapter 01</h2>
            <h1 class="text-5xl md:text-7xl font-black text-white mb-8 tracking-widest">隱形的守護者</h1>
            <p class="text-xl md:text-2xl text-stone-300 max-w-3xl mx-auto leading-relaxed font-light">
                在陽光灑落的葉背，一場關於「生存」與「欺騙」的戲劇正在悄然上演。
            </p>
            <div class="mt-12 animate-bounce">
                <svg class="w-6 h-6 mx-auto text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7-7-7m14-8l-7 7-7-7"></path></svg>
            </div>
        </div>
    </section>

    <article class="max-w-4xl mx-auto px-6 py-24 space-y-32">
        
        <div class="flex flex-col md:flex-row gap-12 items-center">
            <div class="md:w-1/2 reveal">
                <h3 class="text-3xl font-bold text-emerald-400 mb-6 italic">「我是枯葉，不是美味。」</h3>
                <p class="text-lg leading-relaxed text-stone-400">
                    這是一隻**枯葉蝶**。當牠展開翅膀時，是絢爛的寶藍與艷橘；但當牠合攏雙翅，牠就瞬間變成了森林地表上的一片凋零落葉。連翅脈的紋路、破損的缺口，甚至是那幾點看起來像霉斑的黑色素，都是為了欺騙掠食者的眼睛。
                </p>
                <p class="mt-4 text-stone-500">這就是「擬態」——鱗的執行人最高級的隱身術。</p>
            </div>
            <div class="md:w-1/2 rounded-2xl overflow-hidden shadow-2xl rotate-3 hover:rotate-0 transition-transform duration-500">
                <img src="https://images.unsplash.com/photo-1543163333-441617415413?q=80&w=800&auto=format&fit=crop" class="w-full">
            </div>
        </div>

        <div class="flex flex-col md:flex-row-reverse gap-12 items-center">
            <div class="md:w-1/2 reveal">
                <h3 class="text-3xl font-bold text-purple-400 mb-6 italic">「看著我的眼斑。」</h3>
                <p class="text-lg leading-relaxed text-stone-400">
                    貓頭鷹蝶的翅膀後方，有著兩顆碩大的**「眼斑」**。當天敵靠近時，牠突然展示這雙巨大的偽眼，掠食者會在那瞬間感到遲疑——這究竟是軟弱的小蝶，還是躲在黑暗中的猛獸？這短短幾秒的猶疑，就是命運轉折的關鍵。
                </p>
            </div>
            <div class="md:w-1/2 rounded-2xl overflow-hidden shadow-2xl -rotate-3 hover:rotate-0 transition-transform duration-500 border-4 border-stone-800">
                <img src="https://images.unsplash.com/photo-1536762550181-79777596001a?q=80&w=800&auto=format&fit=crop" class="w-full">
            </div>
        </div>

    </article>

    <section class="parallax h-[60vh] flex items-center justify-center" style="background-image: url('https://images.unsplash.com/photo-1502082553048-f009c37129b9?q=80&w=1920&auto=format&fit=crop');">
        <div class="bg-black/60 backdrop-blur-sm p-12 rounded-3xl text-center max-w-2xl mx-6 border border-white/10">
            <h4 class="text-2xl font-bold mb-4">每一枚鱗片，都是求生的證據</h4>
            <p class="text-stone-300 leading-relaxed">
                在昆蟲的世界，沒有所謂的殘忍或慈悲。每一條演化的路徑，都是為了讓生命延續。你想親身體驗這些神奇的自然法則嗎？
            </p>
            <div class="mt-8">
                <a href="courses.php" class="inline-block bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-3 rounded-full font-bold transition shadow-xl">進入鱗的世界</a>
            </div>
        </div>
    </section>

    <footer class="bg-stone-900 text-stone-500 py-12 text-center border-t border-stone-800">
        <p>&copy; 2026 國立台灣大學昆蟲研習營 ‧ 鱗的執行人</p>
    </footer>

    <script>
        const observerOptions = { threshold: 0.1 };
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('reveal');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
    </script>
</body>
</html>