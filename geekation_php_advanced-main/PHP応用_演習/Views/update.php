<?php
require_once(ROOT_PATH . '/Controllers/CasteriaController.php');
$casteria = new CasteriaController();
// $casteria->update();

//var_dump($casteria);
// if (!$_POST) {
//     header("Location: contact.php'");
// }
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
    header("Location: edit.php?data_edit=".$_POST['id']);
    exit();
}
$data = $_POST;

$casteria = $casteria->update($data);

$_SESSION = array();
session_destroy();
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete</title>
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
            <div class="complete_content">
                <p>
                    お問い合わせ頂きありがとうございます。<br>
                    送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。<br>
                    なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。
                </p>
                <a href="index.php">トップへ戻る</a>
            </div>
        </div>
    </section>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
    <script src="script.js" defer></script>
</body>

</html>
