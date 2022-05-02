<!-- ログインページのビュー -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;900&display=swap" rel="stylesheet">
    <!-- CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="css/destyle.css"> --><!-- ブラウザの設定をデスタイル -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css"/>
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/slick.min.js"></script>
    <title>ぱかナビ｜TOP</title>
</head>
<body>
<div id="wrapper">

  <header><!-- サイト内全体の共通ヘッダーとするなら、ヘッダーのみの別ファイルを作成する -->
    <h1 class="logo">PakaNavi<br><span>ぱかナビ</span></h1>
    <div class="add_line">
      <!-- <div class="imgBox"><img src="./images/user/<?php echo $id;?>/thumb_<?php echo $img;?>" alt="プロフィール画像"></div> -->
      <div id="welcome"><?php echo isset($name)?$name:'';?></div>
      <form class="mobile" action="./top.php" method="post">
        <button type="submit" name="state" value="logout" class="logout_btn<?php echo isset($logout_class)?$logout_class:'';?>">
          ログアウト
        </button>
        <a href="./login.php" class="login_link<?php echo isset($login_class)?$login_class:'';?>">
          ログイン
        </a>
      </form>
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
    <div id="first_view">
      <img src="images/illust4.png" alt="">
      <p class="pakanavi">PakaNavi<br><span>ぱかナビ</span></p>
    </div>

    <article id="About">
      <div class="box">
        <h2>
          <span>ウマ</span>にときめく、<br>
          とっておきの週末。
        </h2>
        <div><img src="images/girls1.png" alt=""></div>
        <div><img src="images/girls2.jpeg" alt=""></div>
        <p>女性のケイバはとっても自由で、どんな楽しみかたもアリだから。<br>
          ココロのままに、欲張りに遊んじゃおう。</p>
        <div class="right">
          <p>ウマにときめく、とっておきの週末。</p>
          <p class="happy">私たちのハッピーは、<br><span>ウマ</span>に乗ってやってくる。</p>
        </div>
      </div>
    </article>
        
    <article id="Ranking">
      <h2 class="shadow">IDOL HORSE Ranking</h2>
      <p>
        みんなが選ぶNo.1アイドルホースはどのウマなのか・・？！<br>
        ランキング一覧ページより投票受付中！
      </p>
      <!-- とりあえずトップ３のみをトップページには掲載予定
      画像をふわふわとランク順に表示させたい -->
      <div class="rank_list">
        <?php foreach($ranking_list as $key => $rank){?>
          <section>
            <p>No.<?php echo $key+1;?></p>
            <div class="img_wrap"><img src="images/<?php echo $rank['img'];?>" alt="<?php echo $rank['name'];?>の画像1"></div>
            <h3><?php echo $rank['name'];?></h3>
            <p class="vote_cnt"><?php echo $rank['vote_cnt'];?> 票</p>
          </section>
        <?php }?>
      </div>
      <p class="link_btn"><a href="ranking.php">ランキングを見る</a></p>
    </article>

    <!-- <article>
      <h2 id="Prediction">予想してみよう！</h2>
      <p><a href="prediction.php"></a></p>
    </article> -->

    <article id="PickUp">
      <h2 class="shadow">Pick Up🐴</h2>
      <!-- DBから情報を引っ張ってくる形で作れそう。システム組み込みの余地あり。 -->
      <?php foreach($pick as $one){?>
      <div class="info_wrap">
        <div class="uma_info">
          <h3><?php echo $one['name']; ?></h3>
          <p>Meikei Yell</p>
          <p>生年月日：<?php echo $one['birth'];?></p>
          <p class="<?php echo $one['gender'];?>"><?php echo $one['gender']=='F'?'女の子':'男の子';?></p>
          <form  action="./top.php" method="post">
            <button class="kawaii_btn" type="submit" name="state" value="kawaii">❤️ かわいい！<br><span class="kawaii-count"><?php echo $one['kawaii_cnt'];?></span></button>
            <button class="cheer_btn" type="submit" name="state" value="cheer">📣 ファイト！<br><span class="cheer-count"><?php echo $one['cheer_cnt'];?></span></button>
          </form>
        </div>
        <!-- スライダーにできたらなぁって感じ。
        スライダーにできなくても必ず可愛さが伝わるような画像配置にする。-->
        <div class="img_wrap">
          <img src="images/meikei_yell1.jpeg" alt="<?php echo $one['name']; ?>の可愛い画像">
        </div>
      </div>
      
      <dl class="tekisei">
        <div class="baba">
          <dt>馬場適性</dt>
          <dd>
            <ul>
              <li>芝<span class="<?php echo $one['turf'];?>"><?php echo $one['turf'];?></span></li>   <!-- spanの中にある評価はclassで色を変える -->
              <li>ダート<span class="<?php echo $one['dirt'];?>"><?php echo $one['dirt'];?></span></li>
              <li class="no_show"></li>
              <li class="no_show"></li>
            </ul>
          </dd>
        </div>
        <div class="distance">
          <dt>距離適性</dt>
          <dd>
            <ul>
              <li>短距離<span class="<?php echo $one['sprint'];?>"><?php echo $one['sprint'];?></span></li>
              <li>マイル<span class="<?php echo $one['mile'];?>"><?php echo $one['mile'];?></span></li>
              <li>中距離<span class="<?php echo $one['middle'];?>"><?php echo $one['middle'];?></span></li>
              <li>長距離<span class="<?php echo $one['long'];?>"><?php echo $one['long'];?></span></li>
            </ul>
          </dd>
        </div>
        <div class="kyakushitsu">
          <dt>脚質適性</dt>
          <dd>
            <ul>
              <li>逃げ<span class="<?php echo $one['lead_pace'];?>"><?php echo $one['lead_pace'];?></span></li>
              <li>先行<span class="<?php echo $one['front_runner'];?>"><?php echo $one['front_runner'];?></span></li>
              <li>差し<span class="<?php echo $one['hold_up_runner'];?>"><?php echo $one['hold_up_runner'];?></span></li>
              <li>追込<span class="<?php echo $one['late_charge_drive'];?>"><?php echo $one['late_charge_drive'];?></span></li>
            </ul>
          </dd>
        </div>
        <div class="tokusei">
          <dt>特性</dt>
          <dd>
            <?php echo $one['character'];?>
          </dd>
        </div>
        <div class="win_race">
          <dt>主な勝ちレース</dt>
          <!-- APIかスクレイピングをぶっ込みたいポイント -->
          <dd>
            <div class="slider">
              <div><iframe width="560" height="315" src="https://www.youtube.com/embed/I8dQi88zTMM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
              <div><iframe width="560" height="315" src="https://www.youtube.com/embed/CPomddobIEc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
              <div><iframe width="560" height="315" src="https://www.youtube.com/embed/ODGuyCZSLeo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
            </div>
          </dd>
        </div>
      </dl>
      <?php }?>
    </article>
    <article id="News">
      <h2 class="shadow">News</h2>
      <div id="container">
        <div id="itemA">
          <h3>今週の注目レース</h3>
          <!-- ここでAPI使えたらなぁ。レース情報をJRA公式から持って来れたら強い。 -->
          <ul>
            <li>
              <p class="place">東京</p>
              <p class="date">2月12日</p>
              <p class="day_week">土曜</p>
              <p class="rase">デイリー杯クイーンCGⅢ</p>
            </li>
            <li>
              <p class="place">東京</p>
              <p class="date">2月13日</p>
              <p class="day_week">日曜</p>
              <p class="rase">共同通信杯GⅢ</p>
            </li>
            <li>
              <p class="place">阪神</p>
              <p class="date">2月13日</p>
              <p class="day_week">日曜</p>
              <p class="rase">京都記念GⅡ</p>
            </li>
          </ul>
        </div>
        <div id="itemB">
          <img src="images/idol_horse1.jpeg" alt="アイドルホース新商品1">
        </div>
        <div id="itemC">
          <img src="images/idol_horse2.jpeg" alt="アイドルホース新商品2">
        </div>
      </div>

    </article>

        
  </main>

  <footer><!-- 全ページ共通であれば、フッターのみの別ファルにし呼び出す -->
    <small>©︎2022 paka-navi</small>
  </footer>
</div><!-- wrapper -->
<script src="js/add.js"></script>
</body>
</html>