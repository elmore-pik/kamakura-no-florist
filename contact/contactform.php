<?php
//データベースに接続


//変数の初期化
$page_flag = 0;
$clean = array();
$errors = array();

//サニタイズ
if (!empty($_POST)) {
  foreach ($_POST as $key => $value) {
    $clean[$key] = htmlspecialchars($value, ENT_QUOTES);
  }
}

if (!empty($clean['btn_confirm'])) {

  $errors = validation($clean);

  if (empty($errors)) {

    $page_flag = 1;

    //セッションの書き込み
    session_start();
    $_SESSION['page'] = true;
  }
} elseif (!empty($clean['btn_submit'])) {

  session_start();
  if (!empty($_SESSION['page']) && $_SESSION['page'] === true) {

    //セッションの削除
    unset($_SESSION['page']);

    $page_flag = 2;

    //変数とタイムゾーンを初期化
    $header = null;
    $auto_reply_subject = null;
    $auto_reply_text = null;
    $admin_reply_subject = null;
    $admin_reply_text = null;
    date_default_timezone_set('Asia/Tokyo');

    //日本語の使用宣言
    mb_language("ja");
    mb_internal_encoding("UTF-8");

    //ヘッダー情報を設定
    $header = "MIME-Version: 1.0\n";
    $header .= "From: Kamakura no Florist. <ofuna123@kamakura-no-florist.com>\n";
    $header .= "Reply: Kamakura no Florist. <ofuna123@kamakura-no-florist.com>\n";

    //件名を設定
    $auto_reply_subject = 'お問い合わせありがとうございます。';

    //本文を設定
    $auto_reply_text = "この度は、お問い合わせ頂き誠にありがとうございます。下記の内容でお問い合わせを受け付けました。\n\n";
    $auto_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
    $auto_reply_text .= "お名前：" . $clean['onamae'] . "\n";
    $auto_reply_text .= "郵便番号：" . $clean['zip'] . "\n";
    if ($clean['pref'] === "1") {
      $auto_reply_text .= '都道府県：北海道' . "\n";
    } elseif ($clean['pref'] === "2") {
      $auto_reply_text .= '都道府県：青森県' . "\n";
    } elseif ($clean['pref'] === "3") {
      $auto_reply_text .= '都道府県：岩手県' . "\n";
    } elseif ($clean['pref'] === "4") {
      $auto_reply_text .= '都道府県：宮城県' . "\n";
    } elseif ($clean['pref'] === "5") {
      $auto_reply_text .= '都道府県：秋田県' . "\n";
    } elseif ($clean['pref'] === "6") {
      $auto_reply_text .= '都道府県：山形県' . "\n";
    } elseif ($clean['pref'] === "7") {
      $auto_reply_text .= '都道府県：福島県' . "\n";
    } elseif ($clean['pref'] === "8") {
      $auto_reply_text .= '都道府県：茨城県' . "\n";
    } elseif ($clean['pref'] === "9") {
      $auto_reply_text .= '都道府県：栃木県' . "\n";
    } elseif ($clean['pref'] === "10") {
      $auto_reply_text .= '都道府県：群馬県' . "\n";
    } elseif ($clean['pref'] === "11") {
      $auto_reply_text .= '都道府県：埼玉県' . "\n";
    } elseif ($clean['pref'] === "12") {
      $auto_reply_text .= '都道府県：千葉県' . "\n";
    } elseif ($clean['pref'] === "13") {
      $auto_reply_text .= '都道府県：東京都' . "\n";
    } elseif ($clean['pref'] === "14") {
      $auto_reply_text .= '都道府県：神奈川県' . "\n";
    } elseif ($clean['pref'] === "15") {
      $auto_reply_text .= '都道府県：新潟県' . "\n";
    } elseif ($clean['pref'] === "16") {
      $auto_reply_text .= '都道府県：富山県' . "\n";
    } elseif ($clean['pref'] === "17") {
      $auto_reply_text .= '都道府県：石川県' . "\n";
    } elseif ($clean['pref'] === "18") {
      $auto_reply_text .= '都道府県：福井県' . "\n";
    } elseif ($clean['pref'] === "19") {
      $auto_reply_text .= '都道府県：山梨県' . "\n";
    } elseif ($clean['pref'] === "20") {
      $auto_reply_text .= '都道府県：長野県' . "\n";
    } elseif ($clean['pref'] === "21") {
      $auto_reply_text .= '都道府県：岐阜県' . "\n";
    } elseif ($clean['pref'] === "22") {
      $auto_reply_text .= '都道府県：静岡県' . "\n";
    } elseif ($clean['pref'] === "23") {
      $auto_reply_text .= '都道府県：愛知県' . "\n";
    } elseif ($clean['pref'] === "24") {
      $auto_reply_text .= '都道府県：三重県' . "\n";
    } elseif ($clean['pref'] === "25") {
      $auto_reply_text .= '都道府県：滋賀県' . "\n";
    } elseif ($_POST['pref'] === "26") {
      $auto_reply_text .= '都道府県：京都府' . "\n";
    } elseif ($_POST['pref'] === "27") {
      $auto_reply_text .= '都道府県：大阪府' . "\n";
    } elseif ($clean['pref'] === "28") {
      $auto_reply_text .= '都道府県：兵庫県' . "\n";
    } elseif ($clean['pref'] === "29") {
      $auto_reply_text .= '都道府県：奈良県' . "\n";
    } elseif ($clean['pref'] === "30") {
      $auto_reply_text .= '都道府県：和歌山県' . "\n";
    } elseif ($clean['pref'] === "31") {
      $auto_reply_text .= '都道府県：鳥取県' . "\n";
    } elseif ($clean['pref'] === "32") {
      $auto_reply_text .= '都道府県：島根県' . "\n";
    } elseif ($clean['pref'] === "33") {
      $auto_reply_text .= '都道府県：岡山県' . "\n";
    } elseif ($clean['pref'] === "34") {
      $auto_reply_text .= '都道府県：広島県' . "\n";
    } elseif ($clean['pref'] === "35") {
      $auto_reply_text .= '都道府県：山口県' . "\n";
    } elseif ($clean['pref'] === "36") {
      $auto_reply_text .= '都道府県：徳島県' . "\n";
    } elseif ($clean['pref'] === "37") {
      $auto_reply_text .= '都道府県：香川県' . "\n";
    } elseif ($clean['pref'] === "38") {
      $auto_reply_text .= '都道府県：愛媛県' . "\n";
    } elseif ($clean['pref'] === "39") {
      $auto_reply_text .= '都道府県：高知県' . "\n";
    } elseif ($clean['pref'] === "40") {
      $auto_reply_text .= '都道府県：福岡県' . "\n";
    } elseif ($clean['pref'] === "41") {
      $auto_reply_text .= '都道府県：佐賀県' . "\n";
    } elseif ($clean['pref'] === "42") {
      $auto_reply_text .= '都道府県：長崎県' . "\n";
    } elseif ($clean['pref'] === "43") {
      $auto_reply_text .= '都道府県：熊本県' . "\n";
    } elseif ($clean['pref'] === "44") {
      $auto_reply_text .= '都道府県：大分県' . "\n";
    } elseif ($clean['pref'] === "45") {
      $auto_reply_text .= '都道府県：宮崎県' . "\n";
    } elseif ($clean['pref'] === "46") {
      $auto_reply_text .= '都道府県：鹿児島県' . "\n";
    } elseif ($clean['pref'] === "47") {
      $auto_reply_text .= '都道府県：沖縄県' . "\n";
    }
    $auto_reply_text .= "市区町村：" . $clean['addr1'] . "\n";
    $auto_reply_text .= "町名：" . $clean['addr2'] . "\n";
    $auto_reply_text .= "丁目・番地・号：" . $clean['addr3'] . "\n";
    $auto_reply_text .= "建物名・部屋番号など：" . $clean['addr4'] . "\n\n";
    $auto_reply_text .= "メールアドレス：" . $clean['email'] . "\n\n";
    $auto_reply_text .= "電話番号：" . $clean['phone'] . "\n";
    if ($clean['contact_category'] === "about") {
      $auto_reply_text .= 'お問い合わせ区分：当店に関して' . "\n";
    } elseif ($clean['contact_category'] === "order") {
      $auto_reply_text .= 'お問い合わせ区分：ご注文に関して' . "\n";
    } elseif ($clean['contact_category'] === "payment") {
      $auto_reply_text .= 'お問い合わせ区分：お支払い方法に関して' . "\n";
    } elseif ($clean['contact_category'] === "delivery") {
      $auto_reply_text .= 'お問い合わせ区分：配達に関して' . "\n";
    } elseif ($clean['contact_category'] === "change") {
      $auto_reply_text .= 'お問い合わせ区分：ご注文の変更に関して' . "\n";
    } elseif ($clean['contact_category'] === "cancel") {
      $auto_reply_text .= 'お問い合わせ区分：キャンセルに関して' . "\n";
    } elseif ($clean['contact_category'] === "others") {
      $auto_reply_text .= 'お問い合わせ区分：その他に関して' . "\n";
    }
    $auto_reply_text .= "お問合せ内容：" . nl2br($clean['contact_content']) . "\n\n";
    $auto_reply_text .= "Kamakura no Florist.";
    //メール送信
    mb_send_mail($clean['email'], $auto_reply_subject, $auto_reply_text, $header);

    //運営側へ送るメールの件名
    $admin_reply_subject = "お問い合わせを受け付けました。";
    //本文を設定
    $admin_reply_text = "下記の内容でお問い合わせがありました。\n\n";
    $admin_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
    $admin_reply_text .= "お名前：" . $clean['onamae'] . "\n";
    $admin_reply_text .= "郵便番号：" . $clean['zip'] . "\n";
    if ($clean['pref'] === "1") {
      $admin_reply_text .= '都道府県：北海道' . "\n";
    } elseif ($clean['pref'] === "2") {
      $admin_reply_text .= '都道府県：青森県' . "\n";
    } elseif ($clean['pref'] === "3") {
      $admin_reply_text .= '都道府県：岩手県' . "\n";
    } elseif ($clean['pref'] === "4") {
      $admin_reply_text .= '都道府県：宮城県' . "\n";
    } elseif ($clean['pref'] === "5") {
      $admin_reply_text .= '都道府県：秋田県' . "\n";
    } elseif ($clean['pref'] === "6") {
      $admin_reply_text .= '都道府県：山形県' . "\n";
    } elseif ($clean['pref'] === "7") {
      $admin_reply_text .= '都道府県：福島県' . "\n";
    } elseif ($clean['pref'] === "8") {
      $admin_reply_text .= '都道府県：茨城県' . "\n";
    } elseif ($clean['pref'] === "9") {
      $admin_reply_text .= '都道府県：栃木県' . "\n";
    } elseif ($clean['pref'] === "10") {
      $admin_reply_text .= '都道府県：群馬県' . "\n";
    } elseif ($clean['pref'] === "11") {
      $admin_reply_text .= '都道府県：埼玉県' . "\n";
    } elseif ($clean['pref'] === "12") {
      $admin_reply_text .= '都道府県：千葉県' . "\n";
    } elseif ($clean['pref'] === "13") {
      $admin_reply_text .= '都道府県：東京都' . "\n";
    } elseif ($clean['pref'] === "14") {
      $admin_reply_text .= '都道府県：神奈川県' . "\n";
    } elseif ($clean['pref'] === "15") {
      $admin_reply_text .= '都道府県：新潟県' . "\n";
    } elseif ($clean['pref'] === "16") {
      $admin_reply_text .= '都道府県：富山県' . "\n";
    } elseif ($clean['pref'] === "17") {
      $admin_reply_text .= '都道府県：石川県' . "\n";
    } elseif ($clean['pref'] === "18") {
      $admin_reply_text .= '都道府県：福井県' . "\n";
    } elseif ($clean['pref'] === "19") {
      $admin_reply_text .= '都道府県：山梨県' . "\n";
    } elseif ($clean['pref'] === "20") {
      $admin_reply_text .= '都道府県：長野県' . "\n";
    } elseif ($clean['pref'] === "21") {
      $admin_reply_text .= '都道府県：岐阜県' . "\n";
    } elseif ($clean['pref'] === "22") {
      $admin_reply_text .= '都道府県：静岡県' . "\n";
    } elseif ($clean['pref'] === "23") {
      $admin_reply_text .= '都道府県：愛知県' . "\n";
    } elseif ($clean['pref'] === "24") {
      $admin_reply_text .= '都道府県：三重県' . "\n";
    } elseif ($clean['pref'] === "25") {
      $admin_reply_text .= '都道府県：滋賀県' . "\n";
    } elseif ($clean['pref'] === "26") {
      $admin_reply_text .= '都道府県：京都府' . "\n";
    } elseif ($clean['pref'] === "27") {
      $admin_reply_text .= '都道府県：大阪府' . "\n";
    } elseif ($clean['pref'] === "28") {
      $admin_reply_text .= '都道府県：兵庫県' . "\n";
    } elseif ($clean['pref'] === "29") {
      $admin_reply_text .= '都道府県：奈良県' . "\n";
    } elseif ($clean['pref'] === "30") {
      $admin_reply_text .= '都道府県：和歌山県' . "\n";
    } elseif ($clean['pref'] === "31") {
      $admin_reply_text .= '都道府県：鳥取県' . "\n";
    } elseif ($clean['pref'] === "32") {
      $admin_reply_text .= '都道府県：島根県' . "\n";
    } elseif ($clean['pref'] === "33") {
      $admin_reply_text .= '都道府県：岡山県' . "\n";
    } elseif ($clean['pref'] === "34") {
      $admin_reply_text .= '都道府県：広島県' . "\n";
    } elseif ($clean['pref'] === "35") {
      $admin_reply_text .= '都道府県：山口県' . "\n";
    } elseif ($clean['pref'] === "36") {
      $admin_reply_text .= '都道府県：徳島県' . "\n";
    } elseif ($clean['pref'] === "37") {
      $admin_reply_text .= '都道府県：香川県' . "\n";
    } elseif ($clean['pref'] === "38") {
      $admin_reply_text .= '都道府県：愛媛県' . "\n";
    } elseif ($clean['pref'] === "39") {
      $admin_reply_text .= '都道府県：高知県' . "\n";
    } elseif ($clean['pref'] === "40") {
      $admin_reply_text .= '都道府県：福岡県' . "\n";
    } elseif ($clean['pref'] === "41") {
      $admin_reply_text .= '都道府県：佐賀県' . "\n";
    } elseif ($clean['pref'] === "42") {
      $admin_reply_text .= '都道府県：長崎県' . "\n";
    } elseif ($clean['pref'] === "43") {
      $admin_reply_text .= '都道府県：熊本県' . "\n";
    } elseif ($clean['pref'] === "44") {
      $admin_reply_text .= '都道府県：大分県' . "\n";
    } elseif ($clean['pref'] === "45") {
      $admin_reply_text .= '都道府県：宮崎県' . "\n";
    } elseif ($clean['pref'] === "46") {
      $admin_reply_text .= '都道府県：鹿児島県' . "\n";
    } elseif ($clean['pref'] === "47") {
      $admin_reply_text .= '都道府県：沖縄県' . "\n";
    }
    $admin_reply_text .= "市区町村：" . $clean['addr1'] . "\n";
    $admin_reply_text .= "町名：" . $clean['addr2'] . "\n";
    $admin_reply_text .= "丁目・番地・号：" . $clean['addr3'] . "\n";
    $admin_reply_text .= "建物名・部屋番号など：" . $clean['addr4'] . "\n\n";
    $admin_reply_text .= "メールアドレス：" . $clean['email'] . "\n\n";
    $admin_reply_text .= "電話番号：" . $clean['phone'] . "\n";
    if ($clean['contact_category'] === "about") {
      $admin_reply_text .= 'お問い合わせ区分：当店に関して' . "\n";
    } elseif ($clean['contact_category'] === "order") {
      $admin_reply_text .= 'お問い合わせ区分：ご注文に関して' . "\n";
    } elseif ($clean['contact_category'] === "payment") {
      $admin_reply_text .= 'お問い合わせ区分：お支払い方法に関して' . "\n";
    } elseif ($clean['contact_category'] === "delivery") {
      $admin_reply_text .= 'お問い合わせ区分：配達に関して' . "\n";
    } elseif ($clean['contact_category'] === "change") {
      $admin_reply_text .= 'お問い合わせ区分：ご注文の変更に関して' . "\n";
    } elseif ($clean['contact_category'] === "cancel") {
      $admin_reply_text .= 'お問い合わせ区分：キャンセルに関して' . "\n";
    } elseif ($clean['contact_category'] === "others") {
      $admin_reply_text .= 'お問い合わせ区分：その他に関して' . "\n";
    }
    $admin_reply_text .= "お問い合わせ内容：" . nl2br($clean['contact_content']) . "\n\n";
    //運営側へメール送信
    mb_send_mail('ofuna123@kamakura-no-florist.com', $admin_reply_subject, $admin_reply_text, $header);
  } else {
    $page_flag = 0;
  }
}

