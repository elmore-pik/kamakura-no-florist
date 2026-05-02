// ボタンクリックで郵便番号から住所を取得する方法
// お客様の情報と異なる場合（お花のご注文フォーム）
$('#different-address').on('click', function() {
  AjaxZip3.zip2addr('zip_code','','prefectures','resi1','resi2','resi3');

  //成功時の実行する処理
  AjaxZip3.onSuccess = function() {
    $('.resi3').focus();
  };

  //失敗時に実行する処理
  AjaxZip3.onFailure = function() {
    alert('郵便番号に該当する住所が見つかりません');
  };

  return false;
});
