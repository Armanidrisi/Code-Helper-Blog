$(document).ready(function () {
  //Function For Load Data Of Messages
  function loadmsg(page) {
    $.ajax({
      url: "ajax-loadmsg.php",
      type: "POST",
      data: {
        page_no: page,
      },
      success: function (data) {
        //alert(data)
        if (data) {
          $("#msgpagination").remove();
          $("#msg_table").append(data);
        } else {
          $("#msgbtn").html("No Data");
          $("#msgbtn").prop("disabled", true);
        }
      },
    });
  }

  //Function For Load Data Of Posts
  function loadposts(p) {
    $.ajax({
      url: "ajax-loadposts.php",
      type: "POST",
      data: {
        page_no: p,
      },
      success: function (data) {
        //   alert(data);
        if (data) {
          $("#postpagination").remove();
          $("#posts_table").append(data);
        } else {
          $("#postbtn").html("No Data");
          $("#postbtn").prop("disabled", true);
        }
      },
    });
  }

  // Call The Function When Page load
  loadmsg();
  loadposts();
  // Add Click Event on Button
  $(document).on("click", "#msgbtn", function () {
    $("#msgbtn").html("Loading...");
    const pid = $(this).data("id");
    loadmsg(pid);
  });
  $(document).on("click", "#postbtn", function () {
    $("#postbtn").html("Loading...");
    const pid = $(this).data("id");
    loadposts(pid);
  });
});
function deletepost(id) {
  if (confirm("Are You Really Want To Delete ..!")) {
    $.ajax({
      url: "delete-post.php?id=" + id,
      type: "DELETE",
      success: function (d) {
        window.location.reload();
      },
    });
  }
}
