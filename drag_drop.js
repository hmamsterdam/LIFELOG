$(function () {


  $("td").on('dragover', function (e) {
    e.stopPropagation();
    e.preventDefault();
  });


  $("td").on('drop', function (e) {
    e.stopPropagation();
    e.preventDefault();

    var dayid = $(this).attr("id");
    var items  = e.originalEvent.dataTransfer.items;
    var file = items[0].getAsFile();
    var reader = new FileReader();

    reader.readAsDataURL(file);
    reader.onloadend = function() {
      Base64ToImage(reader.result, file.name, function(img) {
        // <img>要素にすることで幅・高さがわかります
        img.width = 130;
        // <img>要素としてDOMに追加
        document.getElementById(dayid).appendChild(img);
      });
    };
  });


});


//=====================================================
// Base64形式の文字列 → <img>要素に変換
//   base64img: Base64形式の文字列
//   callback : 変換後のコールバック。引数は<img>要素
//=====================================================
function Base64ToImage(base64img, filename, callback) {
    var img = new Image();
    img.onload = function() {
        callback(img);
    };
    img.src = base64img;
    img.id = filename;
}
