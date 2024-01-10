<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント登録</title>
        <link rel="stylesheet" type="text/css" href="style2.css">
    </head>
    <body>
        
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['family_name'])||isset($_POST['last_name'])||isset($_POST['family_name_kana'])||isset($_POST['last_name_kana'])||isset($_POST['mail'])||isset($_POST['password'])||isset($_POST['gender'])||isset($_POST['postal_code'])||isset($_POST['prefecture'])||isset($_POST['address_1'])||isset($_POST['address_2'])||isset($_POST['authority'])) {
                $isset_status = 'POSTED, isset() True';
            } else {
                $isset_status = 'POSTED, isset() False';
                $_POST['family_name'] = '';
                $_POST['last_name'] = '';
                $_POST['family_name_kana'] = '';
                $_POST['last_name_kana'] = '';
                $_POST['mail'] = '';
                $_POST['password'] = '';
                $_POST['gender'] = '';
                $_POST['postal_code'] = '';
                $_POST['prefecture'] = '';
                $_POST['address_1'] = '';
                $_POST['address_2'] = '';
                $_POST['authority'] = '';
            }
        } else {
            $isset_status = 'started without POST';
            $_POST['family_name'] = '';
            $_POST['last_name'] = '';
            $_POST['family_name_kana'] = '';
            $_POST['last_name_kana'] = '';
            $_POST['mail'] = '';
            $_POST['password'] = '';
            $_POST['gender'] = '';
            $_POST['postal_code'] = '';
            $_POST['prefecture'] = '';
            $_POST['address_1'] = '';
            $_POST['address_2'] = '';
            $_POST['authority'] = '選択してください';
        }
        ?>
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
            <h2>アカウント登録画面</h2>
            <form name="myForm" class="validationForm" action="regist_confirm.php" method="post" novalidate>
                <div>
                    <label for="family_name">名前（姓）</label>
                    <input class="required pattern maxlength" type="text" id="family_name" name="family_name" size="35" value="<?php echo $_POST['family_name']; ?>" data-maxlength="10" data-pattern="name1" data-error-required="※名前（姓）が未入力です" data-error-pattern="ひらがなもしくは漢字で入力してください">
                </div>
                <br>
                <div>
                    <label for="last_name">名前（名）</label>
                    <input class="required pattern maxlength" type="text" id="last_name" name="last_name" size="35" value="<?php echo $_POST['last_name']; ?>" data-maxlength="10" data-pattern="name1"  data-error-required="※名前（名）が未入力です" data-error-pattern="ひらがなもしくは漢字で入力してください">
                </div>
                <br>
                <div>
                    <label for="family_name_kana">カナ（姓）</label>
                    <input class="required pattern maxlength" type="text" name="family_name_kana" size="35" id="family_name_kana" value="<?php echo $_POST['family_name_kana']; ?>" data-maxlength="10" data-pattern="name2" data-error-required="※カナ（姓）が未入力です" data-error-pattern="全角カナで入力してください">
                </div>
                <br>
                <div>
                    <label for="last_name_kana">カナ（名）</label>
                    <input class="required pattern maxlength" type="text" name="last_name_kana" size="35" id="last_name_kana" value="<?php echo $_POST['last_name_kana']; ?>" data-maxlength="10" data-pattern="name2" data-error-required="※カナ（名）が未入力です"　data-error-pattern="全角カナで入力してください">
                </div>
                <br>
                <div>
                    <label>メールアドレス</label>
                    <input class="required pattern maxlength" type="text" name="mail" id="mail" size="35" value="<?php echo $_POST['mail']; ?>" data-maxlength="100" data-pattern="email" data-error-pattern="半角英数字と@やドメインが必要です" data-error-required="※メールアドレスが未入力です">
                </div>
                <br>
                <div>
                    <label>パスワード</label>
                    <input class="required pattern maxlength" type="text" name="password" id="password" size="35" value="<?php echo $_POST['password']; ?>" data-maxlength="10" data-pattern="password"　data-error-pattern="半角英数字で入力してください" data-error-required="※パスワードが未入力です">
                </div>
                <br>
                <div class="seibetu">
                    <label>性別</label>
                    <input class="required" type="radio" id="man" name="gender" value="0" data-error-required="※男女どちらか選択してください" <?php if($_POST['gender'] == "0") echo 'checked' ?> checked>
                    <label for="man" class="gender">男</label>
                    <input type="radio" id="woman" name="gender" value="1" <?php if($_POST['gender'] == "1") echo 'checked' ?>>
                    <label for="woman" class="gender">女</label>   
                </div>
                <br>
                <div>
                    <label>郵便番号</label>
                    <input class="required pattern maxlength" id="postal_code" type="text" name="postal_code" size="15" value="<?php echo $_POST['postal_code']; ?>" data-maxlength="7" data-pattern="postal_code" data-error-pattern="半角数字7文字で入力してください" data-error-required="※郵便番号を入力してください">
                </div>
                <br>
                <div>
                    <label>住所（都道府県）</label>
                    <select class="required" name="prefecture" data-error-required="※都道府県が選択されていません"　id="prefecture">
                        <option value="" selected hidden></option>
                        <option value="北海道" <?php if($_POST['prefecture'] == "北海道") echo 'selected' ?>>北海道</option>
                        <option value="青森" <?php if($_POST['prefecture'] == "青森") echo 'selected' ?>>青森</option>
                        <option value="岩手" <?php if($_POST['prefecture'] == "岩手") echo 'selected' ?>>岩手</option>
                        <option value="宮城" <?php if($_POST['prefecture'] == "宮城") echo 'selected' ?>>宮城</option>
                        <option value="秋田" <?php if($_POST['prefecture'] == "秋田") echo 'selected' ?>>秋田</option>
                        <option value="山形" <?php if($_POST['prefecture'] == "山形") echo 'selected' ?>>山形</option><!--足りなかった（>）-->
                        <option value="福島" <?php if($_POST['prefecture'] == "福島") echo 'selected' ?>>福島</option>
                        <option value="茨城" <?php if($_POST['prefecture'] == "茨城") echo 'selected' ?>>茨城</option>
                        <option value="栃木" <?php if($_POST['prefecture'] == "栃木") echo 'selected' ?>>栃木</option>
                        <option value="群馬" <?php if($_POST['prefecture'] == "群馬") echo 'selected' ?>>群馬</option>
                        <option value="埼玉" <?php if($_POST['prefecture'] == "埼玉") echo 'selected' ?>>埼玉</option>
                        <option value="千葉" <?php if($_POST['prefecture'] == "千葉") echo 'selected' ?>>千葉</option>
                        <option value="東京" <?php if($_POST['prefecture'] == "東京") echo 'selected' ?>>東京</option>
                        <option value="神奈川" <?php if($_POST['prefecture'] == "神奈川") echo 'selected' ?>>神奈川</option>
                        <option value="新潟" <?php if($_POST['prefecture'] == "新潟") echo 'selected' ?>>新潟</option>
                        <option value="富山" <?php if($_POST['prefecture'] == "富山") echo 'selected' ?>>富山</option>
                        <option value="石川" <?php if($_POST['prefecture'] == "石川") echo 'selected' ?>>石川</option>
                        <option value="福井" <?php if($_POST['prefecture'] == "福井") echo 'selected' ?>>福井</option>
                        <option value="山梨" <?php if($_POST['prefecture'] == "山梨") echo 'selected' ?>>山梨</option>
                        <option value="長野" <?php if($_POST['prefecture'] == "長野") echo 'selected' ?>>長野</option>
                        <option value="岐阜" <?php if($_POST['prefecture'] == "岐阜") echo 'selected' ?>>岐阜</option>
                        <option value="静岡" <?php if($_POST['prefecture'] == "静岡") echo 'selected' ?>>静岡</option>
                        <option value="愛知" <?php if($_POST['prefecture'] == "愛知") echo 'selected' ?>>愛知</option>
                        <option value="三重" <?php if($_POST['prefecture'] == "三重") echo 'selected' ?>>三重</option>
                        <option value="滋賀" <?php if($_POST['prefecture'] == "滋賀") echo 'selected' ?>>滋賀</option>
                        <option value="京都" <?php if($_POST['prefecture'] == "京都") echo 'selected' ?>>京都</option>
                        <option value="大阪" <?php if($_POST['prefecture'] == "大阪") echo 'selected' ?>>大阪</option>
                        <option value="兵庫" <?php if($_POST['prefecture'] == "兵庫") echo 'selected' ?>>兵庫</option>
                        <option value="奈良" <?php if($_POST['prefecture'] == "奈良") echo 'selected' ?>>奈良</option>
                        <option value="和歌山" <?php if($_POST['prefecture'] == "和歌山") echo 'selected' ?>>和歌山</option>
                        <option value="鳥取" <?php if($_POST['prefecture'] == "鳥取") echo 'selected' ?>>鳥取</option>
                        <option value="島根" <?php if($_POST['prefecture'] == "島根") echo 'selected' ?>>島根</option>
                        <option value="岡山" <?php if($_POST['prefecture'] == "岡山") echo 'selected' ?>>岡山</option>
                        <option value="広島" <?php if($_POST['prefecture'] == "広島") echo 'selected' ?>>広島</option>
                        <option value="山口" <?php if($_POST['prefecture'] == "山口") echo 'selected' ?>>山口</option>
                        <option value="徳島" <?php if($_POST['prefecture'] == "徳島") echo 'selected' ?>>徳島</option>
                        <option value="香川" <?php if($_POST['prefecture'] == "香川") echo 'selected' ?>>香川</option>
                        <option value="愛媛" <?php if($_POST['prefecture'] == "愛媛") echo 'selected' ?>>愛媛</option>
                        <option value="高知" <?php if($_POST['prefecture'] == "高知") echo 'selected' ?>>高知</option>
                        <option value="福岡" <?php if($_POST['prefecture'] == "福岡") echo 'selected' ?>>福岡</option>
                        <option value="佐賀" <?php if($_POST['prefecture'] == "佐賀") echo 'selected' ?>>佐賀</option>
                        <option value="長崎" <?php if($_POST['prefecture'] == "長崎") echo 'selected' ?>>長崎</option>
                        <option value="熊本" <?php if($_POST['prefecture'] == "熊本") echo 'selected' ?>>熊本</option>
                        <option value="大分" <?php if($_POST['prefecture'] == "大分") echo 'selected' ?>>大分</option>
                        <option value="宮崎" <?php if($_POST['prefecture'] == "宮崎") echo 'selected' ?>>宮崎</option>
                        <option value="鹿児島" <?php if($_POST['prefecture'] == "鹿児島") echo 'selected' ?>>鹿児島</option>
                        <option value="沖縄" <?php if($_POST['prefecture'] == "沖縄") echo 'selected' ?>>沖縄</option>
                    </select>
                  
                </div>
                <br>
                <div>
                    <label>住所（市区町村）</label>
                    <input class="required pattern maxlength" id="address_1" type="text" name="address_1" size="35" value="<?php echo $_POST['address_1']; ?>" data-maxlength="10" data-error-required="※住所（市区町村）が未入力です" data-pattern="address" data-error-pattern="ひらがな、漢字、数字、カタカナ、ハイフン、スペースで入力してください">
                </div>
                <br>
                <div>
                    <label>住所（番地）</label>
                    <input class="required pattern maxlength" id="address_2" type="text" name="address_2" size="35" value="<?php echo $_POST['address_2']; ?>" data-maxlength="100" data-error-required="※住所（番地）が未入力です" data-pattern="address" data-error-pattern="ひらがな、漢字、数字、カタカナ、ハイフン、スペースで入力してください">
                    
                </div>
                <br>
                <div>
                    <label>アカウント権限</label>
                    <select name="authority" id="authority">
                        <option value="0" selected>一般</option>
                        <option value="1">管理者</option>
                    </select>
                </div>
                <br>
                <div>
                    <input id="sub" class="sub" type="submit" value="確認する">
                </div>


            </form>
        </main>
        <footer>
            Copyright Nishiteitoku| PG.blog is the one which provides A to Z about programing
        </footer>
        
        <script src="validation.js"></script>
       
    </body>
</html>