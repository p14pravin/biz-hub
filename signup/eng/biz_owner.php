<?php
		$query_owner = mysqli_query($conn,"SELECT * from owner where biz_id IN (SELECT biz_id from business where user_id = '$user_id')");
		if($row_owner=mysqli_fetch_array($query_owner)){
	
?>
<div class="card shadow mb-3">
	<div class="card-header py-3">
		<p class="text-primary m-0 font-weight-bold">Owner Settings</p>
	</div>
	<div class="card-body">
		<form method="POST" action="operation/biz_owner.php" enctype="multipart/form-data">
			<div class="form-row">
				<div class="col">
					<div class="form-group"><label for="username"><strong>Name</strong><br></label>
						<input value="<?php echo $row_owner['name']?>" class="form-control" type="text" placeholder="Owner Name" name="name" required="">
					</div>
					<label for="username"><strong>Owner Image</strong><br></label>
					<div class="form-group text-center"><img id="ownerImage" class="border rounded-0" src="assets/img/business/owner/<?php echo $row_owner['image']?>" alt="owner image" width="250px" style="margin: 15px;">
						<div class="form-row">
							<div class="col text-center"><input type="file" onchange="readURLowner(this)" accept="image/*" required="" name="image"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col">
					<section>
						<div class="container" style="padding-right: 0px;padding-left: 0px;">
							<div class="form-row">
								<div class="col-md-6">
									<div class="form-group"><label for="first_name"><strong>Mobile</strong><br></label><input value="<?php echo $row_owner['mobile']?>" class="form-control" type="tel" placeholder="Mobile" name="mobile" required="" minlength="10" maxlength="10"></div>
								</div>
								<div class="col-md-6">
									<div class="form-group"><label for="first_name"><strong>E-mail</strong><br></label><input value="<?php echo $row_owner['email']?>" class="form-control" type="email" placeholder="E-mail" name="email" required=""></div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
			<div class="row">
				<div class="col text-center" style="margin: 10px;"><button class="btn btn-primary btn-sm" type="submit">Save&nbsp;Settings</button></div>
			</div>
		</form>
	</div>
</div>
<script>
	function readURLowner(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#ownerImage')
                        .attr('src', e.target.result)
                        
                        
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	</script>
		<?php

		}
		?>