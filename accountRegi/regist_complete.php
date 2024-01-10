<?php
header('Location:./redirect.html');
date_default_timezone_set('Asia/Tokyo');
$formated_DATETIME = date('Y-m-d H:i:s');
mb_internal_encoding("utf8");
$origin_pass = $_POST['password'];
$hashed_pass = password_hash($origin_pass, PASSWORD_DEFAULT);
try {
    $pdo = new PDO("mysql:dbname=lesson03; host=localhost;", "root", "");
} catch (Exception $ex) {
    echo '<span style="color:#ff0000;">エラーが発生したためアカウント登録できません</span>';
    return false;
}

$pdo->exec("insert into account01(family_name,last_name,family_name_kana,last_name_kana,mail,password,gender,postal_code,prefecture,address_1,address_2,authority,delete_flag,registered_time,update_time)
values('".$_POST['family_name']."','".$_POST['last_name']."','".$_POST['family_name_kana']."','".$_POST['last_name_kana']."','".$_POST['mail']."','".$hashed_pass."','".$_POST['gender']."','".$_POST['postal_code']."','".$_POST['prefecture']."','".$_POST['address_1']."','".$_POST['address_2']."','".$_POST['authority']."','0','".$formated_DATETIME."','".$formated_DATETIME."');");

exit();
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント登録完了画面</title>
        <link rel="stylesheet" type="text/css" href="style3.css">
    </head>
    <body>
        <header>
            <img src="diblog_logo.jpg" alt="Logo" class="logo">
            <div class="menu">
                <a href="index.html">トップ</a>
                <a href="prof.html">プロフィール</a>
                <a href="blog.html">ブログについて</a>
                <a href="regist.php">アカウント登録</a>
                <a href="support.html">問い合わせ</a>
                <a href="other.html">その他</a>
            </div>
        </header>
        <main>
            <h2>アカウント登録完了画面</h2>
            <div class="confirm">
                <p id="kanryou">
                    登録完了しました
                </p>
                <input type="button" onclick="location.href='index.html'" value="TOPページへ戻る"　>
            </div>
        </main>
        <footer>
            Copyright Nishiteitoku| PG.blog is the one which provides A to Z about programing
        </footer>
        
    </body>
</html>