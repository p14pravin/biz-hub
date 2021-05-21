<?php
include('database/db.php');
$msg		= "";

	if($_SERVER['REQUEST_METHOD']=='POST'){
	
	$mobile		= $_POST['mobile'];
	$mobile		= "+91$mobile";
	$password	= $_POST['password'];
	
	$log_query = mysqli_query($conn,"SELECT * from reg where mobile = '$mobile' and password = '$password'");
	$log_row  = mysqli_fetch_array($log_query);
		if(is_array($log_row)) {
			#login success
			session_start();
			$_SESSION["user"] = $log_row['id'];
			$_SESSION["language"] = $log_row['lang'];
			$_SESSION["biz_id"] = "";
			$user_id = $log_row['id'];
			$v_query = mysqli_query($conn,"SELECT verified from verification where user_id = '$user_id'");
			if($v_row = mysqli_fetch_array($v_query)){
				$site = $v_row['verified'];
					#move to last page where stopped
					header("Location:$site.php");
			}
			
		}
		else{
			#check user have account or not
			$check = mysqli_query($conn,"SELECT mobile from reg where mobile = '$mobile'");
			$log_check = mysqli_fetch_array($check);
			if(is_array($log_check)) {
				#user have account but wrong input
				$msg = "Invalid Username or Password";
			}
			else{
				#accout not found
				$msg = "Account Not Found";
			}
		}
		
	
	}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>लॉगिन - व्यवसाय</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body class="bg-gradient-primary">
    <nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="#">NDROID.TECH</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">नेव्हिगेशन टॉगल करा</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#">होम</a></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#">नियम व अटी</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">विकसक</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">गोपनीयता धोरण</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/dogs/image3.jpeg&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="row">
										<h4 class="text-danger mb-4 text-center"><?php echo $msg;?></h4>
                                        <div class="col d-flex d-xl-flex justify-content-center justify-content-xl-center"><img class="d-xl-flex justify-content-xl-center" src="assets/img/avatars/login.png" width="150"></div>
                                    </div>
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4" style="margin-top: 11px;">परत स्वागत आहे!</h4>
                                    </div>
                                    <form class="user" method = "POST" action="">
                                        <div class="form-group">
											<input class="form-control form-control-user" type="tel" placeholder="Enter Mobile Number..." name="mobile" required="" maxlength="10">
										</div>
                                        <div class="form-group">
											<input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password" required="" minlength="5">
										</div>
										<button class="btn btn-primary btn-block text-white btn-user" type="submit">लॉगिन</button>
                                        <hr>
                                        <hr>
                                    </form>
                                    <div class="text-center"><a class="small" href="forgot-password.php">पासवर्ड विसरलात ?</a></div>
                                    <div class="text-center"><a class="small" href="register.php">खाते तयार करा!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span><br>ndroid tech 2020 | आपल्याद्वारे आणले <a href="http://ndroid.tech/">ndroid.tech</a><br><br></span></div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>