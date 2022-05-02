<?php 
//ランキング一覧&投票のコントローラー
session_start();

//定数呼び出し
require_once './const.php';
//関数呼び出し
require_once './func.php';

//基本はログインしてる設定
$login_class = ' none';
$logout_class = '';

//ログインせずにページを開いた場合
if(!isset($_COOKIE['id'])){
    $logout_class = ' none';
    $login_class = '';
}else{
    $sql_userstate = "SELECT vote_horse_id FROM user WHERE id = " . $_COOKIE['id'] . ";";
    //DB接続
    $link = mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME);
    mysqli_set_charset($link , 'utf8');
    $result = mysqli_query($link ,$sql_userstate);
    $row = mysqli_fetch_assoc($result);
    $userstate = $row;
    mysqli_close($link);
    if($userstate !== NULL){
        $voted_msg = $userstate['vote_horse_id'];
    }
}
//[ログアウト]ボタンを押された時
if(isset($_POST['state']) && $_POST['state'] == 'logout'){
    //Cookieを消す
    setcookie('id','',time() - 60 * 60);
    setcookie('page','',time() - 60 * 60);
    session_destroy();
    $logout_class = ' none';
    $login_class = '';
}

//===== 投票処理 =====
if(isset($_POST['vote']) && is_numeric($_POST['vote']) == true){
    if(!isset($_COOKIE['id'])){
        $_SESSION['voting'] = 'voting';
        header('location:./login.php');
        exit;
    }
    $vote_id = $_POST['vote'];
    $sql_vote = "UPDATE horse SET vote_cnt = vote_cnt + 1 WHERE id = " . $vote_id . ";";
    //DB接続
    $link = mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME);
    mysqli_set_charset($link , 'utf8');
    mysqli_query($link ,$sql_vote);
    $sql_update = "UPDATE user SET vote_horse_id = " . $vote_id . " WHERE id = " . $_COOKIE['id'] . ";";
    mysqli_query($link ,$sql_update);
    mysqli_close($link);
    $voted_msg = $vote_id;
}

//===== ランキング処理 =====
//Pick upされていない馬の中から投票数が多いものを降順で３件取得するSQL
$sql_top3 = "SELECT * FROM horse WHERE pickup_flg = 0 ORDER BY vote_cnt DESC;";
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
require_once 'tpl/ranking.php';
?>