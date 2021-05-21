<?php		
		$address_query = mysqli_query($conn,"SELECT * from address where biz_id IN (SELECT biz_id from business where user_id = $user_id)");
		$address_row=mysqli_fetch_array($address_query);
?>
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
<div class="card shadow mb-3">
	<div class="card-header py-3">
		<p class="text-primary m-0 font-weight-bold">पत्याविषयक  स्थापन</p>
	</div>
	<div class="card-body">
		<form method="POST" action="operation/biz_address.php">
			<div class="form-row">
				<div class="col">
					<div class="form-group"><label for="username"><strong>इमारत / रस्ता &nbsp;</strong><br></label><input class="form-control" value="<?php echo $address_row['street'];?>" type="text" placeholder="Name" name="street" required=""></div>
				</div>
			</div>
			<div class="form-row">
				<div class="col">
					<section></section>
					<section>
						<div class="container" style="padding-right: 0px;padding-left: 0px;">
							<div class="form-row">
								<div class="col-md-6">
									<div class="form-group"><label for="last_name"><strong>गाव / शहर</strong><br></label><input value="<?php echo $address_row['village'];?>" class="form-control" type="text" name="village" placeholder="Name" required=""></div>
								</div>
								<div class="col-md-6">
									<div class="form-group"><label for="last_name"><strong>राज्य</strong><br></label>
										<select class="form-control" name="state" onchange="getDistricts(this.value);" required="">
											<option value="">राज्य निवडा</option>
											<?php 
													$query = mysqli_query($conn, "SELECT * from states");
													
													while($row=mysqli_fetch_assoc($query)){
												?>
													<option value="<?php echo $row['state_id']?>"><?php echo $row[$language];?></option>";
												<?php	
													}
												?></select></div>
								</div>
								<div class="col-md-6">
									<div class="form-group"><label for="first_name"><strong>जिल्हा</strong><br></label>
									<select id="districts" name="district" class="form-control" required="">
										
									</select></div>
								</div>
								<div class="col-md-6">
									<div class="form-group"><label for="first_name"><strong>पिन कोड</strong><br></label><input value="<?php echo $address_row['pin'];?>" class="form-control" type="text" name="pin" placeholder="Pin Code" required="" minlength="6" maxlength="6"></div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
			<div class="row">
				<div class="col text-center" style="margin: 10px;"><button class="btn btn-primary btn-sm" type="submit">अद्यतनित स्थापन  करा </button></div>
			</div>
		</form>
		
	</div>
</div>