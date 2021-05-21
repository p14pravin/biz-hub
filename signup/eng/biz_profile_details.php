<?php
include('step_fetch/fetch.php');
		
		$query = mysqli_query($conn,"SELECT * from business where user_id = $user_id");
		if($row = mysqli_fetch_array($query)){

?>
<script>
function getCategory(val) {
  //alert('val');

  $.ajax({
  type: "POST",
  url: "step_fetch/getcategory.php",
  data:'catid='+val,
  success: function(data){
    $("#category").html(data);
    
  }
  });
  }
  </script>
<form method = "POST" action="operation/biz_profile_details.php">
	<div class="form-row">
		<div class="col">
			<div class="form-group"><label for="username"><strong>Business</strong></label><input class="form-control" type="text" placeholder="Business Name" name="name" value="<?php echo $row['biz_name']?>" required="" minlength="1" maxlength="50"></div>
		</div>
	</div>
	<div class="form-row">
		<div class="col">
			<div class="form-group"><label for="last_name"><strong>Description</strong><br></label>
				<textarea class="form-control" name="description"  style="height: 120px;" required=""><?php echo $row['biz_description'];?></textarea>
			</div>
			<div class="form-group"><label for="last_name"><strong>Business Type</strong><br></label>
				
				<select class="form-control" name="type" value="<?php echo $type_row[$language]?>" onchange="getCategory(this.value);" required="">
						
						<option selected value="">Select Business type</option>
						<?php 
							$query_type = mysqli_query($conn, "SELECT * from biz_type");
							while($row_type=mysqli_fetch_assoc($query_type)){
						?>
							<option value="<?php echo $row_type['type_id']?>"><?php echo $row_type[$language];?></option>";
						<?php	
							}
						?>
					
				</select>
			</div>
			<div class="form-group"><label for="last_name"><strong>Category</strong><br></label>
				
				<select id="category" name="category" class="form-control" required="">
					
						
				</select>
			</div>
		</div>
	</div>
		<section>
			<div class="container" style="padding-right: 0px;padding-left: 0px;">
				<div class="form-row">
					<div class="col-md-4">
						<div class="form-group"><label for="first_name"><strong>Weekly off day</strong><br></label>
							
							<?php 
									$day_query = mysqli_query($conn, "SELECT * from day where day_id ='".$row['holiday']."'");
										$day_row=mysqli_fetch_assoc($day_query);
									?>
							
							<select class="form-control" name="day" required="">
									<option value="<?php echo $day_row['day_id']?>"><?php echo $day_row[$language];?></option>
									<?php 
										$query = mysqli_query($conn, "SELECT * from day");
										while($row_day=mysqli_fetch_assoc($query)){
									?>
										<option value="<?php echo $row_day['day_id']?>"><?php echo $row_day[$language];?></option>";
									<?php	
										}
									?>
									
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group"><label for="first_name"><strong>Opening Time</strong><br></label>
							<?php 
									$open_query = mysqli_query($conn, "SELECT * from time where time_id ='".$row['open_time']."'");
										$open_row=mysqli_fetch_assoc($open_query);
									?>
							<select class="form-control" name="open_time" required="">
									<option value="<?php echo $open_row['time_id']?>"><?php echo $open_row[$language];?></option>
									<?php 
										$query_open = mysqli_query($conn, "SELECT * from time");
										while($row_open=mysqli_fetch_assoc($query_open)){
									?>
										<option value="<?php echo $row_open['time_id']?>"><?php echo $row_open[$language];?></option>
									<?php	
										}
									?>
								
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group"><label for="first_name"><strong>Closing Time</strong><br></label>
							<?php 
									$close_query = mysqli_query($conn, "SELECT * from time where time_id ='".$row['close_time']."'");
										$close_row=mysqli_fetch_assoc($close_query);
									?>
							<select class="form-control" name="close_time" required="">
								<option value="<?php echo $close_row['time_id']?>"><?php echo $close_row[$language];?></option>
									<?php 
										$query_close = mysqli_query($conn, "SELECT * from time");
										while($row_close=mysqli_fetch_assoc($query_close)){
									?>
										<option value="<?php echo $row_close['time_id']?>"><?php echo $row_close[$language];?></option>";
									<?php	
										}
									?>
								
							</select></div>
					</div>
				</div>
			</div>
		</section>
	<div class="row">
		<div class="col text-center" style="margin: 10px;"><button class="btn btn-primary btn-sm" type="submit">Update Settings</button></div>
	</div>
</form>
		<?php
		
		}
		
		?>