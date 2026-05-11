<?php
// admin.php
session_start();

// 1. 設定後台登入密碼
$admin_password = 'ntu'; 

// 2. 處理登入與登出邏輯
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
    if ($_POST['password'] === $admin_password) {
        $_SESSION['is_admin'] = true;
        header("Location: admin.php"); 
        exit;
    } else {
        $error_msg = "密碼錯誤！";
    }
}
if (isset($_GET['logout'])) {
    session_destroy(); 
    header("Location: admin.php"); 
    exit;
}

// ==========================================
// 若未登入，顯示登入畫面
// ==========================================
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>昆蟲營 - 後台管理登入</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-900 h-screen flex items-center justify-center font-sans">
    <form method="POST" class="bg-white p-10 rounded-3xl shadow-2xl w-full max-w-md text-center">
        <h1 class="text-3xl font-black text-emerald-800 mb-2">後台管理系統</h1>
        <p class="text-stone-500 mb-8">NTU Insect Camp CMS</p>
        <?php if(isset($error_msg)): ?>
            <div class="bg-red-100 text-red-600 p-3 rounded-xl mb-6 font-bold animate-bounce"><?= $error_msg ?></div>
        <?php endif; ?>
        <input type="hidden" name="action" value="login">
        <input type="password" name="password" required class="w-full px-4 py-3 border border-stone-300 rounded-xl mb-6 outline-none focus:ring-2 focus:ring-emerald-500" placeholder="請輸入管理員密碼">
        <button type="submit" class="w-full bg-emerald-600 text-white font-bold py-3 rounded-xl hover:bg-emerald-700 transition">進入系統</button>
    </form>
</body>
</html>
<?php 
    exit; 
}

// ==========================================
// 已登入狀態：連接 SQLite 與處理資料
// ==========================================
$db_file = __DIR__ . '/camp_data.sqlite';
$pdo = new PDO('sqlite:' . $db_file);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 建立資料表 (若不存在)
$pdo->exec("CREATE TABLE IF NOT EXISTS faqs (id INTEGER PRIMARY KEY AUTOINCREMENT, question TEXT, answer TEXT)");
$pdo->exec("CREATE TABLE IF NOT EXISTS site_texts (key_name TEXT PRIMARY KEY, content_value TEXT)");

// 處理 POST 請求 (新增 FAQ 或 更新文字)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    
    // 更新首頁文字
    if ($_POST['action'] === 'update_texts') {
        $stmt = $pdo->prepare("REPLACE INTO site_texts (key_name, content_value) VALUES (?, ?)");
        foreach ($_POST['texts'] as $key => $val) { 
            $stmt->execute([$key, $val]); 
        }
        header("Location: admin.php?page=texts&msg=saved"); 
        exit;
    }
    
    // 新增 FAQ
    if ($_POST['action'] === 'add_faq') {
        $stmt = $pdo->prepare("INSERT INTO faqs (question, answer) VALUES (?, ?)");
        $stmt->execute([trim($_POST['question']), trim($_POST['answer'])]);
        header("Location: admin.php?page=faq&msg=added"); 
        exit;
    }
}

// 處理 GET 請求 (刪除 FAQ)
if (isset($_GET['delete_faq'])) {
    $stmt = $pdo->prepare("DELETE FROM faqs WHERE id = ?");
    $stmt->execute([$_GET['delete_faq']]);
    header("Location: admin.php?page=faq&msg=deleted"); 
    exit;
}

