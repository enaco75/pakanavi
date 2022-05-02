<?php 
//会員登録の入力内容の確認ページのコントローラー
session_start();

//定数呼び出し
require_once './const.php';
//関数呼び出し
require_once './func.php';

//ログインボタンを押された時
$err=[];//エラーメッセージ入れるための配列作ります。
if(isset($_POST['state']) && $_POST['state'] == 'login'){//ログインボタンを押された場合にはエラーチェックをします。
    
    //ログインIDのエラーメッセージ
    if($_POST['user_id'] == ''){//未入力ですか？
        $err['user_id'] = 'ログインIDを入力してください。';
    }
    
    //パスワードのエラーメッセージ
    if($_POST['password'] == ''){//未入力ですか？
        $err['password'] = 'パスワードを入力してください。';
    }

    //以上の未入力チェックを全てクリアした場合
    if(count($err) == 0){
        //POSTの受け取り
        $user_id = $_POST['user_id'];
        $password = $_POST['password'];

        //登録内容との照合をします
        //DB接続
        $link = mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME);
        mysqli_set_charset($link , 'utf8');
            $user_id = sql_sanitize($link,$user_id);
            //入力されたログインIDがそもそも存在するのか？
            $sql = "SELECT * FROM user WHERE user_id = '" . $user_id . "';";
            $result = mysqli_query($link ,$sql);
            $row_cnt = mysqli_num_rows($result);
            //ログインIDが見つかった場合
            if($row_cnt !== 0){
                while($row = mysqli_fetch_assoc($result)){
                    //DBにあるデータを使ってパスワードの照合をする
                    $salt = $row['salt'];
                    $stretch_cnt = $row['stretch'];
                    //パスワードをハッシュ化します
                    $hash_password = hash_val($password,$salt,$stretch_cnt);
                    if($hash_password == $row['password']){
                        //Cookieに会員のidを設定します。
                        setcookie('id',$row['id'],time() + 60 * 60);
                        //break;  //ここでwhileのループを抜ける
                        mysqli_close($link);
                        //ログインIDとパスワードが一致していた場合。会員専用画面に飛ばそう。
                        if(isset($_SESSION['voting'])){
                            session_destroy();
                            header('location:./ranking.php');
                            exit; 
                        }
                        header('location:./top.php');
                        exit;
                    }
                } 
            }
            //該当するログインIDがなかった時
            $err['msg'] = 'ユーザーIDもしくはパスワードが間違っています。';
            $_POST['user_id'] = $user_id; //入力されたログインIDを再表示するため
        
        mysqli_close($link);
    }

}

//ビューの表示
require_once 'tpl/login.php';

?>