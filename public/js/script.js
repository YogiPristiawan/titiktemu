let kartu = document.getElementsByClassName("kartu");
let content = document.getElementsByClassName("content");
let btn_rd = document.getElementsByClassName("readMore");
for (let i = 0; i < kartu.length; i++) {
  if (
    content[i].scrollHeight > kartu[i].clientHeight ||
    content[i].scrollWidth > kartu[i].clientWidth
  ) {
    btn_rd[i].style.display = "inline";
  }
  btn_rd[i].addEventListener("click", function () {
    kartu[i].style.height = "auto";
  });
}
// --------------------------------------------------------------

function ajaxShowComment(id) {
  $("#commentBox" + id).html("");
  $.ajax({
    url: "http://localhost:8080/komen/tampil",
    method: "GET",
    data: { id: id },
    dataType: "json",

    success: function (result) {
      $.each(result, function (index, obj) {
        $("#commentBox" + id).html(obj);
      });
    },
  });
}

function ajaxCountComment(id) {
  $.ajax({
    url: "http://localhost:8080/komen/count",
    method: "GET",
    data: { id: id },
    dataType: "json",

    success: function (result) {
      $("#comment" + id).html("Tampilkan " + result + " Komentar");
    },
  });
}

// tampil komen
$(".showComment").on("click", function () {
  const id = $(this).data("id");
  ajaxShowComment(id);
});

// create comment

$(".submit").on("click", function () {
  const id = $(this).data("id");
  const komen = $("#cmntform" + id).val();

  if (komen !== "") {
    $.ajax({
      url: "http://localhost:8080/komen/tambahkomentar",
      method: "POST",
      data: { idartikel: id, komen: komen },
      dataType: "json",

      success: function (idartikel) {
        ajaxCountComment(id);
        ajaxShowComment(idartikel);
      },
    });

    $("#cmntform" + id).val("");
  }
});
