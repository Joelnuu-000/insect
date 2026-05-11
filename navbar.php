<!-- navbar.php -->
<nav class="fixed top-0 w-full bg-white/95 backdrop-blur shadow-sm z-50">
    <div class="max-w-7xl mx-auto px-4 flex justify-between items-center h-20">
        <!-- Logo -->
        <a href="index.php" class="flex items-center gap-2 text-2xl font-black text-emerald-700 tracking-wider hover:text-emerald-800 transition">
            <img src="icon.jpg" alt="Icon" class="w-8 h-8 rounded-full">
            NTU Insect Camp
        </a>
        
        <!-- 手機版漢堡選單按鈕 -->
        <button id="mobile-menu-button" class="md:hidden flex flex-col justify-center items-center w-8 h-8 space-y-1">
            <span class="block w-6 h-0.5 bg-stone-600 transition-transform duration-300"></span>
            <span class="block w-6 h-0.5 bg-stone-600 transition-transform duration-300"></span>
            <span class="block w-6 h-0.5 bg-stone-600 transition-transform duration-300"></span>
        </button>
        
        <!-- 桌面版選單 -->
        <div class="hidden md:flex items-center gap-8 font-bold text-stone-600">
            
            <!-- 探索下拉選單 -->
            <div class="relative group h-full flex items-center">
                <button class="flex items-center gap-1 hover:text-emerald-600 transition py-8">
                    探索
                    <svg class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                
                <!-- 下拉內容區塊 -->
                <div class="absolute top-[70px] left-1/2 -translate-x-1/2 w-48 bg-white border-2 border-emerald-100 rounded-2xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 overflow-hidden">
                    <div class="py-2 flex flex-col">
                        <a href="department.php" class="px-5 py-3 hover:bg-emerald-50 hover:text-emerald-700 transition">臺大昆蟲系學會</a>
                        <a href="organization.php" class="px-5 py-3 hover:bg-emerald-50 hover:text-emerald-700 transition">營隊組織</a>
                        <a href="history.php" class="px-5 py-3 hover:bg-emerald-50 hover:text-emerald-700 transition">歷屆營隊</a>
                        <a href="courses.php" class="px-5 py-3 hover:bg-emerald-50 hover:text-emerald-700 transition">課程介紹</a>
                        <a href="media.php" class="px-5 py-3 hover:bg-emerald-50 hover:text-emerald-700 transition">活動影像</a>
                        <a href="contact.php" class="px-5 py-3 hover:bg-emerald-50 hover:text-emerald-700 transition">聯絡我們</a>
                    </div>
                </div>
            </div>

            <a href="quiz.php" class="hover:text-emerald-600 transition py-2">蟲蟲測驗專區</a>
            <a href="story.php" class="hover:text-emerald-600 transition py-2">昆蟲小故事</a>
            <a href="faq.php" class="hover:text-emerald-600 transition py-2">QA</a>
            
            <a href="register.php" class="bg-emerald-600 text-white px-6 py-2.5 rounded-full hover:bg-emerald-700 hover:scale-105 transition-all shadow-md">
                報名專區
            </a>
        </div>
        
        <!-- 手機版選單 -->
        <div id="mobile-menu" class="md:hidden fixed top-20 left-0 w-full bg-white/95 backdrop-blur shadow-lg border-t border-stone-100 transform -translate-y-full transition-transform duration-300 ease-in-out z-40">
            <div class="flex flex-col py-4">
                <!-- 探索下拉選單 -->
                <div class="relative">
                    <button id="mobile-explore-button" class="flex items-center justify-between w-full px-6 py-3 text-stone-600 hover:text-emerald-600 transition font-bold">
                        探索
                        <svg class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div id="mobile-explore-menu" class="hidden bg-stone-50">
                        <a href="department.php" class="block px-8 py-2 text-stone-600 hover:bg-emerald-50 hover:text-emerald-700 transition">臺大昆蟲系學會</a>
                        <a href="organization.php" class="block px-8 py-2 text-stone-600 hover:bg-emerald-50 hover:text-emerald-700 transition">營隊組織</a>
                        <a href="history.php" class="block px-8 py-2 text-stone-600 hover:bg-emerald-50 hover:text-emerald-700 transition">歷屆營隊</a>
                        <a href="courses.php" class="block px-8 py-2 text-stone-600 hover:bg-emerald-50 hover:text-emerald-700 transition">課程介紹</a>
                        <a href="media.php" class="block px-8 py-2 text-stone-600 hover:bg-emerald-50 hover:text-emerald-700 transition">活動影像</a>
                        <a href="contact.php" class="block px-8 py-2 text-stone-600 hover:bg-emerald-50 hover:text-emerald-700 transition">聯絡我們</a>
                    </div>
                </div>
                <a href="quiz.php" class="block px-6 py-3 text-stone-600 hover:text-emerald-600 transition font-bold">蟲蟲測驗專區</a>
                <a href="story.php" class="block px-6 py-3 text-stone-600 hover:text-emerald-600 transition font-bold">昆蟲小故事</a>
                <a href="faq.php" class="block px-6 py-3 text-stone-600 hover:text-emerald-600 transition font-bold">QA</a>
                <a href="register.php" class="block mx-6 mt-4 bg-emerald-600 text-white px-6 py-2.5 rounded-full hover:bg-emerald-700 transition-all shadow-md text-center">報名專區</a>
            </div>
        </div>
    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileExploreButton = document.getElementById('mobile-explore-button');
    const mobileExploreMenu = document.getElementById('mobile-explore-menu');
    const hamburgerLines = mobileMenuButton.querySelectorAll('span');
    const exploreArrow = mobileExploreButton.querySelector('svg');
    
    let menuOpen = false;
    let exploreOpen = false;
    
    // 漢堡選單切換
    mobileMenuButton.addEventListener('click', function() {
        menuOpen = !menuOpen;
        
        if (menuOpen) {
            mobileMenu.classList.remove('-translate-y-full');
            mobileMenu.classList.add('translate-y-0');
            hamburgerLines[0].classList.add('rotate-45', 'translate-y-1.5');
            hamburgerLines[1].classList.add('opacity-0');
            hamburgerLines[2].classList.add('-rotate-45', '-translate-y-1.5');
        } else {
            mobileMenu.classList.add('-translate-y-full');
            mobileMenu.classList.remove('translate-y-0');
            hamburgerLines[0].classList.remove('rotate-45', 'translate-y-1.5');
            hamburgerLines[1].classList.remove('opacity-0');
            hamburgerLines[2].classList.remove('-rotate-45', '-translate-y-1.5');
        }
    });
    
    // 手機探索下拉選單切換
    mobileExploreButton.addEventListener('click', function() {
        exploreOpen = !exploreOpen;
        
        if (exploreOpen) {
            mobileExploreMenu.classList.remove('hidden');
            exploreArrow.classList.add('rotate-180');
        } else {
            mobileExploreMenu.classList.add('hidden');
            exploreArrow.classList.remove('rotate-180');
        }
    });
    
    // 點擊外部關閉選單
    document.addEventListener('click', function(event) {
        if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
            if (menuOpen) {
                mobileMenuButton.click();
            }
        }
    });
});
</script>