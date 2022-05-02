<?php 
//会員登録の入力ページのコントローラー
session_start();

//定数呼び出し
require_once './const.php';
//関数呼び出し
require_once './func.php';

//確認ページで「戻る」を押された時
//（ボタンのstateにbackが入りセッションに値が入っている時）に、前に入力された値（パスワード以外）を表示してあげるための処理
if(isset($_SESSION['name'])){
    $_POST['name'] = $_SESSION['name'];
    $_POST['user_id'] = $_SESSION['user_id'];
    $_POST['mail'] = $_SESSION['mail'];
    session_destroy();
    //再度パスワード入力を促すメッセージ
    $err['password'] = 'もう一度パスワードを入力してください。';
}

//[確認]ボタンを押された時
if(isset($_POST['state']) && $_POST['state'] == 'confirm'){
    //入力値チェック
    $err = [];//エラーメッセージ入れるための配列作ります。
    //名前のエラーメッセージ
    if($_POST['name'] == ''){//未入力ですか？
        $err['name'] = '名前を入力してください。';
    }
    //ログインIDのエラーメッセージ
    if($_POST['user_id'] == ''){//未入力ですか？
        $err['user_id'] = 'ユーザーIDを入力してください。';
    }
    elseif(check_digit($_POST['user_id'],6,12,1) !== false){   //ログインIDの桁数が6〜12桁かどうか
        $err['user_id'] = check_digit($_POST['user_id'],6,12,1);
    }
    //パスワードのエラーメッセージ
    if($_POST['password'] == ''){//未入力ですか？
        $err['password'] = 'パスワードを入力してください。';
    }
    //メールアドレスのエラーメッセージ
    if($_POST['mail'] == ''){//未入力ですか？
        $err['mail'] = 'メールアドレスを入力してください。';
    }
    elseif(strpos($_POST['mail'],'@') == false){   //＠が入っているかどうか
        $err['mail'] = '@を含めてメールアドレスを入力してください。';
    }

    //以上のエラーチェックを全てクリアした場合。（エラーメッセージを入れるための配列が空だったら。）
    if(count($err) == 0){
       //入力されたデータをセッションに突っ込んで、入力内容の確認画面（チェック画面）に飛んでけ〜。
       $_SESSION['name'] = $_POST['name'];
       $_SESSION['user_id'] = $_POST['user_id'];
       $_SESSION['password'] = $_POST['password'];
       $_SESSION['mail'] = $_POST['mail'];
        
        //入力内容の確認ページへ遷移
        header('location:./confirm.php');
        exit;
       
    }
}


//ビューの表示
require_once 'tpl/signup.php';

?>