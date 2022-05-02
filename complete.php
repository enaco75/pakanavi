<?php 
//会員登録完了ページのコントローラー
session_start();

//定数呼び出し
require_once './const.php';
//関数呼び出し
require_once './func.php';

//不正なアクセスをされた場合
if(!isset($_SESSION['name'])){
    header('location:./entry.php');
    exit;
}
//今回はSESSIONの受け取り要らないでしょう！！
//てことで！destroyだけ！
/* $name = $_SESSION['name'];
$user_id = $_SESSION['user_id'];
$password = $_SESSION['password'];
$mail = $_SESSION['mail']; */
session_destroy();


//ビューの表示
require_once 'tpl/complete.php';

?>