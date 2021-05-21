<?php
		
		$biz_query = mysqli_query($conn,"SELECT * from business where biz_id = '$biz_id'");
		$biz_row = mysqli_fetch_array($biz_query);
		
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - <?php echo $biz_row['biz_name'];?></title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Article-Clean.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Highlight-Blue.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/Team-Boxed.css">
</head>

<body id="page-top">
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">
        <div class="container"><a class="navbar-brand" href="#page-top">Brand</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto text-uppercase">
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="#team">owner</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="developer.php">Developer</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="signup/login.php">Sign in</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead" style="background-image:url('assets/img/header-bg.jpg');">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in"><span style="color: rgb(153,237,192);font-size: 28px;">Welcome To...!</span></div>
                <div class="intro-heading text-uppercase"><span style="color: rgb(127,109,237);font-size: 43px;filter: blur(0px) contrast(200%) grayscale(0%) hue-rotate(58deg) invert(0%) saturate(97%);font-family: 'Kaushan Script', cursive;"><?php echo $biz_row['biz_name']?></span></div><a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger"
                    role="button" href="#services">Tell me more</a></div>
        </div>
    </header>
    <section id="services" style="padding-top: 50px;padding-bottom: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading">Services</h2>
					<?php 
						$biz_type = $biz_row['biz_type'];
						$type_query = mysqli_query($conn,"SELECT * from biz_type where type_id = '$biz_type'");
						$type_row = mysqli_fetch_array($type_query);
					?>
                    <h3 class="text-muted section-subheading" style="font-size: 21px;"><?php echo strtoupper($type_row[$lang]); ?></h3>
                </div>
            </div>
            <div class="row d-md-flex d-lg-flex justify-content-md-center justify-content-lg-center text-center" style="background-color: #cef2c5;">
                <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i></span>
                    <?php 
						$biz_cat = $biz_row['biz_category'];
						$cat_query = mysqli_query($conn,"SELECT * from category where cat_id = '$biz_cat'");
						$cat_row = mysqli_fetch_array($cat_query);
					?>
					<h4 class="section-heading" style="font-size: 20px;"><?php echo strtoupper($cat_row[$lang]); ?></h4>
                    <p class="text-left text-muted" style="font-size: 23px;"><?php echo $biz_row['biz_description'];?></p>
                </div>
            </div>
        </div>
    </section>
    <section id="portfolio"  style="background-color: #d5fffc; padding-top: 50px;padding-bottom: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading">Portfolio</h2>
                    <h3 class="section-subheading text-muted">Customer service shouldn't just be a department, it should be the entire company.<br></h3>
                </div>
            </div>
        </div>
    </section>
    <div class="simple-slider" style="background-color: #d5fffc; padding-bottom: 50px;">
        <div class="swiper-container">
				<?php 
						$gallery_query = mysqli_query($conn,"SELECT * from gallery where biz_id = '$biz_id'");
						$gallery_row = mysqli_fetch_array($gallery_query);
					?>
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image: url('signup/assets/img/business/myshop/<?php echo $gallery_row['image1']; ?>');padding-bottom: 0px;"></div>
                <div class="swiper-slide" style="background-image:url('signup/assets/img/business/myshop/<?php echo $gallery_row['image2']; ?>');"></div>
                <div class="swiper-slide" style="background-image:url('signup/assets/img/business/myshop/<?php echo $gallery_row['image3']; ?>');"></div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
    <section id="about" style="padding-bottom: 50px;padding-top: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase">About</h2>
                    <h3 class="text-center text-muted section-subheading">We don't want to push our ideas on to <strong>customers</strong>, we simply want to make what they want.<br></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center" style="background-color: #fbccf6;padding-bottom: 60px;padding-top: 14px;"><img class="col-sm-4 border rounded-0 border-danger" src="signup/assets/img/business/profile/<?php echo $biz_row['biz_image'];?>" width="300px" style="margin-bottom: 12px;">
                    <ul class="list-group timeline">
                        <li class="list-group-item">
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/morning.jpg"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
									<?php 
										$biz_open = $biz_row['open_time'];
										$open_query = mysqli_query($conn,"SELECT * from time where time_id = '$biz_open'");
										$open_row = mysqli_fetch_array($open_query);
									?>
                                    <h4 style="font-size: 14px;color: rgb(16,173,13);">Open at</h4>
                                    <h4 class="subheading" style="font-size: 25px;"><?php echo $open_row[$lang];?></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Everyday at <?php echo $open_row[$lang];?> it open for Serve the service&nbsp;</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item timeline-inverted">
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/sunset.jpg"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
								<?php 
										$biz_close = $biz_row['close_time'];
										$close_query = mysqli_query($conn,"SELECT * from time where time_id = '$biz_close'");
										$close_row = mysqli_fetch_array($close_query);
									?>
                                    <h4 style="font-size: 14px;color: rgb(167,181,8);">Close at</h4>
                                    <h4 class="subheading" style="font-size: 25px;"><?php echo $close_row[$lang];?></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Our Service is Available Until <?php echo $close_row[$lang];?> Everyday.</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/images.jpg"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
								<?php 
										$biz_holiday = $biz_row['holiday'];
										$holiday_query = mysqli_query($conn,"SELECT * from day where day_id = '$biz_holiday'");
										$holiday_row = mysqli_fetch_array($holiday_query);
									?>
                                    <h4 style="font-size: 14px;color: rgb(255,15,0);">Holiday</h4>
                                    <h4 class="subheading"><?php echo $holiday_row[$lang];?></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted"><?php echo $holiday_row[$lang];?> is off to our Service</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item timeline-inverted">
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/thank-you.jpg"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 style="font-size: 14px;color: rgb(61,171,165);">Thank You...!</h4>
                                    <p class="text-muted">Thank you for visiting for our service. we alwasys serve best of our service. more more details contact us.</p>
                                    <h4 class="subheading" style="color: rgb(25,114,203);">Regards <?php echo $biz_row['biz_name'];?></h4>
                                </div>
                                <div class="timeline-body"></div>
                            </div>
                        </li>
                        <li class="list-group-item timeline-inverted">
                            <div class="timeline-image">
                                <h4>Be Part<br>&nbsp;Of Our<br>&nbsp;Story!</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="team" class="bg-light" style="padding-top: 51px;padding-bottom: 50px;">
        <div class="container">
            <div class="row d-flex d-md-flex d-lg-flex justify-content-center justify-content-md-center justify-content-lg-center" style="background-color: #ffe58a;padding-top: 0px;">
                <div class="col-sm-4">
					<?php
						$owner_query = mysqli_query($conn,"SELECT * from owner where biz_id = '$biz_id'");
						$owner_row = mysqli_fetch_array($owner_query);
					?>
                    <div class="team-member"><img class="rounded-circle mx-auto" src="signup/assets/img/business/owner/<?php echo $owner_row['image']?>">
                        <h4><?php echo $owner_row['name']?></h4>
                        <p class="text-muted">Owner</p>
                        <ul class="list-inline social-buttons">
                            <li class="list-inline-item"><a href="https://api.whatsapp.com/send?phone=+91<?php echo $owner_row['mobile']?>"><i class="fa fa-whatsapp"></i></a></li>
                            <li class="list-inline-item"><a href="tel:+91<?php echo $owner_row['mobile']?>"><i class="fa fa-phone"></i></a></li>
                            <li class="list-inline-item"><a href="mailto:<?php echo $owner_row['email']?>"><i class="fa fa-envelope-o"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact" style="padding-top: 49px;">
        <div class="container">
            <div class="row" style="padding-bottom:50px;">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading">Contact Us</h2>
                    <h3 class="section-subheading text-muted">As a membership site we're always focused on reducing churn and increasing<br> satisfaction. We know that collecting feedback from customers <br>throughout the customer's lifecycle has allowed us to achieve both.<br></h3>
                    <div class="row">
                        <div class="col" style="background-color: #cafe89;padding-top: 20px;">
						<?php
							$address_query = mysqli_query($conn,"SELECT * from address where biz_id = '$biz_id'");
							$address_row = mysqli_fetch_array($address_query);
							
							$district = $address_row['district'];
							$dist_query = mysqli_query($conn,"SELECT * from districts where dist_id = '$district'");
							$dist_row = mysqli_fetch_array($dist_query);
							
							$state = $address_row['state'];
							$state_query = mysqli_query($conn,"SELECT * from states where state_id = '$state'");
							$state_row = mysqli_fetch_array($state_query);
						?>
                            <h1 style="color: rgb(255,0,0);font-size: 12px;"><i class="fa fa-map-marker"></i>&nbsp; &nbsp; &nbsp;ADDRESS</h1>
                            <p style="font-size: 25px;"><?php echo $address_row['street']?>,<br><?php echo $address_row['village']?>, <?php echo $dist_row[$lang]?>,<br><?php echo $state_row[$lang];?>, <?php echo $address_row['pin']?></p>
                            <section style="background-color: #c9f2fb;">
                                <div class="container">
                                    <div class="row">
									<?php
										$contact = mysqli_query($conn,"SELECT mobile,email from reg where id IN (SELECT user_id from business where biz_id = '$biz_id')");
										$cont_row= mysqli_fetch_array($contact);
									?>
                                        <div class="col-md-6" style="padding-bottom: 40px;">
                                            <p style="font-size: 12px;"><i class="fa fa-phone" style="font-size: 35px;"></i>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; MOBILE</p>
                                            <p class="shadow-lg d-lg-flex justify-content-lg-center" style="font-size: 30px;"><strong><a href="tel:+91<?php echo $owner_row['mobile']?>"><?php echo $cont_row['mobile']?></a></strong></p>
                                        </div>
                                        <div class="col-md-6" style="padding-top: 0px;">
                                            <p style="font-size: 12px;"><i class="fa fa-envelope-o" style="font-size: 35px;"></i>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; E-MAIL</p>
                                            <p class="shadow-lg d-lg-flex justify-content-lg-center" style="font-size: 30px;"><strong><?php echo $cont_row['email']?></strong></p>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form id="contactForm" name="contactForm" novalidate="novalidate">
                        <div class="form-row">
                            <div class="col">
								<?php $village = $address_row['village'];
									   str_replace(' ','%2C%20',$village);
									  $dist = $dist_row[$lang]; 
									   str_replace(' ','%2C%20',$dist);
									   
									  $state = $state_row[$lang];
									   str_replace(' ','%2C%20',$state);
									    
								?>
                                <div class="clearfix"></div><iframe allowfullscreen="" frameborder="0" src="https://maps.google.com/maps?q=<?php echo $village;?>%2C%20<?php echo $dist;?>%2C%20<?php echo $state; ?>%2C%20india&t=&z=14&ie=UTF8&iwloc=&output=embed" width="100%" height="400"></iframe></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="highlight-blue">
        <div class="container">
            <div class="intro">
                <h2 class="text-center"><strong>SIGN UP</strong></h2>
                <p class="text-center"><br>Sign up for a <strong>free website</strong> builder. Choose what kind of <strong>website</strong> you want to <strong>create.</strong><br><br>Take Your <strong>Business</strong> Online With Ease. 24/7 Customer Support. Get Started
                    Now!<br></p>
            </div>
            <div class="buttons"><a class="btn btn-primary" role="button" href="#">SIGN UP</a></div>
        </div>
    </div>
    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 text-center item" style="padding-left: 46px;padding-right: 45px;">
                        <h3 style="font-size: 28px;">Services</h3>
                        <ul>
                            <li><a href="#">Web design</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Hosting</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 text-center item" style="padding-right: 46px;padding-left: 46px;">
                        <h3 style="font-size: 28px;">About</h3>
                        <ul>
                            <li><a href="terms.php">Term and Condition</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="privacy.php">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text" style="padding-left: 40px;padding-right: 40px;">
                        <h3 class="text-left" style="font-size: 28px;font-family: Montserrat, sans-serif;">ndroid.tech</h3>
                        <p class="text-left" style="font-size: 20px;">Service,<br> in short, is not what you do, but who you are. It's a way of living <br>that you need to bring to everything you do if you're to bring it to <br>your customer interactions.<br></p>
                    </div>
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-youtube"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright" style="color: rgb(255,255,255);font-family: 'Kaushan Script', cursive;font-size: 20px;">Copyright&nbsp;© Made with&nbsp; ❤&nbsp;ndroid 2020</p>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
	<script>
		var slideIndex = 0;
		carousel();

		function carousel() {
		  var i;
		  var x = document.getElementsByClassName("swiper-slide");
		  for (i = 0; i < x.length; i++) {
			x[i].style.display = "none"; 
		  }
		  slideIndex++;
		  if (slideIndex > x.length) {slideIndex = 1} 
		  x[slideIndex-1].style.display = "block"; 
		  setTimeout(carousel, 2000); 
		}
	</script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/agency.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
</body>

</html>