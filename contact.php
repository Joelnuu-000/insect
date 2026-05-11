<?php
// 引入 PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$message_status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars($_POST['name']);
    $email   = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $body    = nl2br(htmlspecialchars($_POST['message']));

    $mail = new PHPMailer(true);

    try {
        // --- SMTP 設定 (以 Gmail 為例) ---
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';             // SMTP 伺服器
        $mail->SMTPAuth   = true;
        $mail->Username   = 'tsungpin950118@gmail.com';       // 您的信箱
        $mail->Password   = 'eyhmeeyzflqsomni';          // 您的應用程式密碼 (非一般登入密碼)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->CharSet    = 'UTF-8';
    
        // --- 寄件者與收件者 ---
        $mail->setFrom('tsungpin950118@gmail.com', '臺大昆蟲營系統');
        $mail->addAddress('tsungpin950118@gmail.com');      // 接收通知的信箱
        $mail->addReplyTo($email, $name);                 // 使用者回信給誰

        // --- 內容設定 ---
        $mail->isHTML(true);
        $mail->Subject = "【聯絡諮詢】" . $subject;
        $mail->Body    = "<h3>收到來自 $name 的訊息</h3>
                          <p><b>電子信箱：</b>$email</p>
                          <p><b>內容：</b><br>$body</p>";

        $mail->send();
        $message_status = '<div class="bg-emerald-100 text-emerald-800 p-4 rounded-xl mb-6 font-bold text-center">✅ 訊息已成功送出，我們會儘快回覆您！</div>';
    } catch (Exception $e) {
        $message_status = '<div class="bg-red-100 text-red-800 p-4 rounded-xl mb-6 font-bold text-center">❌ 寄送失敗。錯誤原因: ' . $mail->ErrorInfo . '</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>聯絡我們 - 臺大昆蟲營</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-50 text-stone-800 font-sans antialiased pt-24">

    <?php include 'navbar.php'; ?>

    <main class="max-w-4xl mx-auto px-4 py-12">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-black text-emerald-800 mb-4">聯絡我們</h1>
            <p class="text-stone-600">對營隊有任何疑問嗎？歡迎透過下方表單或社群媒體與我們聯絡</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="space-y-6">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-100">
                    <h3 class="text-lg font-bold text-emerald-700 mb-2">電子信箱</h3>
                    <p class="text-stone-600">ntu2026insectcamp@gmail.com</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-100">
                    <h3 class="text-lg font-bold text-emerald-700 mb-2">社群媒體</h3>
                    <p class="text-stone-600">Facebook: 臺大昆蟲研習營</p>
                    <p class="text-stone-600">Instagram: @ntu_insectcamp</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-100">
                    <h3 class="text-lg font-bold text-emerald-700 mb-2">營隊地點</h3>
                    <p class="text-stone-600">106 臺北市大安區羅斯福路四段1號 學新館六樓 (臺灣大學昆蟲系)
                    </p>
                </div>
            </div>

            <div class="md:col-span-2 bg-white p-8 rounded-3xl shadow-xl border border-stone-100">
                <?= $message_status ?>
                <form action="contact.php" method="POST" class="space-y-4">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-bold text-stone-700 mb-1">您的姓名</label>
                            <input type="text" name="name" required class="w-full px-4 py-2 border border-stone-200 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-stone-700 mb-1">電子信箱</label>
                            <input type="email" name="email" required class="w-full px-4 py-2 border border-stone-200 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-stone-700 mb-1">主旨</label>
                        <input type="text" name="subject" required class="w-full px-4 py-2 border border-stone-200 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-stone-700 mb-1">訊息內容</label>
                        <textarea name="message" rows="5" required class="w-full px-4 py-2 border border-stone-200 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-emerald-600 text-white font-bold py-3 rounded-xl hover:bg-emerald-700 transition shadow-lg">
                        送出訊息
                    </button>
                </form>
            </div>
        </div>
    </main>

    <footer class="bg-stone-900 text-stone-400 py-12 text-center mt-20">
        <p>&copy; 2026 國立臺灣大學昆蟲研習營. All rights reserved.</p>
    </footer>

</body>
</html>