<?php
// history.php
$upload_dir = 'uploads/';
if (!is_dir($upload_dir)) mkdir($upload_dir, 0755, true);
$upload_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['camp_photo'])) {
    $file = $_FILES['camp_photo'];
    $allowed_exts = ['jpg', 'jpeg', 'png', 'webp'];
    $file_ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if ($file['error'] === UPLOAD_ERR_OK && in_array($file_ext, $allowed_exts) && $file['size'] <= 5 * 1024 * 1024) {
        $destination = $upload_dir . uniqid('camp_') . '.' . $file_ext;
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            $upload_message = '<p class="text-emerald-600 font-bold mb-4">✅ 照片上傳成功！</p>';
        }
    } else {
        $upload_message = '<p class="text-red-500 font-bold mb-4">❌ 格式錯誤或超過 5MB。</p>';
    }
}
$uploaded_photos = glob($upload_dir . '*.{jpg,jpeg,png,webp}', GLOB_BRACE) ?: [];
rsort($uploaded_photos);
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>歷屆營隊 - 台大昆蟲營</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-50 text-stone-800 font-sans antialiased pt-24">

    <?php include 'navbar.php'; ?>

    <main class="max-w-6xl mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-10 text-emerald-800 border-b-2 border-emerald-200 pb-4">歷屆營隊紀錄</h1>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-100 mb-10">
            <h2 class="text-xl font-bold mb-4">新增活動照片</h2>
            <?= $upload_message ?>
            <form action="history.php" method="POST" enctype="multipart/form-data" class="flex flex-col sm:flex-row gap-4">
                <input type="file" name="camp_photo" accept="image/*" required class="block w-full text-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                <button type="submit" class="bg-emerald-600 text-white px-8 py-2 rounded-full hover:bg-emerald-700 font-bold shadow">上傳</button>
            </form>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php foreach ($uploaded_photos as $photo): ?>
                <div class="aspect-square bg-stone-100 rounded-xl overflow-hidden shadow-sm">
                    <img src="<?= htmlspecialchars($photo) ?>" class="w-full h-full object-cover hover:scale-110 transition duration-500">
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>