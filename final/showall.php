<?php
    session_start();
 
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
    <title>Paper Details</title>
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
a{
  target="_blank";
}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}     
    </style>
  </head>

  <body class="animated fadeIn">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-white navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          
          <a class="navbar-brand" href="E:/xamp/htdocs/fyp/index.html"><b>Bio Data Scraper</b></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
        </div>
      </div>
    </nav>
    



    <!-- Begin page content -->
    <div class="container page-content ">
      <section class="search-sec">
</section>
      <div class="row">
        <!-- left links -->
        <!-- center posts -->
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
      $result= $db->query("SELECT *FROM main_table INNER JOIN authors_table ON main_table.pubmed_id=authors_table.pubmed_id WHERE authors_table.id='".$_SESSION['session']."'");
      while ($row = $result->fetchArray()) {?>
        
<!--        <div class="col-md-12">
          <br>
          
            <span class="col-md-3"></span>
            <span class="col-md-3"></span>
            <span class="col-md-3"></span>
            <span class="col-md-3" style="">
            <h3 style="font-size:24px; text-decoration:underline; font-weight: bold;">Download</h3><br>
            <a href="#" style="display:inline-block; font-size: 28px;  border-radius:2em; box-sizing: border-box; text-decoration:none;font-family:'Roboto',sans-serif; font-weight:300; color:#FFFFFF; background-color:#4eb5f1;text-align:center; transition: all 0.2s; height:50px; width: 200px; ">Download</a>
            <br>
            </span>
          
            <br>
            <br>
        </div>    -->

          <div class="row" style="margin-top:30px">

             <div class="col-md-3">
                 <h5 style="font-size:18px; text-decoration:underline; font-weight: bold;">Pubmed ID</h5>
                 <span><?php echo $row['pubmed_id'];?></span>
             </div>
             <div class="col-md-3">
                <h5 style="font-size:18px; text-decoration:underline; font-weight: bold;">Journal</h5>
                <span><?php echo $row['journal_title'];?></span>
             </div>
            <div class="col-md-3">
                <h5 style="font-size:18px; text-decoration:underline; font-weight: bold;">Author</h5>
                <span><?php echo $row['fore_name']; echo " "; echo $row['last_name'];?>
            
                </span>
             </div>

             <div class="col-md-3">
                <h5 style="font-size:18px; text-decoration:underline; font-weight: bold;">Country</h5>
                <span><?php echo $row['country_journal'];?></span>
             </div>
             
    
          </div>

<!-- BY Foji-->
          <div class="row">
            
            <div class="col-md-9" style="margin-top:50px">
              <h5 style="font-size:18px; text-decoration:underline; font-weight: bold;">Paper Title</h5>
              <span><?php echo $row['title'];?></span>
            </div>
            <div class="col-md-3" style="margin-top:50px">
              <h5 style="font-size:18px; text-decoration:underline; font-weight: bold;">PUBMED Date</h5>
              <span><?php echo $row['pub_month']; echo "/"; echo $row['pub_year'];?></span>
            </div>

          </div>

<!-- Foji 2-->
          <div class="row">
            
            <div class="col-md-3" style="margin-top:50px">
              <h5 style="font-size:18px; text-decoration:underline; font-weight: bold;">ISSN Type</h5>
              <span><?php echo $row['issn_type'];?></span>
            </div>
            <div class="col-md-3" style="margin-top:50px">
              <h5 style="font-size:18px; text-decoration:underline; font-weight: bold;">Journal Abbreviation (ISO) </h5>
              <span><?php echo $row['iso_abbr_journal'];?></span>
            </div>
            <div class="col-md-3" style="margin-top:50px">
              <h5 style="font-size:18px; text-decoration:underline; font-weight: bold;">Digital Object Identifier (DOI) </h5>
              <span><?php echo $row['doi'];?></span>
            </div>

            <div class="col-md-3" style="margin-top:50px">
              <h5 style="font-size:18px; text-decoration:underline; font-weight: bold;">Search Via DOI [Online]</h5>
              
              <span><?php 
                $a = $row['doi'];
                $b = 'https://www.doi.org/';
                $c = $b.$a;
              echo $a;
              echo "<br>";
              echo "<a href='$c'>Find paper Via DOI</a>";
              ?></span>

            </div>

          </div>


        </div><!-- end  center posts -->


<!-- Abstract -->

        <div class="col-md-12">
           <div class="row">
            <br>
            <br>
            <br>
            <h2 class="col-md-3"  style="font-size:26px; text-decoration:underline; font-weight: bold;">Abstract</h2>
            <br>
            <br>
            <br>
              <p style="margin-left:12px; text-align:justify;">
                <?php echo $row['abstract'];?>
                  
                </p>
           </div>
        </div>

<!--KeyWords-->
        <div>

            <div class="col-md-8" style="margin-top:50px">
              <h5 style="font-size:18px; text-decoration:underline; font-weight: bold;">Keywords & Tags </h5>
                  <span>
                    <p style="text-align:justify;">
                    <?php
                     echo $row['keyword'];
                    ?> 
                    </p>
               
                  </span>
                  <br>
                    <!--Other from same author
                    
                    <h5 style="font-size:18px; text-decoration:underline; font-weight: bold;">More Papers from Same Author </h5>

                    <span><?php echo $row['fore_name']; echo " "; echo $row['last_name'];?>
            
                    </span>
                    
                    <input type="text" name="fore_name" id="fore_name" class="form-control" Placeholder="Search By author" style="width:200px;">

                       Data from show data -->



                      <!--END OF DATA-->
            </div>            

            <div class="col-md-4"></div>
            
        </div>
<br>
<br>
<!-- Other paper of fore_name -->        


        <?php }?>
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

