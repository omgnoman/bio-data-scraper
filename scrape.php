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
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs================================================== -->
    <meta charset="utf-8">
    <title>Search</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">
	
	
	
    <!-- script================================================== -->
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>

    <!-- favicons================================================== -->
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="icon" href="favicon.png" type="image/x-icon">
	
	
	<!-- New Files Here-->

	

</head>


<body id="top">
    
    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-jump">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>


    <!-- header
    ================================================== -->
    <header class="s-header">

        <div class="row">

            <div class="header-logo">
                <a class="site-logo" href="index.html"><img src="images/logo.png" style="height:80px; width:180px" alt="Homepage"></a>
            </div>
            
            <nav class="header-nav-wrap">
                <ul class="header-nav">
                    <li class="current"><a  href="index.html" title="home">Home</a></li>
                    <li><a class=""  href="feedback.html" title="feedback">Feedback</a></li>
                    <li><a class="smoothscroll"  href="#contact" title="contact">Contact</a></li>
                    
                </ul>
            </nav> <!-- end header-nav-wrap -->
            
            <a class="header-menu-toggle" href="#0">
                <span class="header-menu-icon"></span>
            </a>

        </div> <!-- end row -->

    </header> <!-- end s-header -->


    <!-- home
    ================================================== -->
    <section id="home" class="s-home page-hero target-section" data-parallax="scroll" data-image-src="images/hero-bg.jpg" data-natural-width=3000 data-natural-height=2000 data-position-y=center>

        <div class="shadow-overlay"></div>

        <div class="home-content">

            <div class="row home-content__main" style="margin-top:-400px; ">

                <h1>
                Search Your Query Here <br>
     
                </h1>


            </div> <!-- end home-content__main -->

            <div class="home-content__scroll">
                <a href="#search" class="scroll-link smoothscroll">
                    Begin Search
                </a>
            </div>

        </div> <!-- end home-content -->

        <ul class="home-social">
            <li>
                <a href="https://facebook.com/omgnoman"><i class="fab fa-facebook-f" aria-hidden="true"></i><span>Facebook</span></a>
            </li>
            <li>
                <a href="https://twitter.com/omgnomansarwar"><i class="fab fa-twitter" aria-hidden="true"></i><span>Twiiter</span></a>
            </li>
            <li>
                <a href="https://www.instagram.com/omgnoman/"><i class="fab fa-instagram" aria-hidden="true"></i><span>Instagram</span></a>
            </li>
            <li>
                <a href="https://www.behance.net/omgnoman"><i class="fab fa-behance" aria-hidden="true"></i><span>Behance</span></a>
            </li>
            <li>
                <a href="https://dribbble.com/omgnoman"><i class="fab fa-dribbble" aria-hidden="true"></i><span>Dribbble</span></a>
            </li>
        </ul> <!-- end home-social -->

    </section> <!-- end s-home -->


    <!-- Scrap================================================== -->
    
	
	
	
	<section id="search" class="s-about target-section">

        <div class="row section-header" data-aos="fade-up">
            <div class="col-full" style="margin-top:-100px; ">
                <h3 data-num="01" class="subhead">Search Papers</h3>
                
				<br> <br> <br>
	
	<section class="search-sec">
    <div class="container">
        <form action="#" method="post" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <input type="text" class="form-control search-slt" style="width:200px;" placeholder="Enter PubMed ID">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <input type="text" class="form-control search-slt" placeholder="Enter Title">
                        </div>
						<div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <input type="text" class="form-control search-slt" style="width:200px;" placeholder="Enter Auther Name">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <select class="form-control search-slt" id="exampleFormControlSelect1">
                                <option>Select Country</option>
                                <option>Country 1</option>
                                <option>Country 2</option>
                                <option>Country 3</option>
                                <option>Country 4</option>
                                <option>Country 5</option>
                                <option>Country 6</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <button type="button" class="btn btn-danger wrn-btn">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Pubmed ID</th>
      <th scope="col">Title</th>
      <th scope="col">Journal</th>
      <th scope="col">Country</th>
      <th scope="col">Abstract</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <?php
      $results = $db->query('SELECT *FROM main_table');
      while ($row = $results->fetchArray()) {?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['pubmed_id']; ?></th>
      <td><?php echo $row['title'];?></td>
      <td><?php echo $row['journal_title'];?></td>
      <td><?php echo $row['country_journal'];?></td>
      <td><?php echo $row['abstract'];?></td>
      <td><?php echo $row['pub_year'];?></td>
      <td>@mdo</td>
    </tr>
  </tbody>
  <?php }?>
