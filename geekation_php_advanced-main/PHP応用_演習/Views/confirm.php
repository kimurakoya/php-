<?php

if (!$_POST) {
    header("Location: contact.php'");
}
session_start();

$name = $_POST["fullname"];
$kana = $_POST["furigana"];
$tel = $_POST["tel"];
$mail = $_POST["mail"];
$body = $_POST["body"];

$_SESSION["fullname"] = $name;
$_SESSION["furigana"] = $kana;
$_SESSION["tel"] = $tel;
$_SESSION["mail"] = $mail;
$_SESSION["body"] = $body;
$_SESSION["button"] = $_POST["button"];

$error = 0;

if (empty($name) || mb_strlen($name) > 10) {
    $error = 1;
}
if (empty($kana) || mb_strlen($kana) > 10) {
    $error = 1;
}
if (!preg_match("/\A[0-9]+\z/", $tel)) {
    $error = 1;
}
if (empty($mail) || !preg_match("/\A([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9])+([a-zA-Z0-9._-])+([a-zA-Z0-9])+\z/", $mail)) {
    $error = 1;
}
if (empty($body)) {
    $error = 1;
}
if ($error == 1) {
    header("Location: contact.php");
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirm</title>
    <link rel="stylesheet" type="text/css" href="../css/base.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/inquiry.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css" />
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<body>

    <?php include('header.php'); ?>

    <section class="main_form">
        <div class="form_content">
            <h2>お問い合わせ</h2>
            <form action="complete.php" method="post">
                <p> 下記の内容をご確認の上送信ボタンを押してください</p>
                <p>内容を訂正する場合は戻るを押してください。</p>
                <dl class="confirm">

                    <dt>氏名</dt>
                    <dd><?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?></dd>

                    <dt>フリガナ</dt>
                    <dd><?= htmlspecialchars($kana, ENT_QUOTES, 'UTF-8') ?></dd>

                    <dt>電話番号</dt>
                    <dd><?= htmlspecialchars($tel, ENT_QUOTES, 'UTF-8') ?></dd>

                    <dt>メールアドレス</dt>
                    <dd><?= htmlspecialchars($mail, ENT_QUOTES, 'UTF-8') ?></dd>

                    <dt>お問い合わせ内容</dt>
                    <dd><?= nl2br(htmlspecialchars($body, ENT_QUOTES, 'UTF-8')) ?></dd>

                    <dd class="mit_btm">
                        <input type="submit" value="送信" class="contact_btn">
                        <input type="button" onclick="history.back()" value="戻る" class="return_btn">
                    </dd>

                    <input type="hidden" name="name" value="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>">
                    <input type="hidden" name="kana" value="<?= htmlspecialchars($kana, ENT_QUOTES, 'UTF-8') ?>">
                    <input type="hidden" name="tel" value="<?= htmlspecialchars($tel, ENT_QUOTES, 'UTF-8') ?>">
                    <input type="hidden" name="mail" value="<?= htmlspecialchars($mail, ENT_QUOTES, 'UTF-8') ?>">
                    <input type="hidden" name="body" value="<?= htmlspecialchars($body, ENT_QUOTES, 'UTF-8') ?>">

                </dl>
            </form>

        </div>
    </section>


    <?php include('footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
    <script src="script.js" defer></script>
</body>

</html>
