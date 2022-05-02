<!-- 会員登録ページのビュー -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">

    <link rel="stylesheet" type="text/css" href="css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css"/>
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/slick.min.js"></script>
    <title>ぱかナビ｜ログイン</title>
</head>
<body>
<div id="wrapper">

<header><!-- サイト内全体の共通ヘッダーとするなら、ヘッダーのみの別ファイルを作成する -->
    <h1 class="logo">PakaNavi<br><span>ぱかナビ</span></h1>
    <div class="add_line">
      <!-- <div class="imgBox"><img src="./images/user/<?php echo $id;?>/thumb_<?php echo $img;?>" alt="プロフィール画像"></div> -->
      <!-- <div id="welcome"><?php echo isset($name)?$name:'';?></div>
      <form class="mobile" action="./top.php" method="post">
        <button type="submit" name="state" value="logout" class="logout_btn<?php echo isset($logout_class)?$logout_class:'';?>">
          ログアウト
        </button>
        <a href="./login.php" class="login_link<?php echo isset($login_class)?$login_class:'';?>">
          ログイン
        </a>
      </form> -->
      <button id="menu_btn">メニュー</button>
    </div>
    
  </header>
  <nav class="modal none">
    <div class="modal_back"></div>
    <button id="close_btn" class="none">close</button>
    <ul>
      <li><a href="#">TOP</a></li>
      <li><a href="#News">今週の注目レース</a></li>
      <li><a href="#Ranking">アイドルホースランキング</a></li>
      <li><a href="#PickUp">Pick up ホース</a></li>
      <li><a href="#Prediction">予想してみよう！</a></li>
      <li>
        <form class="logout_btn" action="./top.php" method="post">
          <button type="submit" name="state" value="logout" class="logout_btn<?php echo isset($logout_class)?$logout_class:'';?>">
            ログアウト
          </button>
          <a href="./login.php" class="login_link<?php echo isset($login_class)?$login_class:'';?>">
            ログイン
          </a>
        </form>
      </li>
    </ul>
  </nav>
        
  <main>
    <article>
        <p class="back_allow"><a href="./top.php">＜</a></>
      <form action="./login.php" method="POST">
        <div class="_intro">
            <h2>ログイン</h2>
            <p>ユーザーIDとパスワードを入力してください。</p>
            <p class="err_msg"><?php echo isset($err['msg'])?$err['msg']:'';?></p>
        </div>

        <div class="input_wrap">
            <label class="title">ユーザーID</label>
            <div class="input_set">
                <input type="text" name="user_id" value="<?php echo isset($_POST['user_id'])?$_POST['user_id']:'';?>">
                <p class="err"><?php echo isset($err['user_id'])?$err['user_id']:'';?></p>
            </div>
        </div>

        <div class="input_wrap">
            <label class="title">パスワード</label>
            <div class="input_set">
                <input type="password" name="password" value="">
                <p class="err"><?php echo isset($err['password'])?$err['password']:'';?></p>
            </div>
        </div>

        <button class="login_blue" type="submit" name="state" value="login">ログイン</button>

        <div class="kochira">
            <h4>アカウントをお持ちでない方</h4>
            <p class="link"><a href="./signup.php">会員登録はこちら</a></p>
        </div>
      </form>
    </article>
  </main>

    <footer><!-- 全ページ共通であれば、フッターのみの別ファルにし呼び出す -->
        <small>©︎2022 paka-navi</small>
    </footer>
</div><!-- wrapper -->
<script src="js/add.js"></script>
</body>
</html>