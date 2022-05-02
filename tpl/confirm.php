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
    <title>ぱかナビ｜会員登録確認</title>
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
        
    <main class="main_list">
        <article class="form_wrap">
            <form action="./confirm.php" method="POST">
                <div class="_intro">
                    <h2>入力内容の確認</h2>
                    <p>
                    入力した内容を確認してください。<br>
                    変更があれば「<strong>戻る</strong>」、
                    変更がなければ「<strong>登録</strong>」<br>
                    を押してください。
                    </p>
                </div>
                <dl class="input_wrap">
                    <dt class="title">氏名</dt>
                    <dd class="input_set"><?php echo $_SESSION['name'];?></dd>
                </dl>
                <dl class="input_wrap">
                    <dt class="title">メールアドレス</dt>
                    <dd class="input_set"><?php echo $_SESSION['mail'];?></dd>
                </dl>
                <dl class="input_wrap">
                    <dt class="title">ユーザーID</dt>
                    <dd class="input_set"><?php echo $_SESSION['user_id'];?></dd>
                </dl>
    
                <dl class="input_wrap">
                    <dt class="title">パスワード</dt>
                    <dd class="input_set"><?php echo str_repeat('●' , strlen($_SESSION['password']));?></dd>
                </dl>
    
                <p class="check_msg">上記の内容で登録します。</p>
                
        
                <div class="btn_wrap">
                    <button class="login_blue" type="submit" name="state" value="entry">登録する　▶︎</button>
                    <button class="clear_btn" type="submit" name="state" value="back" class="back">◀︎　戻る</button>
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