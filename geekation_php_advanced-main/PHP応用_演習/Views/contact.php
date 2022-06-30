<?php
session_start();
require_once(ROOT_PATH . '/Controllers/CasteriaController.php');
$casteria = new CasteriaController();
$params = $casteria->index();
?>

<!DOCTYPE html>
<html lang="ja">

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

<body>

    <?php include 'header.php'; ?>

    <section class="main_form">
        <div class="form_content">
            <h2>お問い合わせ</h2>
            <form action="confirm.php" method="post">
                <p class="bgc">下記の項目をご記入の上送信ボタンを押してください</p>
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
                        if (isset($_SESSION["fullname"])) {
                            echo $_SESSION["fullname"];
                        }?>">
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
                        if (isset($_SESSION["furigana"])) {
                            echo $_SESSION["furigana"];
                        }?>">
                    </dt>

                    <dd>
                        <label for="tel">電話番号</label>
                        <span class="color1">*</span>
                    </dd>
                    <dt>
                      <?php
                      if (!empty($_SESSION["button"])) {
                          if (empty($_SESSION["tel"])) {
                          } elseif (!preg_match("/\A[0-9]+\z/", $_SESSION["tel"])) {
                              echo '<font color = "red">電話番号は0-9の数字のみでご入力ください。</font> ';
                          }
                      }
                      ?>
                    </dt>
                    <dt>
                        <input type="text" placeholder="09012345678" name="tel" id="tel" value = "<?php
                        if (isset($_SESSION["tel"])) {
                            echo $_SESSION["tel"];
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
                        if (isset($_SESSION["mail"])) {
                            echo $_SESSION["mail"];
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
                        <textarea name="body" id="body" cols="30" rows="10"></textarea>
                    </dd>
                    <dd>
                        <button type="submit" name = "button" class="contact_btn" id="button" value = "送信">送信</button>
                    </dd>
                </dl>
            </form>
        </div>
    </section>

    <table border="1">
        <tr>
            <th>氏名</th>
            <th>フリガナ</th>
            <th>電話番号</th>
            <th>メールアドレス</th>
            <th>内容</th>
            <th></th>
        </tr>

        <?php foreach ($params as $param) :?>
        <?php foreach ($param as $data) :?>
        <tr>
            <td><?php echo htmlspecialchars($data['name']) ?></td>
            <td><?php echo htmlspecialchars($data['kana']) ?></td>
            <td><?php echo htmlspecialchars($data['tel']) ?></td>
            <td><?php echo htmlspecialchars($data['email']) ?></td>
            <td><?php echo nl2br(htmlspecialchars($data['body'])) ?></td>


            <form action="edit.php" method="GET">
                <td>
                    <button name="data_edit" value="<?= $data["id"] ?>">編集</button>
                </td>
            </form>

            <form action="delete.php" method="post">
                <td id="delete">
                    <button id="db_delete" name="data_delete" value="<?= $data["id"] ?>
                    "onClick="return confirm('本当に削除しますか？')">削除</button>
                </td>
            </form>
        <tr>

        <?php endforeach ;?>
        <?php endforeach ;?>

    </table>
    <?php include 'footer.php'; ?>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
    <script src="script.js" defer></script>
</body>

</html>
