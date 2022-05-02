<?php 
//会員登録の入力内容の確認ページのコントローラー
session_start();

//定数呼び出し
require_once './const.php';
//関数呼び出し
require_once './func.php';

/* //急にこのページに来られたら入力画面に突き返す
if(!isset($_SESSION['name'])){
    header('location:./signup.php');
    exit;
} */

//この確認ページで「戻る」ボタンを押された場合
if(isset($_POST['state']) && $_POST['state'] == 'back'){//確認画面で戻るボタンを押された場合。
    //もう一度登録画面に戻るよ。
    header('location:./signup.php');
    exit;
}

//「登録」ボタンを押された場合
if(isset($_POST['state']) && $_POST['state'] == 'entry'){
    //SESSIONの受け取り（どっかのタイミングでこの子らSQLサニタイズをしなくては！）
    $name = $_SESSION['name'];
    $user_id = $_SESSION['user_id'];
    $password = $_SESSION['password'];
    $mail = $_SESSION['mail'];
    

    //値の加工処理(パスワード)
    //ソルトとなるランダムな文字列を生成
    $salt = uniqid();
    //ストレッチ回数となるランダムな数値を生成
    $stretch = rand(1000, 10000);
    //パスワードをハッシュ化します
    $hash_password = hash_val($password,$salt,$stretch);

    //SQL文作成
    $sql = "INSERT INTO user (name,mail,user_id,password,salt,stretch) VALUES ('" . $name . "','" . $mail . "','" . $user_id . "','" . $hash_password . "','" . $salt . "'," . $stretch .  ");";

    //DB接続
    $link = mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME);
    mysqli_set_charset($link , 'utf8');
    mysqli_query($link ,$sql);
    
    mysqli_close($link);

    header('location:./complete.php');
    exit;

}

//ビューの表示
require_once 'tpl/confirm.php';

?>