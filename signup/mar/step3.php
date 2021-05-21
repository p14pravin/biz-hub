<?php
include ('session.php');

	$check_query = mysqli_query($conn,"SELECT verified from verification where user_id = $user_id");
	$check_row = mysqli_fetch_array($check_query);
	$site = $check_row['verified'];
	if($site != "step3"){
		$site = $check_row['verified'];
		header("Location:$site.php");
	}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>प्रोफाइल - व्यवसाय</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
	<script>
	function getDistricts(val) {
  //alert('val');

  $.ajax({
  type: "POST",
  url: "step_fetch/getdistricts.php",
  data:'catid='+val,
  success: function(data){
    $("#districts").html(data);
    
  }
  });
  }
  </script>
</head>

<body id="page-top">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="row">
                    <div class="col text-center">
                        <nav class="navbar navbar-light navbar-expand-md navigation-clean">
                            <div class="container"><a class="navbar-brand" href="#">NDROID.TECH</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">नेव्हिगेशन टॉगल करा</span><span class="navbar-toggler-icon"></span></button>
                                <div
                                    class="collapse navbar-collapse" id="navcol-1">
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
                    <h1 style="padding: 20px;">आपली वेबसाइट तयार करा</h1>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row mb-3">
                    <div class="col-lg-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3" style="background-color: rgb(20,255,0);">
                                <h6 class="text-primary font-weight-bold m-0">व्यवसाय प्रोफाइल</h6>
                            </div>
                            <div class="card-header py-3" style="background-color: rgb(20,255,0);">
                                <h6 class="text-primary font-weight-bold m-0">व्यवसाय फोटो</h6>
                            </div>
                            <div class="card-header py-3" style="background-color: rgb(250,255,0);">
                                <h6 class="text-primary font-weight-bold m-0">पत्ता प्रोफाइल</h6>
                            </div>
                        </div>
                    </div>
           
                        <div class="row">
                            <div class="col">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">पत्ता स्थापन </p>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="operation/step3.php">
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label for="username"><strong>इमारत / रस्ता&nbsp;</strong><br></label><input class="form-control" type="text" placeholder="Name" name="street" required=""></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <section></section>
                                                    <section>
                                                        <div class="container" style="padding-right: 0px;padding-left: 0px;">
                                                            <div class="form-row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group"><label for="last_name"><strong>गाव / शहर</strong><br></label><input class="form-control" type="text" name="village" placeholder="Name" required=""></div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group"><label for="last_name"><strong>राज्य</strong><br></label>
																	<select class="form-control" name="state" onchange="getDistricts(this.value);" required="">
																		
																			<option selected value="">राज्य निवडा</option>
																			<?php 
																				$query = mysqli_query($conn, "SELECT * from states");
																				
																				while($row=mysqli_fetch_assoc($query)){
																			?>
																				<option value="<?php echo $row['state_id']?>"><?php echo $row[$language];?></option>";
																			<?php	
																				}
																			?>
																		
																	</select>
																</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group"><label for="first_name"><strong>जिल्हा</strong><br></label>
																		<select id="districts" name="district" class="form-control" required="">
																			<optgroup label="Select District">
																			</optgroup></select></div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group"><label for="first_name"><strong>पिन कोड</strong><br></label>
																		<input class="form-control" type="tel" name="pin" placeholder="Pin Code" required="" minlength="6" maxlength="6">
																	</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
											<button class="btn btn-primary btn-sm" type="submit">&nbsp;स्थापन जमा करा</button></div>
                                        </form>
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
                <div class="text-center my-auto copyright"><span><br>ndroid tech 2020 | आपल्याद्वारे आणले  <a href="http://ndroid.tech/">ndroid.tech</a><br><br></span></div>
            </div>
        </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>