</table>
				
				
					
				<!-- Search-->
            </div>
        </div>

		
		<!-- Don't touch it bro -->
		
        <div class="row about-process block-tab-full" style="height:300px; width:100%;" data-aos="fade-up">
				<h4 style=""><u>Search Results</u></h4>
		<br>
            
			
			
			
        </div>  <!-- end about-process -->

		
    </section> <!-- end s-about -->

	<!-- New Section-->
	
	
	
	
	
	
	

    <!-- contact ================================================== -->
    <section id="contact" class="s-contact target-section">

        <div class="row section-header" data-aos="fade-up">
            <div class="col-full">
                <h3 data-num="02" class="subhead">Get In Touch</h3>
                <h1 class="display-1 display-1--light">Have an idea or an epic project in mind? Talk to 
                    us. Let’s work together and make something 
                    great. Drop us a line at <a href="mailto:noman.sarwar.9210@gmail.com">noman.sarwar.9210@gmail.com</a></h1>
            </div>
        </div>

        <div class="row contact-infos">

            <div class="col-five md-seven tab-full contact-address" data-aos="fade-up">
                <h4>Where to Find Us</h4>

                <p>
                COMSATS University Islamabad, <br>
                COMSATS Road off GT road،  <br>
                Comsats University Rd, Sahiwal<br>
				Sahiwal District, Punjab 57000
                </p>
            </div>

            <div class="col-three md-five tab-full contact-social" data-aos="fade-up">
                <h4>Follow Us</h4>

                <ul class="contact-list">
                    <li><a href="https://facebook.com/omgnoman">Facebook</a></li>
                    <li><a href="https://twitter.com/omgnomansarwar">Twitter</a></li>
                    <li><a href="https://www.instagram.com/omgnoman/">Instagram</a></li>
                </ul>
            </div>

            <div class="col-four md-six tab-full contact-number" data-aos="fade-up">
                <h4>Contact Us</h4>

                <ul class="contact-list">
                    <li><a href="mailto:noman.sarwar.9210@gmail.com">noman.sarwar.9210@gmail.com</a></li>
                    <li><a href="tel:197-543-2345">+923 037 916697</a></li>
                    <li><a href="tel:197-123-9876">+923 027 334530</a></li>
                </ul>
            </div>

        </div> <!-- end contact-infos -->

        <div class="row contact-bottom">
            <div class="col-five tab-full contact-button" data-aos="fade-up">
                <a href="feedback.html" class="smoothscroll btn btn-animatedbg">
                    Feedback 
                </a>
            </div>

            <div class="col-six tab-full contact-subscribe" data-aos="fade-up">
                <h4>Subscribe</h4>

                <form id="mc-form" class="group mc-form" novalidate="true">
                    <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required="">
                    <input type="submit" name="subscribe" value="Subscribe">
                    <label for="mc-email" class="subscribe-message"></label>
                </form>
            </div>
        </div> <!-- end contact-button -->

    </section> <!-- end s-contact -->


    <!--================================================== -->
    <footer>
        <div class="row">
            <div class="col-full cl-copyright">
                <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://fb.com/omgnoman" target="_blank">Noman Sarwar</a>
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</span>
            </div>
        </div>

        <div class="cl-go-top">
            <a class="smoothscroll" title="Back to Top" href="#top"></a>
        </div>
    </footer>


    <!--================================================== -->
    <div aria-hidden="true" class="pswp" role="dialog" tabindex="-1">

        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">

            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title=
                    "Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title=
                    "Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title=
                "Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>

        </div>

    </div><!-- end photoSwipe background -->


    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>