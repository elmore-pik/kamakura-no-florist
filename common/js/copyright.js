//コピーライトの年数表示を自動化する
var date = new Date();
$('.copyright').text(
  date.getFullYear());