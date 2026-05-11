<?php
// quiz.php

// 1. 初始化狀態：透過 POST 接收當前題號與分數，若無則預設為 0
$step = isset($_POST['step']) ? (int)$_POST['step'] : 0;
$score = isset($_POST['score']) ? (int)$_POST['score'] : 0;

// 2. 處理使用者的選擇：如果有送出分數，則累加並進入下一題
if (isset($_POST['choice_value'])) {
    $score += (int)$_POST['choice_value'];
    $step++;
}

// 3. 題庫設定
$questions = [
    [
        "question" => "1. 週末的下午，你通常最喜歡做什麼事？",
        "options" => [
            ["text" => "到戶外踏青、曬太陽四處探索", "value" => 1],
            ["text" => "待在家裡安靜地看書或做自己的事", "value" => 2],
            ["text" => "找一群朋友聚在一起熱鬧一下", "value" => 3]
        ]
    ],
    [
        "question" => "2. 如果在野外遇到未知的突發狀況，你的第一反應是？",
        "options" => [
            ["text" => "興奮！立刻上前一探究竟", "value" => 1],
            ["text" => "冷靜觀察，先查資料確認安危", "value" => 2],
            ["text" => "跟身邊的夥伴討論該怎麼辦", "value" => 3]
        ]
    ],
    [
        "question" => "3. 參加昆蟲營，你最期待哪一個環節？",
        "options" => [
            ["text" => "拿著捕蟲網，夜間生態大冒險", "value" => 1],
            ["text" => "跟著老師學習專業的標本製作", "value" => 2],
            ["text" => "營火晚會與大家一起玩大地遊戲", "value" => 3]
        ]
    ]
];

$total_questions = count($questions);
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>蟲蟲測驗專區 - 探索你的昆蟲屬性 | 台大昆蟲營</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-emerald-50 text-stone-800 font-sans antialiased pt-24 min-h-screen flex flex-col">

    <?php include 'navbar.php'; ?>

    <main class="flex-grow max-w-3xl mx-auto w-full px-4 py-8 flex flex-col justify-center">
        
        <div class="bg-white p-8 md:p-12 rounded-3xl shadow-xl border-4 border-emerald-100 relative overflow-hidden">
            
            <?php if ($step === 0): ?>
                <div class="text-center">
                    <h1 class="text-3xl md:text-4xl font-black text-emerald-800 mb-6">測測你是哪種昆蟲？</h1>
                    <p class="text-lg text-stone-600 mb-8 max-w-xl mx-auto">
                        面對未知的自然挑戰，你會怎麼做？完成 3 題情境測驗，找出隱藏在你個性中的專屬昆蟲屬性，並獲取最適合你的營隊活動推薦！
                    </p>
                    <form action="quiz.php" method="POST">
                        <input type="hidden" name="step" value="0">
                        <input type="hidden" name="score" value="0">
                        <button type="submit" name="choice_value" value="0" class="bg-emerald-600 text-white text-lg font-bold px-10 py-4 rounded-full shadow-lg hover:bg-emerald-700 hover:scale-105 transition-all">
                            開始測驗
                        </button>
                    </form>
                </div>

            <?php elseif ($step > 0 && $step <= $total_questions): ?>
                <?php 
                    $current_q_index = $step - 1; 
                    $current_q = $questions[$current_q_index];
                    $progress_percent = ($step / $total_questions) * 100;
                ?>
                <div class="w-full">
                    <div class="w-full bg-stone-100 rounded-full h-2.5 mb-8">
                        <div class="bg-emerald-500 h-2.5 rounded-full transition-all duration-500" style="width: <?= $progress_percent ?>%"></div>
                    </div>
                    
                    <h2 class="text-2xl font-bold mb-8 text-stone-800 text-center">
                        <?= htmlspecialchars($current_q['question']) ?>
                    </h2>
                    
                    <form action="quiz.php" method="POST" class="space-y-4 flex flex-col items-center w-full">
                        <input type="hidden" name="step" value="<?= $step ?>">
                        <input type="hidden" name="score" value="<?= $score ?>">
                        
                        <?php foreach ($current_q['options'] as $opt): ?>
                            <button type="submit" name="choice_value" value="<?= $opt['value'] ?>" 
                                    class="w-full max-w-lg bg-white border-2 border-stone-200 hover:border-emerald-500 hover:bg-emerald-50 text-stone-700 hover:text-emerald-800 transition-all p-4 rounded-xl font-bold text-left shadow-sm">
                                <?= htmlspecialchars($opt['text']) ?>
                            </button>
                        <?php endforeach; ?>
                    </form>
                </div>

            <?php else: ?>
                <?php
                    // 根據分數計算結果
                    if ($score <= 4) {
                        $icon = "🦋"; 
                        $title = "充滿好奇的鳳蝶"; 
                        $desc = "你熱愛自由與探索，對世界上美好的事物充滿好奇心！你不受拘束的靈魂最適合參加我們的「野外採集與生態觀察」課程，讓你在森林中盡情飛舞。";
                    } elseif ($score <= 7) {
                        $icon = "🪲"; 
                        $title = "沉穩專注的獨角仙"; 
                        $desc = "你做事專注、有耐心，且具備強大的觀察力！你非常適合從事研究工作，營隊中的「昆蟲標本製作實作坊」絕對能讓你發揮注重細節的特長。";
                    } else {
                        $icon = "🐜"; 
                        $title = "熱情活潑的螞蟻"; 
                        $desc = "你擁有絕佳的團隊精神與溝通能力，喜歡與人互動，絕對是營隊中的開心果！在大地遊戲與晚會中，你將會是帶領小隊突破重圍的靈魂人物。";
                    }
                ?>
                <div class="text-center w-full">
                    <h2 class="text-xl font-bold text-stone-500 mb-2">測驗結果出爐</h2>
                    <h3 class="text-2xl font-bold text-emerald-800 mb-6">你的靈魂昆蟲是：</h3>
                    
                    <div class="text-8xl mb-6 drop-shadow-md transition-transform hover:scale-110 duration-300"><?= $icon ?></div>
                    <h4 class="text-4xl font-black mb-4 text-stone-800"><?= $title ?></h4>
                    
                    <div class="bg-emerald-50 p-6 rounded-2xl mb-8 border border-emerald-100">
                        <p class="text-lg text-stone-700 leading-relaxed font-medium">
                            <?= $desc ?>
                        </p>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="register.php" class="bg-emerald-600 text-white px-8 py-3 rounded-full hover:bg-emerald-700 font-bold shadow-lg transition-transform hover:scale-105">
                            前往報名營隊
                        </a>
                        <a href="quiz.php" class="bg-stone-200 text-stone-700 px-8 py-3 rounded-full hover:bg-stone-300 font-bold transition-colors">
                            再測一次
                        </a>
                    </div>
                </div>

            <?php endif; ?>

        </div>
    </main>

    <footer class="bg-stone-900 text-stone-400 py-8 text-center mt-auto">
        <p>&copy; 2026 國立台灣大學昆蟲研習營. All rights reserved.</p>
    </footer>

</body>
</html>