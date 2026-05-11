<?php
// courses.php
?>
<!DOCTYPE html>
<html lang="zh-TW" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課程介紹 - 鱗的執行人 | 台大昆蟲營</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-50 text-stone-800 font-sans antialiased pt-24 min-h-screen flex flex-col">

    <?php include 'navbar.php'; ?>

    <header class="max-w-6xl mx-auto w-full px-4 mb-12">
        <div class="bg-gradient-to-br from-purple-900 to-indigo-900 rounded-3xl p-8 md:p-16 text-center shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-full opacity-10 pointer-events-none" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'#ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
            
            <h2 class="text-yellow-400 font-bold tracking-widest mb-4 text-sm md:text-base">2026 臺大昆蟲暑期研習營</h2>
            <h1 class="text-5xl md:text-7xl font-black text-white mb-6 tracking-wider">鱗的執行人</h1>
            <p class="text-purple-100 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">
                本年度課程主題為「昆蟲的擬態以及偽裝」。<br>
                讓我們帶領您進入這個美麗卻又無情的奇幻世界，一起遨遊探險。
            </p>
        </div>
    </header>

    <main class="flex-grow max-w-6xl mx-auto w-full px-4 pb-20 space-y-20">

        <section class="grid md:grid-cols-2 gap-6">
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-stone-100 flex items-start gap-4">
                <div class="bg-purple-100 p-3 rounded-xl text-purple-700">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-stone-800 mb-4">活動梯次 (共五梯)</h3>
                    <ul class="space-y-2 text-stone-600 font-medium">
                        <li>第一梯：7/2 ~ 7/4</li>
                        <li>第二梯：7/6 ~ 7/8</li>
                        <li>第三梯：7/9 ~ 7/11</li>
                        <li>第四梯：7/13 ~ 7/15</li>
                        <li>第五梯：7/16 ~ 7/18</li>
                    </ul>
                </div>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-stone-100 flex items-start gap-4">
                <div class="bg-emerald-100 p-3 rounded-xl text-emerald-700">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-stone-800 mb-4">活動地點</h3>
                    <ul class="space-y-2 text-stone-600 font-medium">
                        <li><span class="font-bold text-stone-800">室內課程：</span>國立臺灣大學學新館</li>
                        <li><span class="font-bold text-stone-800">戶外採集：</span>台大安康農場 (新店區)</li>
                    </ul>
                </div>
            </div>
        </section>

        <section>
            <div class="text-center mb-10">
                <h2 class="text-3xl font-black text-stone-800">活動亮點介紹</h2>
                <div class="w-16 h-1 bg-purple-600 mx-auto mt-4 rounded-full"></div>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-sm border-t-4 border-purple-600">
                    <h3 class="text-2xl font-bold text-purple-800 mb-3">主題課程：擬態與偽裝</h3>
                    <p class="text-stone-600 leading-relaxed">
                        台大昆蟲研習營定番的正式課程由系上同學擔任講師，提供專業主題講解。今年探討昆蟲賴以維生、不可或缺的生存本領，看牠們如何運用擬態欺騙獵物以求溫飽，或是躲避殘酷的食物鏈，這將是自然界最精彩絕倫的爾虞我詐。
                    </p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm border-t-4 border-emerald-500">
                    <h3 class="text-2xl font-bold text-emerald-700 mb-3">戶外採集：走入安康農場</h3>
                    <p class="text-stone-600 leading-relaxed">
                        每年都會帶領小朋友前往野外運用所學，親自尋找昆蟲的蹤跡。台大安康農場是繁華水泥叢林中為數不多的清幽之地。我們將與小朋友一同闖關、親自拿起捕蟲網體驗捕捉昆蟲，抓住夏天最燦爛美好的記憶。
                    </p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm border-t-4 border-amber-500">
                    <h3 class="text-2xl font-bold text-amber-700 mb-3">標本製作：生命的延續</h3>
                    <p class="text-stone-600 leading-relaxed">
                        標本不只是學術樣品，更是生命的延續。講師將帶領孩子認識製作方式，了解其在科學研究、教育與保育的意義。隊輔會陪伴孩子一步步操作甲蟲與蝴蝶標本（從展翅、展足到標籤書寫），課程結束後可帶回親手完成的專屬回憶。
                    </p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm border-t-4 border-blue-500">
                    <h3 class="text-2xl font-bold text-blue-700 mb-3">團康活動：做中學的樂趣</h3>
                    <p class="text-stone-600 leading-relaxed">
                        透過知識與團康的融合，讓孩子們在合作互動與歡笑聲中走進昆蟲的世界。我們從昆蟲行為發想關卡設計，讓孩子們結交同樣熱愛自然的新朋友，一起觀察、討論與探索，過五關斬六將，帶走新知與友誼。
                    </p>
                </div>
            </div>
        </section>

        <section id="schedule" class="scroll-mt-24">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-black text-stone-800">三日活動課表</h2>
                <div class="w-16 h-1 bg-emerald-600 mx-auto mt-4 rounded-full"></div>
                <p class="text-stone-500 mt-4">精彩豐富的課程安排，理論與實作並重</p>
            </div>

            <div class="grid lg:grid-cols-3 gap-8 items-stretch">
                
                <div class="bg-white rounded-3xl shadow-md overflow-hidden border border-stone-100 flex flex-col h-full">
                    <div class="bg-stone-800 text-white text-center py-4 font-black text-xl tracking-widest shrink-0">第一天</div>
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex gap-4 items-start shrink-0">
                            <div class="text-sm font-bold text-stone-400 w-16 pt-1 shrink-0">08:30</div>
                            <div class="bg-stone-100 p-3 rounded-xl w-full text-stone-700 font-bold text-center">學員報到</div>
                        </div>
                        
                        <div class="relative border-l-4 border-purple-400 pl-4 py-2 space-y-4 my-4 flex-1">
                            <span class="absolute -left-[14px] top-1/2 -translate-y-1/2 bg-purple-100 text-purple-800 text-xs font-black px-1 py-4 rounded-full writing-vertical-lr">上午</span>
                            <div class="bg-purple-50 p-3 rounded-xl">
                                <h4 class="font-bold text-purple-900">尋覓真相的起點</h4>
                                <p class="text-sm text-purple-700">開幕式與小隊破冰</p>
                            </div>
                            <div class="bg-purple-50 p-3 rounded-xl">
                                <h4 class="font-bold text-purple-900">昆蟲你是誰！</h4>
                                <p class="text-sm text-purple-700">昆蟲的基礎構造與演化</p>
                            </div>
                            <div class="bg-purple-50 p-3 rounded-xl">
                                <h4 class="font-bold text-purple-900">昆蟲偵探訓練營</h4>
                                <p class="text-sm text-purple-700">大地團康遊戲</p>
                            </div>
                        </div>

                        <div class="flex gap-4 items-start shrink-0">
                            <div class="text-sm font-bold text-stone-400 w-16 pt-1 shrink-0">11:30</div>
                            <div class="bg-amber-100 p-3 rounded-xl w-full text-amber-800 font-bold text-center flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                美味午餐 & 午休
                            </div>
                        </div>

                        <div class="relative border-l-4 border-indigo-400 pl-4 py-2 space-y-4 my-4 flex-1">
                            <span class="absolute -left-[14px] top-1/2 -translate-y-1/2 bg-indigo-100 text-indigo-800 text-xs font-black px-1 py-4 rounded-full writing-vertical-lr">下午</span>
                            <div class="bg-indigo-50 p-3 rounded-xl">
                                <h4 class="font-bold text-indigo-900">走進昆蟲王國</h4>
                                <p class="text-sm text-indigo-700">昆蟲的分類介紹</p>
                            </div>
                            <div class="bg-indigo-50 p-3 rounded-xl">
                                <h4 class="font-bold text-indigo-900">昆蟲標本及活體觀察</h4>
                            </div>
                            <div class="bg-indigo-50 p-3 rounded-xl">
                                <h4 class="font-bold text-indigo-900">手工藝時間</h4>
                            </div>
                            <div class="bg-indigo-50 p-3 rounded-xl">
                                <h4 class="font-bold text-indigo-900">昆蟲你在哪！</h4>
                                <p class="text-sm text-indigo-700">昆蟲採集與棲地介紹</p>
                            </div>
                        </div>

                        <div class="flex gap-4 items-start shrink-0">
                            <div class="text-sm font-bold text-stone-400 w-16 pt-1 shrink-0">17:00</div>
                            <div class="bg-stone-100 p-3 rounded-xl w-full text-stone-700 font-bold text-center">快樂賦歸</div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl shadow-md overflow-hidden border border-stone-100 flex flex-col h-full">
                    <div class="bg-emerald-700 text-white text-center py-4 font-black text-xl tracking-widest shrink-0">第二天 (外採日)</div>
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex gap-4 items-start shrink-0">
                            <div class="text-sm font-bold text-stone-400 w-16 pt-1 shrink-0">08:00</div>
                            <div class="bg-stone-100 p-3 rounded-xl w-full text-stone-700 font-bold text-center">學員報到 <span class="text-xs text-red-500 whitespace-nowrap">(提早半小時)</span></div>
                        </div>
                        
                        <div class="relative border-l-4 border-emerald-400 pl-4 py-2 space-y-4 my-4 flex-1">
                            <span class="absolute -left-[14px] top-1/2 -translate-y-1/2 bg-emerald-100 text-emerald-800 text-xs font-black px-1 py-4 rounded-full writing-vertical-lr">上午</span>
                            <div class="bg-emerald-50 p-3 rounded-xl">
                                <h4 class="font-bold text-emerald-900">行前準備</h4>
                                <p class="text-sm text-emerald-700">野外採集活動說明</p>
                            </div>
                            <div class="bg-emerald-100 p-6 rounded-xl border-2 border-emerald-200 text-center shadow-inner">
                                <h4 class="font-black text-emerald-900 text-lg flex justify-center items-center gap-2">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    野外採集時間
                                </h4>
                                <p class="text-sm text-emerald-700 mt-1">台大安康農場</p>
                            </div>
                        </div>

                        <div class="flex gap-4 items-start shrink-0">
                            <div class="text-sm font-bold text-stone-400 w-16 pt-1 shrink-0">11:30</div>
                            <div class="bg-amber-100 p-3 rounded-xl w-full text-amber-800 font-bold text-center">美味午餐 & 午休</div>
                        </div>

                        <div class="relative border-l-4 border-teal-400 pl-4 py-2 space-y-4 my-4 flex-1">
                            <span class="absolute -left-[14px] top-1/2 -translate-y-1/2 bg-teal-100 text-teal-800 text-xs font-black px-1 py-4 rounded-full writing-vertical-lr">下午</span>
                            <div class="bg-teal-50 p-3 rounded-xl">
                                <h4 class="font-bold text-teal-900">關鍵證據</h4>
                                <p class="text-sm text-teal-700">標本製作教學</p>
                            </div>
                            <div class="bg-teal-50 p-3 rounded-xl">
                                <h4 class="font-bold text-teal-900">實體標本製作</h4>
                            </div>
                            <div class="bg-teal-50 p-3 rounded-xl">
                                <h4 class="font-bold text-teal-900">潛伏</h4>
                                <p class="text-sm text-teal-700">擬態 & 偽裝介紹</p>
                            </div>
                            <div class="bg-teal-50 p-3 rounded-xl">
                                <h4 class="font-bold text-teal-900">手工藝時間</h4>
                            </div>
                        </div>

                        <div class="flex gap-4 items-start shrink-0">
                            <div class="text-sm font-bold text-stone-400 w-16 pt-1 shrink-0">17:00</div>
                            <div class="bg-stone-100 p-3 rounded-xl w-full text-stone-700 font-bold text-center">快樂賦歸</div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl shadow-md overflow-hidden border border-stone-100 flex flex-col h-full">
                    <div class="bg-stone-800 text-white text-center py-4 font-black text-xl tracking-widest shrink-0">第三天</div>
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex gap-4 items-start shrink-0">
                            <div class="text-sm font-bold text-stone-400 w-16 pt-1 shrink-0">08:30</div>
                            <div class="bg-stone-100 p-3 rounded-xl w-full text-stone-700 font-bold text-center">學員報到</div>
                        </div>
                        
                        <div class="relative border-l-4 border-purple-400 pl-4 py-2 space-y-4 my-4 flex-1">
                            <span class="absolute -left-[14px] top-1/2 -translate-y-1/2 bg-purple-100 text-purple-800 text-xs font-black px-1 py-4 rounded-full writing-vertical-lr">上午</span>
                            <div class="bg-purple-50 p-3 rounded-xl">
                                <h4 class="font-bold text-purple-900">鱗的執行人</h4>
                                <p class="text-sm text-purple-700">有鱗的昆蟲：鱗從何來</p>
                            </div>
                            <div class="bg-purple-50 p-3 rounded-xl">
                                <h4 class="font-bold text-purple-900">進入鱗的世界</h4>
                                <p class="text-sm text-purple-700">鱗翅目昆蟲特論</p>
                            </div>
                            <div class="bg-purple-50 p-3 rounded-xl">
                                <h4 class="font-bold text-purple-900">手工藝時間</h4>
                            </div>
                        </div>

                        <div class="flex gap-4 items-start shrink-0">
                            <div class="text-sm font-bold text-stone-400 w-16 pt-1 shrink-0">11:30</div>
                            <div class="bg-amber-100 p-3 rounded-xl w-full text-amber-800 font-bold text-center">美味午餐 & 午休</div>
                        </div>

                        <div class="relative border-l-4 border-indigo-400 pl-4 py-2 space-y-4 my-4 flex-1">
                            <span class="absolute -left-[14px] top-1/2 -translate-y-1/2 bg-indigo-100 text-indigo-800 text-xs font-black px-1 py-4 rounded-full writing-vertical-lr">下午</span>
                            <div class="bg-indigo-50 p-3 rounded-xl">
                                <h4 class="font-bold text-indigo-900">台灣昆蟲雜談</h4>
                                <p class="text-sm text-indigo-700">台灣特色昆蟲介紹</p>
                            </div>
                            <div class="bg-indigo-50 p-3 rounded-xl">
                                <h4 class="font-bold text-indigo-900">執行人的最終考驗</h4>
                                <p class="text-sm text-indigo-700">團體闖關遊戲</p>
                            </div>
                            <div class="bg-rose-100 p-4 rounded-xl border border-rose-200">
                                <h4 class="font-black text-rose-900 text-center">結業式</h4>
                                <p class="text-sm text-rose-700 text-center">頒發結業證書及獎項</p>
                            </div>
                        </div>

                        <div class="flex gap-4 items-start shrink-0">
                            <div class="text-sm font-bold text-stone-400 w-16 pt-1 shrink-0">17:00</div>
                            <div class="bg-stone-100 p-3 rounded-xl w-full text-stone-700 font-bold text-center">快樂賦歸</div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        
        <div class="text-center pt-10">
            <a href="register.php" class="inline-block bg-gradient-to-r from-emerald-600 to-teal-500 text-white px-12 py-4 rounded-full text-xl font-bold hover:scale-105 transition-transform shadow-xl">
                迫不及待了！立刻報名
            </a>
        </div>

    </main>

    <footer class="bg-stone-900 text-stone-400 py-8 text-center mt-auto">
        <p>&copy; 2026 國立台灣大學昆蟲研習營. All rights reserved.</p>
    </footer>

    <style>
        .writing-vertical-lr {
            writing-mode: vertical-lr;
            text-orientation: upright;
            letter-spacing: 2px;
        }
    </style>
</body>
</html>