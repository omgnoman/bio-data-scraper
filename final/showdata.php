<?php
  session_start();
  unset($_SESSION['session']);
?>
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
    <link rel="icon" href="favicon.png">
    <title>BIO NCBI Papers</title>
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
          <a class="navbar-brand" href="E:/xamp/htdocs/fyp/index.html"><b>Bio Data Scraper</b></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
        </div>
      </div>
    </nav>
    



    <!-- Begin page content -->
    <div class="container page-content ">
      <section class="search-sec">
    <div class="container">
            <div class="row">
                <div class="col-lg-12" style="margin-left:-45px;">
                    <div class="row0">
                         <div class="form-group col-lg-3 col-md-3 col-sm-12 p-0" style="padding-top:18px; padding-right:200px;">
                            <span class="input-icon inverted">
                               <input type="text" name="search_data" id="pub" class="form-control" Placeholder="Search By Pubmed ID" style="width:300px;">

                            <!--  <i class="glyphicon glyphicon-search bg-blue"></i> -->

                            </span>
                          </div>    
                    </div>
                </div>
                <br>
                <br>
                
                <div class="col-lg-12" style="margin-left:-65px;">
                      <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-12 p-0" style="padding-top:18px; padding-left:50px;">
                            <span>
                               <input type="text" name="title" id="title" class="form-control" Placeholder="Search By Title" style="width:300px;">
                            </span>
                          </div>
                          <div class="col-lg-3 col-md-3 col-sm-12 p-0" style="padding-top:18px; padding-left:50px;">
                            <span>
                               <input type="text" name="fore_name" id="fore_name" class="form-control" Placeholder="Search By author" style="width:200px;">
                            </span>
                          </div> 
                          <div class="col-lg-3 col-md-3 col-sm-12 p-0" style="padding-top:18px; padding-left:50px;">
                            <span>
                               <input type="text" name="country" id="country" class="form-control" Placeholder="Search By Country" style="width:200px;">
                            </span>
                          </div> 
                      </div>
                </div>
            </div>
    </div>
    <br>
</section>
      <div class="row">
        <!-- left links -->
        <!-- center posts -->
        <div class="col-md-12">
          <div class="row">
                <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col" style="font-size:18px;">Pubmed ID</th>
      <th scope="col" style="font-size:18px;">Title</th>
      <th scope="col" style="font-size:18px;">Author</th>
      <th scope="col" style="font-size:18px;">Journal</th>
      <th scope="col" style="font-size:18px;">Country</th>
      <th scope="col" style="font-size:18px;">Abstract</th>
      <th scope="col" style="font-size:18px;">Date</th>
    </tr>
  </thead>
  <tbody id="ss">
    <?php
      class MyDB extends SQLite3{
    function __construct(){
      $this->open('lung1.db');
    }
   }
   $db= new MyDB();
    if (!$db) {
      echo $db->lastErrorMsg();
    }
      $results = $db->query('SELECT *FROM main_table INNER JOIN authors_table ON main_table.pubmed_id=authors_table.pubmed_id');
      while ($row = $results->fetchArray()) {?>
    <tr>
      <th scope="row"><?php echo $row['pubmed_id']; ?></th>
      <td><?php echo $row['title'];?></td>
      <td><?php echo $row['fore_name']; echo " "; echo $row['last_name'];?></td>
      <td><?php echo $row['journal_title'];?></td>
      <td><?php echo $row['country_journal'];?></td>
      <td><a href="next_page.php?id=<?php echo $row['id'];?>"><?php $str=$row['abstract'];
            echo substr($str, 0,50);
      ?></a></td>
      <td><?php echo $row['pub_year'];?></td>
    </tr>
    <?php }?>
  </tbody>
  <tbody id="re"></tbody>
</table>
          </div>
        </div><!-- end  center posts -->
      </div>
    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted"> Copyright &copy; BIO Data Scraper - All rights reserved </p>
      </div>
    </footer>
    <script src="assets/js/jquery.validate.min.js"></script>

  </body>

<!-- Mirrored from demos.bootdey.com/dayday/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Jul 2018 13:25:58 GMT -->
</html>
<script>
  $(document).ready(function(){
            function search_data(query) {
            $.ajax({
                url:"search_paper.php",
                method:"POST",
                data:{query:query},
                success:function(data) 
                {
                  $("#title").val("");
                  $("#fore_name").val("");
                  $("#country").val("");
                  jQuery("#ss").remove();
                  $('#re').html(data);
                }
            });
       }
            $("#pub").keyup(function () {
                var search= $(this).val();
                if (search !='') {
                  search_data(search);
                }else{
                  search_data();
                }
            });
            function title(query) {
            $.ajax({
                url:"search_paper_title.php",
                method:"POST",
                data:{query:query},
                success:function(data) 
                {
                  $("#pub").val("");
                  $("#fore_name").val("");
                  $("#country").val("");
                  jQuery("#ss").remove();
                  $('#re').html(data);
                }
            });
       }
       $("#title").keyup(function () {
                var search= $(this).val();
                if (search !='') {
                  title(search);
                }else{
                  title();
                }
            });

       function fore_name(query) {
            $.ajax({
                url:"search_paper_name.php",
                method:"POST",
                data:{query:query},
                success:function(data) 
                {
                  $("#pub").val("");
                  $("#title").val("");
                  $("#country").val("");
                  jQuery("#ss").remove();
                  $('#re').html(data);
                }
            });
       }
       $("#fore_name").keyup(function () {
                var search= $(this).val();
                if (search !='') {
                  fore_name(search);
                }else{
                  fore_name();
                }
            });

            function country(query) {
            $.ajax({
                url:"search_paper_country.php",
                method:"POST",
                data:{query:query},
                success:function(data) 
                {
                  $("#pub").val("");
                  $("#fore_name").val("");
                  $("#title").val("");
                  jQuery("#ss").remove();
                  $('#re').html(data);
                }
            });
       }
       $("#country").keyup(function () {
                var search= $(this).val();
                if (search !='') {
                  country(search);
                }else{
                  country();
                }
            });
       });
</script>
