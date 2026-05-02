// ボタンクリックで郵便番号から住所を取得する方法
// お客様の情報
$('.autofill-address').on('click', function() {
    AjaxZip3.zip2addr('zip','','pref','addr1','addr2','addr3');

    //成功時の実行する処理
    AjaxZip3.onSuccess = function() {
      $('.addr3').focus();
    };

    //失敗時に実行する処理
    AjaxZip3.onFailure = function() {
      alert('郵便番号に該当する住所が見つかりません');
    };

    return false;
});
