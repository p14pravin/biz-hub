<?php
include ('session.php');

	$check_query = mysqli_query($conn,"SELECT verified from verification where user_id = $user_id");
	$check_row = mysqli_fetch_array($check_query);
	$site = $check_row['verified'];
	if($site != "step5"){
		$site = $check_row['verified'];
		header("Location:$site.php");
	}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile - Business</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="row">
                    <div class="col text-center">
                        <nav class="navbar navbar-light navbar-expand-md navigation-clean">
                            <div class="container"><a class="navbar-brand" href="#">NDROID.TECH</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                                <div
                                    class="collapse navbar-collapse" id="navcol-1">
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
                    <h1 style="padding: 20px;">Build Your Website</h1>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row mb-3">
                    <div class="col-lg-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3" style="background-color: rgb(20,255,0);">
                                <h6 class="text-primary font-weight-bold m-0">Business Profile</h6>
                            </div>
                            <div class="card-header py-3" style="background-color: rgb(20,255,0);">
                                <h6 class="text-primary font-weight-bold m-0">Business Photo</h6>
                            </div>
                            <div class="card-header py-3" style="background-color: rgb(20,255,0);">
                                <h6 class="text-primary font-weight-bold m-0">Address Profile</h6>
                            </div>
                            <div class="card-header py-3" style="background-color: rgb(20,255,0);">
                                <h6 class="text-primary font-weight-bold m-0">Contact Profile</h6>
                            </div>
                            <div class="card-header py-3" style="background-color: rgb(20,255,0);">
                                <h6 class="text-primary font-weight-bold m-0">Business Owner</h6>
                            </div>
                            <div class="card-header py-3" style="background-color: rgb(250,255,0);">
                                <h6 class="text-primary font-weight-bold m-0">Business Images</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        
                        <div class="row">
                            <div class="col">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Business Images&nbsp;</p>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="operation/step5.php" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="col">
													<div class="form-group"><label for="username"><strong>Business Image</strong><br></label>
														<div class="col-md-12 d-flex d-xl-flex justify-content-center justify-content-xl-center">
															<img class="d-flex d-xl-flex justify-content-xl-end" src="#" id="blah" alt="Image" >
														</div>
													
                                                        <div class="form-row">
                                                            <div class="col text-center">
																<input onchange="readURL(this);" name="image1" type="file" accept="image/*" required="">
															</div>
                                                        </div>
                                                    </div>
													<div class="form-group"><label for="username"><strong>Business Image</strong><br></label>
														<div class="col-md-12 d-flex d-xl-flex justify-content-center justify-content-xl-center">
															<img class="d-flex d-xl-flex justify-content-xl-end" src="#" id="bblah" alt="Image" >
														</div>
													
                                                        <div class="form-row">
                                                            <div class="col text-center">
																<input onchange="rreadURL(this);" name="image2" type="file" accept="image/*" required="">
															</div>
                                                        </div>
                                                    </div>
													<div class="form-group"><label for="username"><strong>Business Image</strong><br></label>
														<div class="col-md-12 d-flex d-xl-flex justify-content-center justify-content-xl-center">
															<img class="d-flex d-xl-flex justify-content-xl-end" src="#" id="bbblah" alt="Image" >
														</div>
													
                                                        <div class="form-row">
                                                            <div class="col text-center">
																<input onchange="rrreadURL(this);" name="image3" type="file" accept="image/*" required="">
															</div>
                                                        </div>
                                                    </div>
													
                                                    
                                                </div>
                                            </div>
											<button class="btn btn-primary btn-sm" type="submit">Save&nbsp;Settings</button>
                                        </form>
									</div>
                                </div>
                                <div class="card shadow"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span><br>ndroid tech 2020 | Brought To You by <a href="http://ndroid.tech/">ndroid.tech</a><br><br></span></div>
            </div>
        </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script>
	function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(200)
                        
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	function rreadURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#bblah')
                        .attr('src', e.target.result)
                        .width(200)
                        
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	function rrreadURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#bbblah')
                        .attr('src', e.target.result)
                        .width(200)
                        
                };

                reader.readAsDataURL(input.files[0]);
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