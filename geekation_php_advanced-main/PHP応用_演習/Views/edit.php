<?php
session_start();
require_once(ROOT_PATH . '/Controllers/CasteriaController.php');
$casteria = new CasteriaController();
// $casteria->get($_GET);
$edit = $casteria->get($_GET['data_edit']);
foreach ($edit as $param) {

}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/base.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/inquiry.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css" />
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>contact</title>
</head>

<!DOCTYPE html>
<html lang="ja">
<?php// include('head.php') ?>

<body>
  <?php include 'header.php'; ?>

  <section class="main_form">
      <div class="form_content">
          <h2>編集</h2>
          <form action="update.php" method="post" class="form-updb">
              <p class="bgc">下記の項目をご記入の上更新ボタンを押してください</p>
              <p>送信頂いた件につきましては、当社より折り返しご連絡差し上げます。</p>
              <p>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
              <p><span class="color1">*</span>は必須事項となります。</p>

              <dl class="form_dl">

                  <dd>
                      <label for="fullname">氏名</label>
                      <span class="color1">*</span>
                  </dd>


                  <dt>
                    <?php
                    if (!empty($_SESSION["button"])) {
                        if (empty($_SESSION["fullname"]) || mb_strlen($_SESSION["fullname"]) > 10) {
                            echo '<font color = "red">氏名は必須入力です。10文字以内でご入力ください。</font> ';
                        }
                    }
                    ?>
                  </dt>
                  <dt>
                      <input type="text" placeholder="山田太郎" name="fullname" id="fullname" value = "<?php
                        if (isset($param["name"])) {
                            echo $param["name"];
                        }
                        ?>">

                  </dt>

                  <dd>
                      <label for="furigana">フリガナ</label>
                      <span class="color1">*</span>
                  </dd>
                  <dt>
                    <?php
                    if (!empty($_SESSION["button"])) {
                        if (empty($_SESSION["furigana"]) || mb_strlen($_SESSION["furigana"]) > 10) {
                            echo '<font color = "red">フリガナは必須入力です。10文字以内でご入力ください。</font> ';
                        }
                    }
                    ?>
                  </dt>
                  <dt>
                      <input type="text" placeholder="ヤマダタロウ" name="furigana" id="furigana" value = "<?php
                        if (isset($param["kana"])) {
                            echo $param["kana"];
                        }?>">
                  </dt>

                  <dd>
                      <label for="tel">電話番号</label>
                      <span class="color1">*</span>
                  </dd>
                  <dt>
                    <?php
                    if (!empty($_SESSION["button"])) {
                        if (empty($param["tel"])) {
                        } elseif (!preg_match("/\A[0-9]+\z/", $param["tel"])) {
                            echo '<font color = "red">電話番号は0-9の数字のみでご入力ください。</font> ';
                        }
                    }
                    ?>
                  </dt>
                  <dt>
                      <input type="text" placeholder="09012345678" name="tel" id="tel" value = "<?php
                        if (isset($param["tel"])) {
                            echo $param["tel"];
                        }?>">
                  </dt>

                  <dd>
                      <label for="mail">メールアドレス</label>
                      <span class="color1">*</span>
                  </dd>
                  <dt>
                    <?php
                    if (!empty($_SESSION["button"])) {
                        if (empty($_SESSION["mail"]) || !preg_match("/\A([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9])+([a-zA-Z0-9._-])+([a-zA-Z0-9])+\z/", $_SESSION["mail"])) {
                            echo '<font color = "red">メールアドレスは正しくご入力ください。</font> ';
                        }
                    }
                    ?>
                  </dt>
                  <dt>
                      <input type="text" placeholder="test@test.co.jp" name="mail" id="mail" value = "<?php
                        if (isset($param["email"])) {
                            echo $param["email"];
                        }?>">
                  </dt>

              </dl>

              <p class="bgc">お問い合わせ内容をご記入ください<span class="color1">*</span></p>
              <dt>
                <?php
                if (!empty($_SESSION["button"])) {
                    if (empty($_SESSION["body"])) {
                        echo '<font color = "red">お問い合わせは必須入力です。</font> ';
                    }
                }
                ?>
              </dt>

              <dl class="form_dl">
                  <dd>
                      <textarea name="body" id="body" cols="30" rows="10"><?php
                        if (isset($param["body"])) {
                            echo $param["body"];
                        }?></textarea>
                  </dd>
                  <dd>
                      <button type="submit" name = "button" class="contact_btn" id="button" value = "送信">更新</button>
                  </dd>
                  <input type="hidden" name="id" value="<?php echo htmlspecialchars($param['id']) ?>">
                  <input type="hidden" name="session" value="session">
              </dl>
          </form>

      </div>
  </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
  <script src="script.js" defer></script>

</body>
