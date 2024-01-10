<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント登録確認画面</title>
        <link rel="stylesheet" type="text/css" href="style2.css">
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
            <h2>アカウント登録確認画面</h2>
            
            <div><p>名前（姓）</p><span><?php echo $_POST['family_name']; ?></span></div>
            <div><p>名前（名）</p><span><?php echo $_POST['last_name']; ?></span></div>
            <div><p>カナ（姓）</p><span><?php echo $_POST['family_name_kana']; ?></span></div>
            <div><p>カナ（名）</p><span><?php echo $_POST['last_name_kana']; ?></span></div>
            <div><p>メールアドレス</p><span><?php echo $_POST['mail']; ?></span></div>
            <div><p>パスワード</p><span>
                <?php 
                    $passlength = mb_strlen($_POST['password']);
                    for ($i = 0; $i < $passlength; $i++) {
                        echo '●';
                    }
                ?>
                </span></div>
            <div><p>性別</p><span>
                <?php
                    $gender = $_POST['gender'];
                    if ($gender == 0) {
                        echo "男"; 
                    } else {
                        echo "女";
                    }
                ?>
                </span></div>
            <div><p>郵便番号</p><span><?php echo $_POST['postal_code']; ?></span></div>
            <div><p>住所（都道府県）</p><span><?php echo $_POST['prefecture']; ?></span></div>
            <div><p>住所（市区町村）</p><span><?php echo $_POST['address_1']; ?></span></div>
            <div><p>住所（番地）</p><span><?php echo $_POST['address_2']; ?></span></div>
            <div><p>アカウント権限</p><span>
                <?php 
                    $authority = $_POST['authority'];
                    if ($authority == 0) {
                        echo "一般"; 
                    } else {
                        echo "管理者";
                    }
                ?>
                </span></div>
            
            <div class="button">
                <form action="regist.php" method="post">
                    <input class="back" type="submit" class="button1" value="前に戻る">
                    <input type="hidden" value="<?php echo $_POST['family_name']; ?>" name="family_name">
                    <input type="hidden" value="<?php echo $_POST['last_name']; ?>" name="last_name">
                    <input type="hidden" value="<?php echo $_POST['family_name_kana']; ?>" name="family_name_kana">
                    <input type="hidden" value="<?php echo $_POST['last_name_kana']; ?>" name="last_name_kana">
                    <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
                    <input type="hidden" value="<?php echo $_POST['password']; ?>" name="password">
                    <input type="hidden" value="<?php echo $_POST['gender']; ?>" name="gender">
                    <input type="hidden" value="<?php echo $_POST['postal_code']; ?>" name="postal_code">
                    <input type="hidden" value="<?php echo $_POST['prefecture']; ?>" name="prefecture">
                    <input type="hidden" value="<?php echo $_POST['address_1']; ?>" name="address_1">
                    <input type="hidden" value="<?php echo $_POST['address_2']; ?>" name="address_2">
                    <input type="hidden" value="<?php echo $_POST['authority']; ?>" name="authority">
                </form>
            
           
                <form action="regist_complete.php" method="post">
                    <input class="go" type="submit" class="button2" value="登録する">
                    <input type="hidden" value="<?php echo $_POST['family_name']; ?>" name="family_name">
                    <input type="hidden" value="<?php echo $_POST['last_name']; ?>" name="last_name">
                    <input type="hidden" value="<?php echo $_POST['family_name_kana']; ?>" name="family_name_kana">
                    <input type="hidden" value="<?php echo $_POST['last_name_kana']; ?>" name="last_name_kana">
                    <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
                    <input type="hidden" value="<?php echo $_POST['password']; ?>" name="password">
                    <input type="hidden" value="<?php echo $_POST['gender']; ?>" name="gender">
                    <input type="hidden" value="<?php echo $_POST['postal_code']; ?>" name="postal_code">
                    <input type="hidden" value="<?php echo $_POST['prefecture']; ?>" name="prefecture">
                    <input type="hidden" value="<?php echo $_POST['address_1']; ?>" name="address_1">
                    <input type="hidden" value="<?php echo $_POST['address_2']; ?>" name="address_2">
                    <input type="hidden" value="<?php echo $_POST['authority']; ?>" name="authority">
                    
                </form>
            </div>
            
        </main>
        <footer>
            Copyright Nishiteitoku| PG.blog is the one which provides A to Z about programing
        </footer>
        
    </body>
</html>