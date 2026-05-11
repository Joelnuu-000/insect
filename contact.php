<?php
/**
 * contact.php - 鱗的執行人 聯絡表單完整版
 * 針對 Railway 雲端環境優化連線設定
 */

// 1. 強制延長 PHP 執行上限，避免 30 秒超時錯誤
set_time_limit(60);

// 引入 PHPMailer 套件 (請確保你已透過 composer 安裝)
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

$message_sent = false;
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);

    try {
        // --- SMTP 伺服器設定 ---
        // 2. 開啟 Debug 模式：這會將連線過程輸出到 Railway 的 Deploy Logs 中
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
        
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        
        // 3. 帳號資訊 (建議之後改用 Railway 環境變數 Environment Variables)
        $mail->Username   = 'tsungpin950118@gmail.com';       // 您的信箱
        $mail->Password   = 'eyhmeeyzflqsomni'; // 請務必確認已申請「應用程式密碼」
        
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // 強制使用 SSL (Port 465)
        $mail->Port       = 465;
        $mail->CharSet    = 'UTF-8';

        // 4. 解決 Railway 超時的核心：忽略 SSL 憑證驗證
        // 雲端容器時常因為找不到本地 CA 憑證而卡死在連線階段
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        // --- 收件人與內容設定 ---
        $user_email = $_POST['email'];
        $user_name  = $_POST['name'];
        $user_msg   = $_POST['message'];

        $mail->setFrom('tsungpin950118@gmail.com', '鱗的執行人-官網系統');
        $mail->addAddress('tsungpin950118@gmail.com'); // 收件人改為你自己，或是營隊信箱
        $mail->addReplyTo($user_email, $user_name);

        $mail->isHTML(true);
        $mail->Subject = "=?UTF-8?B?".base64_encode("【新聯絡訊息】來自：$user_name")."?=";
        $mail->Body    = "
            <h3>收到新的聯絡訊息</h3>
            <p><b>姓名：</b> {$user_name}</p>
            <p><b>信箱：</b> {$user_email}</p>
            <p><b>內容：</b><br>{$user_msg}</p>
            <hr>
            <p>本信件由 ntuinstectcamp 系統自動發送</p>
        ";

        $mail->send();
        $message_sent = true;
    } catch (Exception $e) {
        // 將錯誤訊息記錄下來，方便前端顯示
        $error_message = "郵件發送失敗。錯誤原因: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>聯絡我們 - 鱗的執行人</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-50 text-stone-800 pt-24">
    <?php include 'navbar.php'; ?>

    <div class="max-w-2xl mx-auto px-6 py-12 bg-white shadow-xl rounded-3xl border border-stone-100">
        <h2 class="text-3xl font-black mb-8 text-emerald-800">聯絡我們</h2>

        <?php if ($message_sent): ?>
            <div class="bg-emerald-100 border border-emerald-400 text-emerald-700 px-6 py-4 rounded-xl mb-6">
                訊息已成功寄出！我們會儘快回覆您。
            </div>
            <a href="index.php" class="text-emerald-600 font-bold hover:underline">← 回首頁</a>
        <?php else: ?>
            
            <?php if ($error_message): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-xl mb-6 text-sm">
                    <strong>發送出錯：</strong><br>
                    請檢查 Railway Deploy Logs 以取得完整偵錯資訊。
                </div>
            <?php endif; ?>

            <form action="contact.php" method="POST" class="space-y-6">
                <div>
                    <label class="block text-sm font-bold text-stone-600 mb-2">您的姓名</label>
                    <input type="text" name="name" required class="w-full px-4 py-3 rounded-xl border border-stone-200 focus:ring-2 focus:ring-emerald-500 outline-none transition">
                </div>
                <div>
                    <label class="block text-sm font-bold text-stone-600 mb-2">電子信箱</label>
                    <input type="email" name="email" required class="w-full px-4 py-3 rounded-xl border border-stone-200 focus:ring-2 focus:ring-emerald-500 outline-none transition">
                </div>
                <div>
                    <label class="block text-sm font-bold text-stone-600 mb-2">訊息內容</label>
                    <textarea name="message" rows="5" required class="w-full px-4 py-3 rounded-xl border border-stone-200 focus:ring-2 focus:ring-emerald-500 outline-none transition"></textarea>
                </div>
                <button type="submit" class="w-full bg-emerald-600 text-white font-black py-4 rounded-xl hover:bg-emerald-700 transition shadow-lg active:scale-[0.98]">
                    發送訊息
                </button>
            </form>
        <?php endif; ?>
    </div>

    <footer class="mt-20 py-10 text-center text-stone-400 text-sm">
        &copy; 2026 國立台灣大學昆蟲研習營 ‧ 鱗的執行人
    </footer>
</body>
</html>