// 當前頁面路由 (預設顯示文字管理)
$page = $_GET['page'] ?? 'texts';
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>昆蟲營 - CMS 控制面板</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-50 text-stone-800 font-sans flex h-screen overflow-hidden">

    <aside class="w-64 bg-stone-900 text-stone-300 flex flex-col shrink-0">
        <div class="p-6 border-b border-stone-800 text-center">
            <h2 class="text-xl font-black text-white tracking-widest">管理選單</h2>
            <span class="text-emerald-500 text-sm font-bold">NTU Insect CMS</span>
        </div>
        <nav class="flex-1 p-4 space-y-2">
            <a href="?page=texts" class="block px-4 py-3 rounded-xl font-bold transition <?= $page=='texts' ? 'bg-emerald-600 text-white' : 'hover:bg-stone-800 hover:text-white' ?>">
                首頁內容管理
            </a>
            <a href="?page=faq" class="block px-4 py-3 rounded-xl font-bold transition <?= $page=='faq' ? 'bg-emerald-600 text-white' : 'hover:bg-stone-800 hover:text-white' ?>">
                常見問題 (FAQ)
            </a>
            <div class="pt-4 mt-4 border-t border-stone-800">
                <a href="index.php" target="_blank" class="block px-4 py-3 rounded-xl text-stone-400 hover:text-white hover:bg-stone-800 transition">
                    預覽前台首頁 ↗
                </a>
                <a href="faq.php" target="_blank" class="block px-4 py-3 rounded-xl text-stone-400 hover:text-white hover:bg-stone-800 transition">
                    預覽 FAQ 頁面 ↗
                </a>
            </div>
        </nav>
        <div class="p-4 border-t border-stone-800">
            <a href="?logout=true" class="block text-center text-red-400 hover:text-red-300 font-bold py-2 transition">登出系統</a>
        </div>
    </aside>

    <main class="flex-1 overflow-y-auto p-8 lg:p-12">
        
        <?php if(isset($_GET['msg'])): ?>
            <div class="bg-emerald-100 text-emerald-800 px-6 py-4 rounded-xl mb-8 font-bold border border-emerald-200 shadow-sm inline-block">
                <?php 
                    if($_GET['msg'] === 'saved') echo "✅ 文字內容已成功儲存！";
                    if($_GET['msg'] === 'added') echo "✅ 新問題已成功新增！";
                    if($_GET['msg'] === 'deleted') echo "🗑️ 問題已成功刪除！";
                ?>
            </div>
        <?php endif; ?>

        <?php if ($page === 'texts'): 
            $texts = $pdo->query("SELECT * FROM site_texts")->fetchAll(PDO::FETCH_KEY_PAIR);
            $v = function($k) use ($texts) { return htmlspecialchars($texts[$k] ?? ''); }; 
        ?>
            <h1 class="text-3xl font-black mb-8 text-stone-800">首頁內容管理</h1>
            
            <form method="POST" class="bg-white p-8 rounded-3xl shadow-sm border border-stone-200 space-y-10">
                <input type="hidden" name="action" value="update_texts">
                
                <section>
                    <h3 class="text-xl font-bold text-emerald-700 border-b-2 border-emerald-100 pb-2 mb-6">主視覺區 (Hero)</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block font-bold text-stone-700 mb-2">標籤 (Badge)</label>
                            <input type="text" name="texts[index_hero_badge]" value="<?= $v('index_hero_badge') ?>" class="w-full px-4 py-3 border border-stone-300 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none">
                        </div>
                        <div>
                            <label class="block font-bold text-stone-700 mb-2">主標題</label>
                            <input type="text" name="texts[index_hero_title]" value="<?= $v('index_hero_title') ?>" class="w-full px-4 py-3 border border-stone-300 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block font-bold text-stone-700 mb-2">副標題</label>
                            <input type="text" name="texts[index_hero_sub]" value="<?= $v('index_hero_sub') ?>" class="w-full px-4 py-3 border border-stone-300 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block font-bold text-stone-700 mb-2">YouTube 影片 ID <span class="text-sm text-stone-400 font-normal">(網址 v= 後方的字串，例如 _aSBiOmaALA)</span></label>
                            <input type="text" name="texts[index_video_id]" value="<?= $v('index_video_id') ?>" class="w-full px-4 py-3 border border-stone-300 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none font-mono">
                        </div>
                    </div>
                </section>

                <section>
                    <h3 class="text-xl font-bold text-emerald-700 border-b-2 border-emerald-100 pb-2 mb-6">區塊一 (圖左文右)</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block font-bold text-stone-700 mb-2">標題 <span class="text-sm text-stone-400 font-normal">(若要換行請直接按 Enter)</span></label>
                            <textarea name="texts[s1_title]" rows="2" class="w-full px-4 py-3 border border-stone-300 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none leading-relaxed"><?= $v('s1_title') ?></textarea>
                        </div>
                        <div>
                            <label class="block font-bold text-stone-700 mb-2">內文說明</label>
                            <textarea name="texts[s1_desc]" rows="4" class="w-full px-4 py-3 border border-stone-300 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none leading-relaxed"><?= $v('s1_desc') ?></textarea>
                        </div>
                    </div>
                </section>

                <section>
                    <h3 class="text-xl font-bold text-emerald-700 border-b-2 border-emerald-100 pb-2 mb-6">區塊二 (文左圖右)</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block font-bold text-stone-700 mb-2">標題</label>
                            <textarea name="texts[s2_title]" rows="2" class="w-full px-4 py-3 border border-stone-300 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none leading-relaxed"><?= $v('s2_title') ?></textarea>
                        </div>
                        <div>
                            <label class="block font-bold text-stone-700 mb-2">內文說明</label>
                            <textarea name="texts[s2_desc]" rows="4" class="w-full px-4 py-3 border border-stone-300 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none leading-relaxed"><?= $v('s2_desc') ?></textarea>
                        </div>
                    </div>
                </section>

                <div class="pt-6 border-t border-stone-100">
                    <button type="submit" class="bg-emerald-600 text-white px-10 py-4 rounded-xl font-bold hover:bg-emerald-700 transition shadow-lg text-lg">
                        儲存所有更改
                    </button>
                </div>
            </form>
        <?php endif; ?>

        <?php if ($page === 'faq'): ?>
            <h1 class="text-3xl font-black mb-8 text-stone-800">FAQ 常見問題管理</h1>
            
            <div class="grid lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-1">
                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-stone-200 sticky top-8">
                        <h3 class="text-xl font-bold text-emerald-800 mb-6 border-b border-stone-100 pb-4">新增問題</h3>
                        <form method="POST" class="space-y-4">
                            <input type="hidden" name="action" value="add_faq">
                            <div>
                                <label class="block text-sm font-bold text-stone-700 mb-2">問題 (Q)</label>
                                <input type="text" name="question" required class="w-full px-4 py-3 border border-stone-300 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-stone-700 mb-2">回答 (A)</label>
                                <textarea name="answer" rows="6" required class="w-full px-4 py-3 border border-stone-300 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none leading-relaxed"></textarea>
                            </div>
                            <button type="submit" class="w-full bg-emerald-600 text-white font-bold py-3 rounded-xl hover:bg-emerald-700 transition shadow">
                                儲存新增
                            </button>
                        </form>
                    </div>
                </div>

                <div class="lg:col-span-2 space-y-4">
                    <h3 class="text-lg font-bold text-stone-500 mb-4">目前網頁上的問題清單</h3>
                    <?php 
                    $faqs = $pdo->query("SELECT * FROM faqs ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
                    if (empty($faqs)): ?>
                        <div class="bg-white p-12 rounded-3xl border border-dashed border-stone-300 text-center text-stone-500">
                            目前尚無資料，請從左側新增。
                        </div>
                    <?php else: ?>
                        <?php foreach ($faqs as $faq): ?>
                            <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200 flex justify-between gap-6 hover:border-emerald-300 transition group">
                                <div class="flex-1">
                                    <h4 class="font-bold text-stone-800 text-lg mb-2"><span class="text-emerald-500 mr-2">Q:</span><?= htmlspecialchars($faq['question']) ?></h4>
                                    <p class="text-stone-600 leading-relaxed whitespace-pre-line"><span class="font-bold text-emerald-600 mr-2">A:</span><?= htmlspecialchars($faq['answer']) ?></p>
                                </div>
                                <div class="shrink-0 pt-1">
                                    <a href="?page=faq&delete_faq=<?= $faq['id'] ?>" onclick="return confirm('確定要刪除這筆常見問題嗎？');" class="text-red-500 bg-red-50 hover:bg-red-500 hover:text-white px-4 py-2 rounded-lg text-sm font-bold transition">
                                        刪除
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

    </main>

</body>
</html>