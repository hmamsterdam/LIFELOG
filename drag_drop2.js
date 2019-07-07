$(function () {

  $("td").on('dragover', function (e) {
    e.stopPropagation();
    e.preventDefault();
  });

  $("td").on('drop', function (e) {
    e.stopPropagation();
    e.preventDefault();

    var now = $("#now").text().slice(0,4);
    var dayid = $(this).attr("id");
    var items  = e.originalEvent.dataTransfer.items;
    var file = items[0].getAsFile();
    file.size = file.size / 10;
    console.log(file.size);

    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onloadend = function() {

        // Controllerに渡す情報の整理
        $("#download" + dayid).append("<input type=\"hidden\" name=\"download\" value=\"download\">");
        $("#download" + dayid).append("<input type=\"hidden\" name=\"filename\" value=\"" + file.name + "\">");
        $("#download" + dayid).append("<input type=\"hidden\" name=\"data\" value=\"" + reader.result + "\">");

        var form = $("#download" + dayid);
        form.submit();
    };
  });
});
