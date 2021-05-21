<?php
include('database/db.php');
$msg		= "";
$mobile_msg		= "";
if($_SERVER['REQUEST_METHOD']=='POST'){
	$uid		= $_POST['uid'];
	$mobile		= $_POST['mobile'];
	$email		= $_POST['email'];
	$language	= $_POST['language'];
		if(!isset($language)){
			$language = "english";
		}
	$pass		= $_POST['password'];
	$pass_2 	= $_POST['password_repeat'];
	
	
	$mob_fetch = mysqli_query($conn,"SELECT * from reg where mobile = '$mobile'");
	if($row = mysqli_fetch_assoc($mob_fetch)){
		
			$mobile_msg = " this number already registered please <a href='login.php'> login here </a>";
	}
	else{
		if($pass ==	$pass_2){
	
		$query = "INSERT into reg (uid, mobile, email, password,lang) values ('$uid','$mobile','$email','$pass','$language')";
		
			if (mysqli_query($conn, $query)){
				
				$veri = mysqli_query($conn,"SELECT id from reg where mobile = $mobile");
				if($veri_row = mysqli_fetch_array($veri)){
					$user_id = $veri_row['id'];
					$veri_update = "INSERT INTO verification (user_id,verified) VALUES ('$user_id','step1');";
					if($row = mysqli_query($conn,$veri_update)){
					
					header("Location:login.php");
					}
				}
				
			}
	
		}
		else{
		$msg = "Password not matched";
		}
	}
	mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - Business</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
	<!-- firebasee connection-->
	<script src="https://www.gstatic.com/firebasejs/4.3.1/firebase.js"></script>
  <script>
    // Initialize Firebase
    var config = {
      apiKey: "AIzaSyCIL0C5LAZ9wqTP7__s0CY-vOK-Iwl6_uE",
      authDomain: "justread-3e35f.firebaseapp.com",
      databaseURL: "https://justread-3e35f.firebaseio.com",
      projectId: "justread-3e35f",
      storageBucket: "justread-3e35f.appspot.com",
      messagingSenderId: "993672040921"
    };
    firebase.initializeApp(config);
  </script>
  <script src="https://cdn.firebase.com/libs/firebaseui/2.3.0/firebaseui.js"></script>
  <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/2.3.0/firebaseui.css" />
	<!-- Connection End-->
</head>

<body class="bg-gradient-primary">
    <div></div>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="#">NDROID.TECH</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#">Terms and Condition</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">Developers</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="loading">Loading...</div>
    <div id="loaded" class="hidden">
        <div id="main">
			<div id="user-signed-in" class="hidden">
				<div class="container">
					<div class="card shadow-lg o-hidden border-0 my-5">
						<div class="card-body p-0">
							<div class="row">
								<div class="col-lg-5 d-none d-lg-flex">
									<div class="flex-grow-1 bg-register-image" style="background-image: url('assets/img/dogs/image2.jpeg');"></div>
								</div>
								<div class="col-lg-7">
									<div class="p-5">
										<h4 class="text-dark mb-4"><?php echo $mobile_msg; ?></h4>
										<h4 class="text-center" style="margin-bottom:35px; color: red"><?php echo $msg?></h4>
										<div class="col-md-12 d-flex d-xl-flex justify-content-center justify-content-xl-center"><img class="d-flex d-xl-flex justify-content-xl-end" src="assets/img/avatars/register.png" width="150" /></div>
										<div class="text-center">
											<h4 class="text-dark mb-4">Create an Account!</h4>
										</div>
										<form class="user" method="POST" action="">
											<div class="form-group">
												<input class="form-control form-control-user" type="text" id="userID" aria-describedby="emailHelp" placeholder="Email Address" name="uid" style="margin: 0px;margin-bottom: 15px;" readonly=""/>
												<input class="form-control form-control-user" type="text" id="phone" aria-describedby="emailHelp" placeholder="Mobile Number" name="mobile" style="margin: 0px;margin-bottom: 15px;" minlength="10" maxlength="13" readonly=""/>
											<div class="form-group">
												<input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" required="">
											</div>
											<div class="form-group">
														<select class="form-control" name="language" required="">
															<option value="">Select Language</option>
															
																
																<?php 
																	$query = mysqli_query($conn, "SELECT * from language");
																	while($row=mysqli_fetch_assoc($query)){
																?>
																	<option value="<?php echo $row['lang_type']?>"><?php echo $row['language'];?></option>";
																<?php	
																	}
																?>
																
																
															
														</select>
													</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-6 mb-3 mb-sm-0">
													<input class="form-control form-control-user" type="password" id="password" placeholder="Password" name="password" minlength="5" required=""/>
												</div>
												<div class="col-sm-6">
													<input class="form-control form-control-user" type="password" id="confirm_password" placeholder="Repeat Password" name="password_repeat" onkeyup='check();' minlength="5" required=""/><span style="margin-top:35px; margin-left:5px" id='message'></span>
												</div>
											</div>
											<div class="form-group">
												<div class="custom-control custom-checkbox small">
													<div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1" required=""><label class="form-check-label custom-control-label" for="formCheck-1">Terms and Condition Apply</label></div>
												</div>
											</div>
											<button disabled="" id="register" class="btn btn-primary btn-block text-white btn-user" type="submit">Register Account</button>
											<hr />
											<hr />
											<button class="btn btn-danger btn-block text-white btn-user" id="sign-out">Change Mobile Number</button>
										</form>
										<div class="text-center"><a class="small" href="forgot-password.php">Forgot Password?</a></div>
										<div class="text-center"><a class="small" href="login.php">Already have an account? Login!</a></div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<p>
				  
				  <button id="delete-account">Delete account</button>
				</p>
			</div>
			<div id="user-signed-out" class="hidden">
				<div id="firebaseui-spa">
					<div class="col-md-12 d-flex d-xl-flex justify-content-center justify-content-xl-center" style="margin-top : 20px"><img class="d-flex d-xl-flex justify-content-xl-end" src="assets/img/avatars/register.png" width="150" /></div>
										<div class="text-center">
											<h4 class="text-dark mb-4">Create an Account!</h4>
										</div>
				  <div id="firebaseui-container"></div>
				</div>
			</div>
        </div>
    </div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span><br>ndroid tech 2020 | Brought To You by <a href="http://ndroid.tech/">ndroid.tech</a><br><br></span></div>
        </div>
    </footer>
	<script src="app.js"></script>
	<script>
	var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
	document.getElementById('register').removeAttribute("disabled");
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Password not matching';
	document.getElementById('register').setAttribute("disabled","disabled");
  }
}
	</script>
	<script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/script.min.js"></script>
    
</body>

</html>