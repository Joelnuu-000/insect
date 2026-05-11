<!-- navbar.php -->
<nav class="fixed top-0 w-full bg-white/95 backdrop-blur shadow-sm z-50">
    <div class="max-w-7xl mx-auto px-4 flex justify-between items-center h-20">
        <!-- Logo -->
        <a href="index.php" class="text-2xl font-black text-emerald-700 tracking-wider hover:text-emerald-800 transition">
            NTU Insect Camp
        </a>
        
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
    </div>
</nav>