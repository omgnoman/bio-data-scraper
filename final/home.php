
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from demos.bootdey.com/dayday/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Jul 2018 13:25:58 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.png">
    <title>Day-Day</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap.3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome.4.6.1/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/animate.min.css" rel="stylesheet">
    <link href="assets/css/timeline.css" rel="stylesheet">
    <link href="assets/css/cover.css" rel="stylesheet">
    <link href="assets/css/forms.css" rel="stylesheet">
    <link href="assets/css/buttons.css" rel="stylesheet">
    <script src="assets/js/jquery.1.11.1.min.js"></script>
    <script src="bootstrap.3.3.6/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
            /* Dropdown Button */
.dropbtn {
    background-color: white;
    color:#858585;
    padding: 26px;
    font-size: 13px;
    border: none;
    cursor: pointer;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
    background-color: #EEEEEE;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    right:0.5px;
    margin-top: 20px;
    background-color: white;
    min-width: 560px;

    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}     
    </style>
  </head>

  <body class="animated fadeIn">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-white navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index-2.html"><b>GO WORK</b></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="actives"><a href="peopledata.php">Home</a></li>
            <li><a href="peopledata.php">Notifications</a></li>
            <li><a href="user_profile.php">Profile</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Pages <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="sidebar_profile.html">Sidebar profile</a></li>
                <li><a href="user_detail.html">User detail</a></li>
                <li><a href="edite_profile.php">Edit profile</a></li>
                <li><a href="about.html">About</a></li>
              </ul>
            </li>
            <li><a href="controller/logout_controller.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="container page-content ">
      <div class="row">
        <!-- left links -->
        <!-- center posts -->
        <div class="col-md-12">
          <div class="row">
          
          </div>
        </div><!-- end  center posts -->
      </div>
    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted"> Copyright &copy; Company - All rights reserved </p>
      </div>
    </footer>
    <script src="assets/js/jquery.validate.min.js"></script>

  </body>

<!-- Mirrored from demos.bootdey.com/dayday/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Jul 2018 13:25:58 GMT -->
</html>
<script type="text/javascript">
       $(function(){
$("#upload_link").on('click', function(e){
    e.preventDefault();
    $("#upload:hidden").trigger('click');
});
}); 
       function myFunction(x) {
    x.classList.toggle("fa-thumbs-down");
}
</script>
<script type="text/javascript">

$(document).ready(function() {
      $(".target").keypress(function(e){
        if (e.which == 13) {
          //var text = $(e).text();
          if ($(this).val() == '') {
            return false;
          }

          $.ajax({
            type: "post",
            url: 'controller/comments_home_controller.php',
            data: {"text": $(this).val(), "post_id": $(this).data("post-id")},
            
            success: function (datas){
              var res = $.parseJSON(datas);
              if(res.succ == "true"){
                $('#comment-box-'+res.post_id).append('<div class="box-comment" id="response"><img class="img-circle img-sm" src="img/Friends/'+res.comments_image+'" alt="User Image"><div class="comment-text"><span class="username">'+res.comment_user+'<span class="text-muted pull-right">6:11 pm</span></span>'+res.comment+'</div></div>');
                $(".comment-input").val("");
                $("#count_comments_"+res.post_id).text("").text(res.count_comments);
                
              }

            }
            });
            return false;
          }
        });
      });

function add_like_to_db(id){
  $.ajax({
    type: "post",
    url: 'controller/likes_home_controller.php',
    data:{pid: id},
    success: function (data){
      var result = $.parseJSON(data);
      $("#likes_counter_"+result.post_id).text("").text(result.count_likes);
    }
  });
}
 function delete_comment(id){
  $.ajax({
    type: "post",
    url: 'controller/delete_comment_controller.php',
    data:{pid: id},
    success: function (data){
      var result = $.parseJSON(data);
      jQuery("#post_comment_"+result.comments_id).remove();
    }
  });
  
 }
 function hide_post(post_id,id){
    $.ajax({
    type: "post",
    url: 'controller/hide_post_controller.php',
    data:{pid: post_id,login: id},
    success: function (data){
      var result = $.parseJSON(data);
      jQuery("#post_container_"+result.post_id).remove();
    }
  });
 }
 function accept_request(id){
        $.ajax({
            type: "post",
            url: 'controller/accept_request_controller.php',
            data:{pid: id},
            success: function(data){
             var result=$.parseJSON(data);
             jQuery("#friend-request"+result.sender_id).remove();
            }
        });
 }
 function delete_request(id){
       $.ajax({
          type: "post",
          url: 'controller/delete_request_controller.php',
          data:{pid: id},
          success: function(data){
             var result=$.parseJSON(data);
             jQuery("#friend-request"+result.sender_id).remove();
            }
       });
 }
/*function delete_post(id){
  $.ajax({
    type: "post",
    url: 'controller/delete_post_controller.php',
    data:{pid: id},
    success: function (data){
      var result = $.parseJSON(data);
      jQuery("#post_container_"+result.post_id).remove();
    }
  });
}*/
</script>
<script type="text/javascript">
     function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>


