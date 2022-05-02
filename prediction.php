<?php 
//予想してみよう！のコントローラー
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
}/* else{
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
} */
//[ログアウト]ボタンを押された時
if(isset($_POST['state']) && $_POST['state'] == 'logout'){
    //Cookieを消す
    setcookie('id','',time() - 60 * 60);
    setcookie('page','',time() - 60 * 60);
    session_destroy();
    $logout_class = ' none';
    $login_class = '';
}


//ビューの表示
require_once 'tpl/prediction.php　';
?>