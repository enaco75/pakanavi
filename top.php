<?php 
//サイトTOPページのコントローラー
session_start();

//定数呼び出し
require_once './const.php';
//関数呼び出し
require_once './func.php';

//初期化などの値設定
$pickup_horse = 'メイケイエール';
$kawaii_cnt = '';
$cheer_cnt = '';
//基本はログインしてる設定
$login_class = ' none';
$logout_class = '';

//ログインせずにページを開いた場合
if(!isset($_COOKIE['id'])){
    $logout_class = ' none';
    $login_class = '';
}
//[ログアウト]ボタンを押された時
if(isset($_POST['state']) && $_POST['state'] == 'logout'){
    //Cookieを消す
    setcookie('id','',time() - 60 * 60);
    setcookie('page','',time() - 60 * 60);
    session_destroy();
    $logout_class = ' none';
    $login_class = '';
    /* header('location:./login.php');
    exit; */
}

//＝＝＝＝＝　データベースへの連結部分　＝＝＝＝＝
//===== かわいい！orがんばれ！ボタンを押した時の処理 =====
if(isset($_POST['state']) && $_POST['state'] == 'kawaii'){
    $sql_kawaii = "UPDATE horse SET kawaii_cnt = kawaii_cnt + 1 WHERE pickup_flg = 1;";
    //DB接続
    $link = mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME);
    mysqli_set_charset($link , 'utf8');
    mysqli_query($link ,$sql_kawaii);
    mysqli_close($link);
    header('location:./top.php#PickUp');
    exit;
}
if(isset($_POST['state']) && $_POST['state'] == 'cheer'){
    $sql_cheer = "UPDATE horse SET cheer_cnt = cheer_cnt + 1 WHERE pickup_flg = 1;";
    //DB接続
    $link = mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME);
    mysqli_set_charset($link , 'utf8');
    mysqli_query($link ,$sql_cheer);
    mysqli_close($link);
    header('location:./top.php#PickUp');
    exit;
}

//===== Pick up処理 =====
$sql_pickup = "SELECT * FROM horse WHERE name ='" . $pickup_horse . "';";
//DB連結したい
$link = mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME);
mysqli_set_charset($link , 'utf8');
$result = mysqli_query($link ,$sql_pickup);
$row = mysqli_fetch_assoc($result);
$pick[] = $row;
mysqli_close($link);

/* $pick_name = $pick['name'];
$pick_gender = $pick['gender'];
$pick_birth = $pick['birth'];
$pick_kawaii = $pick['kawaii_cnt'];
$pick_cheer = $pick['cheer_cnt'];
$pick_turf = $pick['turf'];
$pick_dirt = $pick['dirt'];
$pick_sprint = $pick['sprint'];
$pick_mile = $pick['mile'];
$pick_middle = $pick['middle'];
$pick_long = $pick['long'];
$pick_lead_pace = $pick['lead_pace'];
$pick_front_runner = $pick['front_runner'];
$pick_hold_up_runner = $pick['hold_up_runner'];
$pick_late_charge_drive = $pick['late_charge_drive'];
$pick_character = $pick['character']; */




//===== ランキング処理 =====
//Pick upされていない馬の中から投票数が多いものを降順で３件取得するSQL
$sql_top3 = "SELECT * FROM horse WHERE pickup_flg = 0 ORDER BY vote_cnt DESC LIMIT 0,3;";
//DB連結したい
$link = mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME);
mysqli_set_charset($link , 'utf8');
//続いて、DBから1ページ分のデータをとってくる
$result = mysqli_query($link ,$sql_top3);    //５件分だけ取ってきた状態
while($row = mysqli_fetch_assoc($result)){  //そいつを1行ずつ取っていくぜ
    $ranking_list[] = $row; //配列に突っ込むぜ
}
mysqli_close($link);

//ビューの表示
require_once 'tpl/top.php';

?>