//バリデーションメッセージ
function validation($data)
{ //$POST連想配列
  $errors = array();

  //お名前のバリデーション
  if (empty($data['onamae'])) {
    $errors[] = "「お名前」をご入力してください";
  }

  //郵便番号のバリデーション
  $data['zip'] = "1234567";
  if (empty($data['zip'])) {
    $errors[] = "「郵便番号」を半角数字でご入力してください";
  } elseif (!preg_match('/^[0-9]{7}+$/', $data['zip'])) {
    $errors[] = "郵便番号の書式(1234567)でご入力ください";
  }

  //都道府県のバリデーション
  if (empty($data['pref'])) {
    $errors[] = "「都道府県」を選択してください";
  } elseif ((int)$data['pref'] < 1 || 47 < (int)$data['pref']) {
    $errors[] = "「都道府県」を選択してください";
  }

  //市区町村のバリデーション
  if (empty($data['addr1'])) {
    $errors[] = "「市区町村」をご入力してください";
  }

  //町名のバリデーション
  if (empty($data['addr2'])) {
    $errors[] = "「町名」をご入力してください";
  }

  //丁目・番地・号のバリデーション
  if (empty($data['addr3'])) {
    $errors[] = "「丁目・番地・号」をご入力してください";
  }

  //メールアドレスのバリデーション
  if (empty($data['email'])) {
    $errors[] = "「メールアドレス」をご入力してください";
  } elseif (!preg_match('/\A([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}\z/uiD', $data['email'])) {
    $errors[] = "「メールアドレス」は正しい形式でご入力してください";
  }

  //電話番号のバリデーション
  if (empty($data['phone'])) {
    $errors[] = "「電話番号」をご入力してください";
  } elseif (!preg_match('/^0[0-9]{9,10}\z/', $data['phone'])) {
    $errors[] = "「電話番号」の書式(0312345678)でご入力ください";
  }

  //お問い合わせ区分のバリデーション
  if (empty($data['contact_category'])) {
    $errors[] = "「お問い合わせ区分」を選択してください";
  } elseif ($data['contact_category'] !== 'about' && $data['contact_category'] !== 'order' && $data['contact_category'] !== 'payment' && $data['contact_category'] !== 'delivery' && $data['contact_category'] !== 'change' && $data['contact_category'] !== 'cancel' && $data['contact_category'] !== 'others') {
    $errors = "「お問い合わせ区分」を選択してください";
  }

  //お問い合わせ内容のバリデーション
  if (empty($data['contact_content'])) {
    $errors[] = "「お問い合わせ内容」をご入力してください";
  } elseif (mb_strlen($data['contact_content']) > 300) {
    $errors[] = "「お問い合わせ内容」を300文字以内でご入力してください";
  }

  //プライバシーポリシー同意のバリデーション
  if (empty($data['agree'])) {
    $errors[] = "「プライバシーポリシー」を選択してください";
  }

  return $errors;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="鎌倉市内にあるお花屋さんです。自分のお部屋に飾るといった普段の日に。お誕生日や記念日といった特別な日に。ちょっとした「ありがとう」を伝えたい時に。あなたの日々の生活に癒しや彩りを添えるお手伝いをいたします。">
  <meta name="keywords" content="鎌倉市内にあるお花屋さん,花束,アレンジメント,ボックスフラワー,ドライフラワー">
  <title>お問い合わせフォーム | Kamakura no Florist.</title>
  <link rel="stylesheet" href="../common/css/normalize.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="../common/css/style.css">
  <link rel="stylesheet" href="../common/css/g-nav.css">
  <link rel="stylesheet" href="../common/css/page.css">
  <link rel="stylesheet" href="../common/css/contactform.css">
</head>

<body>
  <!-- headerここから -->
  <header>
    <div class="header-box container">
      <!-- logoここから -->
      <div class="logo-box">
        <h1>
          <a href="../index.html">
            <img src="../common/images/logo-brown.png" alt="Kamakura no Florist.">
          </a>
        </h1>
      </div>
      <!-- logoここまで -->

      <!-- navigationここから -->
      <nav class="navigation">
        <ul class="navigation-list">
          <li><a href="../index.html">HOME</a></li>
          <li><a href="../about/about.html">当店について</a></li>
          <li class="menu-item-has-children">
            <a href="#">商品紹介
              <span class="material-symbols-outlined">expand_more</span>
            </a>
            <ul class="sub-menu">
              <li><a href="../product/hanataba.html">花束</a></li>
              <li><a href="../product/arrangement.html">アレンジメント</a></li>
              <li><a href="../product/boxflower.html">ボックスフラワー</a></li>
              <li><a href="../product/driedflower.html">ドライフラワー</a></li>
            </ul>
          </li>
          <li><a href="../faq/faq.html">よくある質問</a></li>
          <li><a href="contact.html">お問い合わせ</a></li>
        </ul>
      </nav>
      <!-- navigationここまで -->

      <!-- hamburger menuここから -->
      <button type="button" class="openbtn">
        <span></span><span></span><span></span>
      </button>
      <!-- ここにアコーディオン付きナビゲーションを作る -->
      <nav id="g-nav">
        <div id="g-nav-list">
          <div id="g-nav-list__item" class="nav-kasen home-kasen">
            <a href="../index.html">
              HOME
              <span class="material-symbols-outlined">chevron_right</span>
            </a>
          </div><!-- /.g-nav-list__item -->

          <div id="g-nav-list__item" class="nav-kasen">
            <a href="../about/about.html">
              当店について
              <span class="material-symbols-outlined">chevron_right</span>
            </a>
          </div><!-- /.g-nav-list__item -->

          <div id="product-title" class="nav-kasen">
            <a href="#">商品紹介</a>
          </div><!-- /#product-title-->

          <div class="product-list nav-kasen">
            <ul>
              <li>
                <a href="../product/hanataba.html">
                  花束
                  <span class="material-symbols-outlined">chevron_right</span>
                </a>
              </li>
              <li>
                <a href="../product/arrangement.html">
                  アレンジメント
                  <span class="material-symbols-outlined">chevron_right</span>
                </a>
              </li>
              <li>
                <a href="../product/boxflower.html">
                  ボックスフラワー
                  <span class="material-symbols-outlined">chevron_right</span>
                </a>
              </li>
              <li>
                <a href="../product/driedflower.html">
                  ドライフラワー
                  <span class="material-symbols-outlined">chevron_right</span>
                </a>
              </li>
            </ul>
          </div><!-- /.sub-menu -->

          <div id="g-nav-list__item" class="nav-kasen">
            <a href="../faq/faq.html">
              よくある質問
              <span class="material-symbols-outlined">chevron_right</span>
            </a>
          </div><!-- /.g-nav-list__item -->

          <div id="g-nav-list__item" class="nav-kasen">
            <a href="contact.html">
              お問い合わせ
              <span class="material-symbols-outlined">chevron_right</span>
            </a>
          </div><!-- /.g-nav-list__item -->

          <button type="button" id="g-nav-btn">
            CLOSE
            <span class="material-symbols-outlined">close</span>
          </button><!-- /#g-nav-btn -->
        </div><!-- /#g-nav-list -->
      </nav><!-- /#g-nav -->
      <!-- hamburger menuここから -->
    </div><!-- /.container -->
  </header>
  <!-- headerここまで -->

  <!-- パンくずリストここから -->
  <div class="container breadcrumbs">
    <ul>
      <li>
        <a href="../../index.html">HOME</a>
        <span class="material-symbols-outlined">chevron_left</span>
      </li>
      <li>
        <a href="contact.html">お問い合わせ</a>
        <span class="material-symbols-outlined">chevron_left</span>
      </li>
      <li>お問い合わせフォーム</li>
    </ul>
  </div>
  <!-- パンくずリストここまで -->

  <!-- コンテンツここから -->
  <main>
    <!-- 確認ページここから -->
    <?php if ($page_flag === 1) : ?>
      <section class="container space">
        <h2 class="headline">お問い合わせ内容確認</h2>
        <p class="guidance">
          以下の内容でメッセージを送信します。よろしければ「送信する」ボタンを押してください。
        </p>

        <form action="" method="post">
          <!-- お客様の情報ここから -->
          <h3 class="brown-heading">お客様の情報</h3>
          <table class="customer-table table-space">
            <tr>
              <th>
                <label for="onamae">お名前</label>
              </th>
              <td>
                <input type="hidden" id="onamae" name="onamae" value="<?php echo $clean['onamae']; ?>">
                <p><?php echo $clean['onamae']; ?></p>
              </td>
            </tr>
            <tr class="address">
              <th>
                住所
              </th>
              <td>
                <div class="post-code">
                  <label for="zip" class="address-list">郵便番号</label>
                  <input type="hidden" id="zip" name="zip" value="<?php echo $clean['zip']; ?>">
                  <p><?php echo $clean['zip']; ?></p>
                </div>

                <div class="todofuken address-space">
                  <label for="pref" class="address-list">都道府県</label>
                  <p>
                    <?php if ($clean['pref'] === "1") {
                      echo '北海道';
                    } elseif ($clean['pref'] === "2") {
                      echo '青森';
                    } elseif ($clean['pref'] === "3") {
                      echo '岩手';
                    } elseif ($clean['pref'] === "4") {
                      echo '宮城県';
                    } elseif ($clean['pref'] === "5") {
                      echo '秋田県';
                    } elseif ($clean['pref'] === "6") {
                      echo '山形県';
                    } elseif ($clean['pref'] === "7") {
                      echo '福島県';
                    } elseif ($clean['pref'] === "8") {
                      echo '茨城県';
                    } elseif ($clean['pref'] === "9") {
                      echo '栃木県';
                    } elseif ($clean['pref'] === "10") {
                      echo '群馬県';
                    } elseif ($clean['pref'] === "11") {
                      echo '埼玉県';
                    } elseif ($clean['pref'] === "12") {
                      echo '千葉県';
                    } elseif ($clean['pref'] === "13") {
                      echo '東京都';
                    } elseif ($clean['pref'] === "14") {
                      echo '神奈川県';
                    } elseif ($clean['pref'] === "15") {
                      echo '新潟県';
                    } elseif ($clean['pref'] === "16") {
                      echo '富山県';
                    } elseif ($clean['pref'] === "17") {
                      echo '石川県';
                    } elseif ($clean['pref'] === "18") {
                      echo '福井県';
                    } elseif ($clean['pref'] === "19") {
                      echo '山梨県';
                    } elseif ($clean['pref'] === "20") {
                      echo '長野県';
                    } elseif ($clean['pref'] === "21") {
                      echo '岐阜県';
                    } elseif ($clean['pref'] === "22") {
                      echo '静岡県';
                    } elseif ($clean['pref'] === "23") {
                      echo '愛知県';
                    } elseif ($clean['pref'] === "24") {
                      echo '三重県';
                    } elseif ($clean['pref'] === "25") {
                      echo '滋賀県';
                    } elseif ($clean['pref'] === "26") {
                      echo '京都府';
                    } elseif ($clean['pref'] === "27") {
                      echo '大阪府';
                    } elseif ($clean['pref'] === "28") {
                      echo '兵庫県';
                    } elseif ($clean['pref'] === "29") {
                      echo '奈良県';
                    } elseif ($clean['pref'] === "30") {
                      echo '和歌山県';
                    } elseif ($clean['pref'] === "31") {
                      echo '鳥取県';
                    } elseif ($clean['pref'] === "32") {
                      echo '島根県';
                    } elseif ($clean['pref'] === "33") {
                      echo '岡山県';
                    } elseif ($clean['pref'] === "34") {
                      echo '広島県';
                    } elseif ($clean['pref'] === "35") {
                      echo '山口県';
                    } elseif ($clean['pref'] === "36") {
                      echo '徳島県';
                    } elseif ($clean['pref'] === "37") {
                      echo '香川県';
                    } elseif ($clean['pref'] === "38") {
                      echo '愛媛県';
                    } elseif ($clean['pref'] === "39") {
                      echo '高知県';
                    } elseif ($clean['pref'] === "40") {
                      echo '福岡県';
                    } elseif ($clean['pref'] === "41") {
                      echo '佐賀県';
                    } elseif ($clean['pref'] === "42") {
                      echo '長崎県';
                    } elseif ($clean['pref'] === "43") {
                      echo '熊本県';
                    } elseif ($clean['pref'] === "44") {
                      echo '大分県';
                    } elseif ($clean['pref'] === "45") {
                      echo '宮崎県';
                    } elseif ($clean['pref'] === "46") {
                      echo '鹿児島県';
                    } elseif ($clean['pref'] === "47") {
                      echo '沖縄県';
                    }
                    ?>
                  </p>
                  <input type="hidden" id="pref" name="pref" value="<?php echo $clean['pref']; ?>">
                </div>

                <div class="municipalities address-space">
                  <label for="addr1" class="address-list">市区町村</label>
                  <input type="hidden" id="addr1" name="addr1" value="<?php echo $clean['addr1']; ?>">
                  <p><?php echo $clean['addr1']; ?></p>
                </div>

                <div class="town-name address-space">
                  <label for="addr2" class="address-list">町名</label>
                  <input type="hidden" id="addr2" name="addr2" value="<?php echo $clean['addr2']; ?>">
                  <p><?php echo $clean['addr2']; ?></p>
                </div>

                <div class="address-number address-space">
                  <label for="addr3" class="address-list">丁目・番地・号</label>
                  <input type="hidden" id="addr3" name="addr3" value="<?php echo $clean['addr3']; ?>">
                  <p><?php echo $clean['addr3']; ?></p>
                </div>

                <div class="BnameRoom-NumberNnumber address-space">
                  <label for="addr4" class="address-list">建物名・部屋番号など</label>
                  <input type="hidden" id="addr4" name="addr4" value="<?php echo $clean['addr4']; ?>">
                  <p><?php echo $clean['addr4']; ?></p>
                </div>
              </td>
            </tr>

            <tr>
              <th>
                <label for="email">メールアドレス</label>
              </th>
              <td class="email-address">
                <input type="hidden" id="email" name="email" value="<?php echo $clean['email']; ?>">
                <p><?php echo $clean['email']; ?></p>
              </td>
            </tr>

            <tr>
              <th>
                <label for="phone">電話番号</label>
              </th>
              <td class="telephone-number">
                <input type="hidden" id="phone" name="phone" value="<?php echo $clean['phone']; ?>">
                <p><?php echo $clean['phone']; ?></p>
              </td>
            </tr>
          </table>
          <!-- お客様の情報ここまで -->

          <!-- お問い合わせについてここから -->
          <h3 class="brown-heading">お問い合わせについて</h3>
          <table class="contact-table table-space">
            <tr>
              <th>
                <label for="contact_category">お問い合わせ区分</label>
              </th>
              <td>
                <p>
                  <?php
                  if ($clean['contact_category'] === "about") {
                    echo '当店に関して';
                  } elseif ($clean['contact_category'] === "order") {
                    echo 'ご注文に関して';
                  } elseif ($clean['contact_category'] === "payment") {
                    echo 'お支払い方法に関して';
                  } elseif ($clean['contact_category'] === "delivery") {
                    echo '配達について';
                  } elseif ($clean['contact_category'] === "change") {
                    echo 'ご注文の変更に関して';
                  } elseif ($clean['contact_category'] === "cancel") {
                    echo 'キャンセルに関して';
                  } elseif ($clean['contact_category'] === "others") {
                    echo 'その他に関して';
                  }
                  ?>
                </p>
                <input type="hidden" id="contact_category" name="contact_category" value="<?php echo $clean['contact_category']; ?>">
              </td>
            </tr>
            <tr>
              <th>
                <label for="contact_content">お問い合わせ内容</label>
              </th>
              <td class="cnt-area">
                <input type="hidden" id="contact_content" name="contact_content" value="<?php echo $clean['contact_content']; ?>">
                <p><?php echo nl2br($clean['contact_content']); ?></p>
              </td>
            </tr>
          </table>
          <!-- お問い合わせについてここまで -->

          <!-- ボタンここから -->
          <div class="btn-area">
            <input type="submit" class="submit-btn" name="btn_back" value="入力画面に戻る">
            <input type="submit" class="send-btn" name="btn_submit" value="送信する">
          </div>
          <!-- ボタンここまで -->
        </form>
      </section>
      <!-- 確認ページここまで -->

      <!-- 送信完了ページここから -->
    <?php elseif ($page_flag === 2) : ?>
      <section class="container sendmail space">
        <h2 class="headline">お問い合わせ送信完了</h2>
        <p>
          ご入力していただきました内容の送信が完了しました。この度は、お問い合わせありがとうございました。<br>
          ご入力していただいた内容の確認メールを、お客様のメールアドレスに送らせていただきましたので、ご確認お願いいたします。
        </p>
        <p>
          後日、担当の者が2～3営業日以内にご連絡させていただきます。<br>
          よろしくお願いいたします。
        </p>

        <a href="../index.html" class="purple-btn">トップページに戻る</a>
      </section>
      <!-- 送信完了ページここまで -->
    <?php else : ?>

      <!-- お問い合わせフォームここから -->
      <section class="container space">
        <h2 class="headline">お問い合わせフォーム</h2>
        <p class="guidance">
          お花のご注文や当店などに関するお問い合わせを、お問い合わせフォームから承ります。<br>
          お問い合わせ内容を確認いたしまして、担当者よりご連絡いたします。
        </p>

        <!-- エラーメッセージここから -->
        <?php if (!empty($errors)) : ?>
          <ul class="error_list container">
            <?php foreach ($errors as $value) : ?>
              <li><?php echo $value; ?></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
        <!-- エラーメッセージここまで -->

        <!-- 入力ページここから -->
        <form action="" method="post">
          <!-- お客様の情報ここから -->
          <h3 class="brown-heading">お客様の情報</h3>
          <table class="customer-table table-space">
            <tr>
              <th>
                <label for="onamae">お名前</label>
                <span class="required">必須</span>
              </th>
              <td>
                <input type="text" id="onamae" name="onamae" placeholder="例）花田蘭子" value="<?php if (!empty($clean['onamae'])) {
                                                                                echo $clean['onamae'];
                                                                              } ?>">
              </td>
            </tr>
            <tr class="address">
              <th>
                住所
                <span class="required">必須</span>
              </th>
              <td>
                <div class="post-code">
                  <label for="zip" class="address-list">郵便番号</label>
                  <input type="number" id="zip" name="zip" placeholder="例）1234567" onkeypress="AjaxZip3.zip2addr(this, '', 'pref', 'addr1', 'addr2', 'addr3')" value="<?php if (!empty($clean['zip'])) {
                                                                                                                                                                echo $clean['zip'];
                                                                                                                                                              } ?>">
                  <div class="notes">※半角数字</div>
                </div>

                <button type="button" class="autofill-address address-space">
                  住所の自動入力
                  <span class="material-symbols-outlined">chevron_right</span>
                </button>

                <div class="address-btn address-space">
                  <a href="https://www.post.japanpost.jp/zipcode/" target=”_blank” rel=”noopener”>郵便番号をお忘れの方（郵便番号検索）</a>
                </div>

                <div class="todofuken address-space">
                  <label for="pref" class="address-list">都道府県</label>
                  <select id="pref" name="pref" class="pref">
                    <option value="">---</option>
                    <option value="1" <?php if (!empty($clean['pref']) && $clean['pref'] === "1") {
                                        echo 'selected';
                                      } ?>>北海道</option>
                    <option value="2" <?php if (!empty($clean['pref']) && $clean['pref'] === "2") {
                                        echo 'selected';
                                      } ?>>青森県</option>
                    <option value="3" <?php if (!empty($clean['pref']) && $clean['pref'] === "3") {
                                        echo 'selected';
                                      } ?>>岩手県</option>
                    <option value="4" <?php if (!empty($clean['pref']) && $clean['pref'] === "4") {
                                        echo 'selected';
                                      } ?>>宮城県</option>
                    <option value="5" <?php if (!empty($clean['pref']) && $clean['pref'] === "5") {
                                        echo 'selected';
                                      } ?>>秋田県</option>
                    <option value="6" <?php if (!empty($clean['pref']) && $clean['pref'] === "6") {
                                        echo 'selected';
                                      } ?>>山形県</option>
                    <option value="7" <?php if (!empty($clean['pref']) && $clean['pref'] === "7") {
                                        echo 'selected';
                                      } ?>>福島県</option>
                    <option value="8" <?php if (!empty($clean['pref']) && $clean['pref'] === "8") {
                                        echo 'selected';
                                      } ?>>茨城県</option>
                    <option value="9" <?php if (!empty($clean['pref']) && $clean['pref'] === "9") {
                                        echo 'selected';
                                      } ?>>栃木県</option>
                    <option value="10" <?php if (!empty($clean['pref']) && $clean['pref'] === "10") {
                                          echo 'selected';
                                        } ?>>群馬県</option>
                    <option value="11" <?php if (!empty($clean['pref']) && $clean['pref'] === "11") {
                                          echo 'selected';
                                        } ?>>埼玉県</option>
                    <option value="12" <?php if (!empty($clean['pref']) && $clean['pref'] === "12") {
                                          echo 'selected';
                                        } ?>>千葉県</option>
                    <option value="13" <?php if (!empty($clean['pref']) && $clean['pref'] === "13") {
                                          echo 'selected';
                                        } ?>>東京都</option>
                    <option value="14" <?php if (!empty($clean['pref']) && $clean['pref'] === "14") {
                                          echo 'selected';
                                        } ?>>神奈川県</option>
                    <option value="15" <?php if (!empty($clean['pref']) && $clean['pref'] === "15") {
                                          echo 'selected';
                                        } ?>>新潟県</option>
                    <option value="16" <?php if (!empty($clean['pref']) && $clean['pref'] === "16") {
                                          echo 'selected';
                                        } ?>>富山県</option>
                    <option value="17" <?php if (!empty($clean['pref']) && $clean['pref'] === "17") {
                                          echo 'selected';
                                        } ?>>石川県</option>
                    <option value="18" <?php if (!empty($clean['pref']) && $clean['pref'] === "18") {
                                          echo 'selected';
                                        } ?>>福井県</option>
                    <option value="19" <?php if (!empty($clean['pref']) && $clean['pref'] === "19") {
                                          echo 'selected';
                                        } ?>>山梨県</option>
                    <option value="20" <?php if (!empty($clean['pref']) && $clean['pref'] === "20") {
                                          echo 'selected';
                                        } ?>>長野県</option>
                    <option value="21" <?php if (!empty($clean['pref']) && $clean['pref'] === "21") {
                                          echo 'selected';
                                        } ?>>岐阜県</option>
                    <option value="22" <?php if (!empty($clean['pref']) && $clean['pref'] === "22") {
                                          echo 'selected';
                                        } ?>>静岡県</option>
                    <option value="23" <?php if (!empty($clean['pref']) && $clean['pref'] === "23") {
                                          echo 'selected';
                                        } ?>>愛知県</option>
                    <option value="24" <?php if (!empty($clean['pref']) && $clean['pref'] === "24") {
                                          echo 'selected';
                                        } ?>>三重県</option>
                    <option value="25" <?php if (!empty($clean['pref']) && $clean['pref'] === "25") {
                                          echo 'selected';
                                        } ?>>滋賀県</option>
                    <option value="26" <?php if (!empty($clean['pref']) && $clean['pref'] === "26") {
                                          echo 'selected';
                                        } ?>>京都府</option>
                    <option value="27" <?php if (!empty($clean['pref']) && $clean['pref'] === "27") {
                                          echo 'selected';
                                        } ?>>大阪府</option>
                    <option value="28" <?php if (!empty($clean['pref']) && $clean['pref'] === "28") {
                                          echo 'selected';
                                        } ?>>兵庫県</option>
                    <option value="29" <?php if (!empty($clean['pref']) && $clean['pref'] === "29") {
                                          echo 'selected';
                                        } ?>>奈良県</option>
                    <option value="30" <?php if (!empty($clean['pref']) && $clean['pref'] === "30") {
                                          echo 'selected';
                                        } ?>>和歌山県</option>
                    <option value="31" <?php if (!empty($clean['pref']) && $clean['pref'] === "31") {
                                          echo 'selected';
                                        } ?>>鳥取県</option>
                    <option value="32" <?php if (!empty($clean['pref']) && $clean['pref'] === "32") {
                                          echo 'selected';
                                        } ?>>島根県</option>
                    <option value="33" <?php if (!empty($clean['pref']) && $clean['pref'] === "33") {
                                          echo 'selected';
                                        } ?>>岡山県</option>
                    <option value="34" <?php if (!empty($clean['pref']) && $clean['pref'] === "34") {
                                          echo 'selected';
                                        } ?>>広島県</option>
                    <option value="35" <?php if (!empty($clean['pref']) && $clean['pref'] === "35") {
                                          echo 'selected';
                                        } ?>>山口県</option>
                    <option value="36" <?php if (!empty($clean['pref']) && $clean['pref'] === "36") {
                                          echo 'selected';
                                        } ?>>徳島県</option>
                    <option value="37" <?php if (!empty($clean['pref']) && $clean['pref'] === "37") {
                                          echo 'selected';
                                        } ?>>香川県</option>
                    <option value="38" <?php if (!empty($clean['pref']) && $clean['pref'] === "38") {
                                          echo 'selected';
                                        } ?>>愛媛県</option>
                    <option value="39" <?php if (!empty($clean['pref']) && $clean['pref'] === "39") {
                                          echo 'selected';
                                        } ?>>高知県</option>
                    <option value="40" <?php if (!empty($clean['pref']) && $clean['pref'] === "40") {
                                          echo 'selected';
                                        } ?>>福岡県</option>
                    <option value="41" <?php if (!empty($clean['pref']) && $clean['pref'] === "41") {
                                          echo 'selected';
                                        } ?>>佐賀県</option>
                    <option value="42" <?php if (!empty($clean['pref']) && $clean['pref'] === "42") {
                                          echo 'selected';
                                        } ?>>長崎県</option>
                    <option value="43" <?php if (!empty($clean['pref']) && $clean['pref'] === "43") {
                                          echo 'selected';
                                        } ?>>熊本県</option>
                    <option value="44" <?php if (!empty($clean['pref']) && $clean['pref'] === "44") {
                                          echo 'selected';
                                        } ?>>大分県</option>
                    <option value="45" <?php if (!empty($clean['pref']) && $clean['pref'] === "45") {
                                          echo 'selected';
                                        } ?>>宮崎県</option>
                    <option value="46" <?php if (!empty($clean['pref']) && $clean['pref'] === "46") {
                                          echo 'selected';
                                        } ?>>鹿児島県</option>
                    <option value="47" <?php if (!empty($clean['pref']) && $clean['pref'] === "47") {
                                          echo 'selected';
                                        } ?>>沖縄県</option>
                  </select>
                </div>

                <div class="municipalities address-space">
                  <label for="addr1" class="address-list">市区町村</label>
                  <input type="text" id="addr1" name="addr1" class="addr1" placeholder="例）鎌倉市" value="<?php if (!empty($clean['addr1'])) {
                                                                                              echo $clean['addr1'];
                                                                                            } ?>">
                </div>

                <div class="town-name address-space">
                  <label for="addr2" class="address-list">町名</label>
                  <input type="text" id="addr2" name="addr2" class="addr2" placeholder="例）大船" value="<?php if (!empty($clean['addr2'])) {
                                                                                            echo $clean['addr2'];
                                                                                          } ?>">
                </div>

                <div class="address-number address-space">
                  <label for="addr3" class="address-list">丁目・番地・号</label>
                  <input type="text" id="addr3" name="addr3" class="addr3" placeholder="例）2-7-1" value="<?php if (!empty($clean['addr3'])) {
                                                                                                echo $clean['addr3'];
                                                                                              } ?>">
                </div>

                <div class="address-number address-space">
                  <label for="addr3" class="address-list">建物名・部屋番号など</label>
                  <input type="text" id="addr4" name="addr4" class="addr4" placeholder="例）大船マンション105号" value="<?php if (!empty($clean['addr4'])) {
                                                                                                      echo $clean['addr4'];
                                                                                                    } ?>">
                </div>
              </td>
            </tr>

            <tr>
              <th>
                <label for="email">メールアドレス</label>
                <span class="required">必須</span>
              </th>
              <td class="email-address">
                <input type="email" id="email" name="email" placeholder="例）sample@xxx.com" value="<?php if (!empty($clean['email'])) {
                                                                                          echo $clean['email'];
                                                                                        } ?>">
                <div class="notes">※半角英数字</div>
                <div class="notes">※送信内容の控えメールを自動送信いたします</div>
              </td>
            </tr>

            <tr>
              <th>
                <label for="phone">電話番号</label>
                <span class="required">必須</span>
              </th>
              <td class="telephone-number">
                <input type="tel" id="phone" name="phone" placeholder="例）0312345678" value="<?php if (!empty($clean['phone'])) {
                                                                                    echo $clean['phone'];
                                                                                  } ?>">
                <div class="notes">※半角数字</div>
              </td>
            </tr>
          </table>
          <!-- お客様の情報ここまで -->

          <!-- お問い合わせについてここから -->
          <h3 class="brown-heading">お問い合わせについて</h3>
          <table class="contact-table table-space">
            <tr>
              <th>
                <label for="contact_category">お問い合わせ区分</label>
                <span class="required">必須</span>
              </th>
              <td>
                <p>
                  <input type="radio" id="contact_category" name="contact_category" value="about" <?php if (!empty($clean['contact_category']) && $clean['contact_category'] === "about") {
                                                                              echo 'checked';
                                                                            } ?>>
                  <span class="contact-category__name">当店に関して</span>
                </p>
                <p>
                  <input type="radio" id="contact_category" name="contact_category" value="order" <?php if (!empty($clean['contact_category']) && $clean['contact_category'] === "order") {
                                                                              echo 'checked';
                                                                            } ?>>
                  <span class="contact-category__name">ご注文に関して</span>
                </p>
                <p>
                  <input type="radio" id="contact_category" name="contact_category" value="payment" <?php if (!empty($clean['contact_category']) && $clean['contact_category'] === "payment") {
                                                                                echo 'checked';
                                                                              } ?>>
                  <span class="contact-category__name">お支払い方法に関して</span>
                </p>
                <p>
                  <input type="radio" id="contact_category" name="contact_category" value="delivery" <?php if (!empty($clean['contact_category']) && $clean['contact_category'] === "delivery") {
                                                                                  echo 'checked';
                                                                                } ?>>
                  <span class="contact-category__name">配達について</span>
                </p>
                <p>
                  <input type="radio" id="contact_category" name="contact_category" value="change" <?php if (!empty($clean['contact_category']) && $clean['contact_category'] === "change") {
                                                                                echo 'checked';
                                                                              } ?>>
                  <span class="contact-category__name">ご注文の変更に関して</span>
                </p>
                <p>
                  <input type="radio" id="contact_category" name="contact_category" value="cancel" <?php if (!empty($clean['contact_category']) && $clean['contact_category'] === "cancel") {
                                                                                echo 'checked';
                                                                              } ?>>
                  <span class="contact-category__name">キャンセルに関して</span>
                </p>
                <p>
                  <input type="radio" id="contact_category" name="contact_category" value="others" <?php if (!empty($clean['contact_category']) && $clean['contact_category'] === "others") {
                                                                                echo 'checked';
                                                                              } ?>>
                  <span class="contact-category__name">その他に関して</span>
                </p>
              </td>
            </tr>
            <tr>
              <th>
                <label for="contact_content">お問い合わせ内容</label>
                <span class="required">必須</span>
              </th>
              <td class="cnt-area">
                <p>具体的な内容を300字以内にご入力ください。</p>
                <textarea id="count-down contact_content" name="contact_content" rows="10"><?php if (!empty($clean['contact_content'])) { echo $clean['contact_content'];} ?></textarea>
                あと<span id="textmax">300</span>字
              </td>
            </tr>
          </table>
          <!-- お問い合わせについてここまで -->

          <!-- 入力内容の確認へここから -->
          <div class="agree-area">
            <div class="agree-area__input">
              <label for="agree">
                <input type="checkbox" name="agree" name="agree" id="agree" <?php if (!empty($clean['agree'])) {
                                                                  echo $clean['agree'];
                                                                } ?>>
                <span class="agree__name"><a href="../privacy.html">プライバシーポリシー</a>に同意します。</span>
                <span class="required">必須</span>
              </label>
            </div>
            <input type="submit" class="submit-btn" name="btn_confirm" value="入力内容の確認する">
          </div>
          <!-- 入力内容の確認へここまで -->
        </form>
        <!-- 入力ページここまで -->
      </section>
      <!-- お問い合わせフォームここまで -->
    <?php endif; ?>
  </main>
  <!-- コンテンツここまで -->

  <!-- フッターここから -->
  <footer>
    <div class="footer-box container">
      <h2 class="footer-box__logo">
        <a href="../index.html">
          <img src="../common/images/logo-white.png" alt="Kamakura no Florist.">
        </a>
      </h2>

      <nav class="footer-box__nav">
        <ul>
          <li><a href="../privacy.html">プライバシーポリシー</a></li>
          <li><a href="../law.html">特定商取引法に基づく表記</a></li>
          <li><a href="../sitemap.html">サイトマップ</a></li>
        </ul>
      </nav>

      <p>&copy; 2023-<span class="copyright"></span> Kamakura no Frolist.</p>
    </div> <!-- /.footer-box  -->
  </footer>
  <!-- フッターここまで -->

  <!-- ページの先頭へ戻るボタンここから -->
  <button type="button" class="pagetop">
    <span class="material-symbols-outlined">arrow_back_ios_new</span>
  </button>
  <!-- ページの先頭へ戻るボタンここまで -->

  <!-- jQueryの読み込み -->
  <script src="../common/js/jquery-3.7.1.min.js"></script>
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
  <!-- 自作のjs -->
  <script src="../common/js/dropdown-menu.js"></script>
  <script src="../common/js/g-nav.js"></script>
  <script src="../common/js/focus.js"></script>
  <script src="../common/js/pagetop.js"></script>
  <script src="../common/js/character-countdown.js"></script>
  <script src="../common/js/address.js"></script>
  <script src="../common/js/copyright.js"></script>
</body>

</html>
