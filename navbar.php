<?php
// navbar.php - 專為 2026 昆蟲營設計
?>
<nav class="bg-white/90 backdrop-blur-md fixed top-0 w-full z-50 border-b border-stone-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            
            <div class="flex-shrink-0 flex items-center">
                <a href="index.php" class="text-2xl font-black text-emerald-800 tracking-tighter">
                    NTU <span class="text-emerald-500">Insect</span>
                </a>
            </div>

            <div class="hidden md:flex space-x-8 items-center font-bold">
                <a href="courses.php" class="text-stone-600 hover:text-emerald-600 transition">課程介紹</a>
                <a href="story.php" class="text-stone-600 hover:text-emerald-600 transition">昆蟲故事</a>
                <a href="register.php" class="bg-emerald-600 text-white px-6 py-2 rounded-full hover:bg-emerald-700 transition shadow-md">
                    立即報名
                </a>
            </div>

            <div class="md:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-stone-600 hover:text-emerald-600 p-2 focus:outline-none">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-stone-100 flex flex-col p-4 space-y-2 font-bold shadow-inner">
        <a href="courses.php" class="py-3 px-4 hover:bg-emerald-50 rounded-lg">課程介紹</a>
        <a href="story.php" class="py-3 px-4 hover:bg-emerald-50 rounded-lg">昆蟲故事</a>
        <a href="register.php" class="py-4 bg-emerald-600 text-white text-center rounded-xl shadow-lg mt-2">
            立即報名
        </a>
    </div>
</nav>

<script>
    // 解決按鍵消失的核心邏輯
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');
    
    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
        // Vibe Coding 小細節：點擊時變換 icon
        const iconPath = document.getElementById('menu-icon');
        if (menu.classList.contains('hidden')) {
            iconPath.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
        } else {
            iconPath.setAttribute('d', 'M6 18L18 6M6 6l12 12');
        }
    });
</script>