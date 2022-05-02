<!-- 予想してみよう！ページのビュー -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/destyle.css"><!-- ブラウザの設定を一旦デスタイル -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>ぱかナビ｜予想してみよう！</title>
</head>
<body>
<div id="wrapper">

  <header><!-- サイト内全体の共通ヘッダーとするなら、ヘッダーのみの別ファイルを作成する -->
        
    <div class="add_line">
      <div class="imgBox"><img src="./images/user/<?php echo $id;?>/thumb_<?php echo $img;?>" alt="プロフィール画像"></div>
      <div id="welcome"><?php echo isset($name)?$name:'';?></div>
      
      <form class="logout_btn" action="./top.php" method="post">
        <button type="submit" name="state" value="logout" class="logout_btn<?php echo isset($logout_class)?$logout_class:'';?>">
          ログアウト
        </button>
        <a href="./login.php" class="login_link<?php echo isset($login_class)?$login_class:'';?>">ログイン</a>
      </form>
    </div>
  </header>
    
  <main>
    <h2>予想してみよう！</h2>
    <!-- 投票できたら空文字じゃなくなる -->
    <div id="voted_msg"><?php echo isset($voted_msg)?$voted_msg:'';?></div>
    <!-- ランキングを全て表示
    画像をふわふわとランク順に表示させたい -->
    <?php foreach($ranking_list as $key => $rank){?>
      <section>
        <p>No.<?php echo $key+1;?></p>
        <h3><?php echo $rank['name'];?></h3>
        <img src="" alt="<?php echo $rank['name'];?>の画像1">
        <button class="modalbtn" data-name="<?php echo $rank['name'];?>" data-value="<?php echo $rank['id'];?>" onclick="modal()">投票する</button>
      </section>
    <?php }?>

    <div class="modal voteFadeOut">
      <div class="modal_back"></div>
      <div class="modal_contents">
        <form action="./ranking.php" method="post">
          <h3 class="voted_name"></h3>
          <img src="" alt="" class="voted_img">
          <p>このアイドルホースに投票しますか？</p>
          <button class="voted_btn" type="submit" name="vote">投票する</button>
          <button class="cancel_btn">キャンセル</button>
        </form>
      </div>
    </div>
    <p><a href="top.php">サイトトップへ戻る</a></p>
  </main>

  <footer><!-- 全ページ共通であれば、フッターのみの別ファルにし呼び出す -->
    <small>©︎2022 paka-navi</small>
  </footer>
</div><!-- wrapper -->
<script src="js/add.js"></script>
</body>
</html>