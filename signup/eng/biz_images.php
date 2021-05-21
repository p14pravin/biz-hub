<?php
	
	$query_ima = mysqli_query($conn,"SELECT * from gallery where biz_id IN (SELECT biz_id from business where user_id = '$user_id')");
	
	if($row_ima = mysqli_fetch_array($query_ima)){
		
?>
<div class="card shadow mb-3">
	<div class="card-header py-3">
		<p class="text-primary m-0 font-weight-bold">Business Images Gallery</p>
	</div>
	<div class="card-body">
		<form method="POST" action="operation/biz_images.php" enctype="multipart/form-data">
			<div class="form-row">
				<div class="col">
					<div class="form-group text-center"><label for="username"><br></label><img id="image1" src="assets/img/business/myshop/<?php echo $row_ima['image1'];?>" width="200px" alt="owner image" style="margin: 15px;">
						<div class="form-row">
							<div class="col text-center"><input onchange="readURLimag1(this)" type="file" required="" accept="image/*" name="image"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col text-center" style="margin: 10px;"><button class="btn btn-primary btn-sm" value="image1" name="img" type="submit">Update Settings</button></div>
			</div>
		</form>
		
	</div>
	<div class="card-body">
		<form method="POST" action="operation/biz_images.php" enctype="multipart/form-data">
			<div class="form-row">
				<div class="col">
					<div class="form-group text-center"><label for="username"><br></label><img id="image2" src="assets/img/business/myshop/<?php echo $row_ima['image2'];?>" width="200px" alt="owner image" style="margin: 15px;">
						<div class="form-row">
							<div class="col text-center"><input onchange="readURLimag2(this)" type="file" required="" name="image" accept="image/*"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col text-center" style="margin: 10px;"><button class="btn btn-primary btn-sm" value="image2" name="img" type="submit">Update Settings</button></div>
			</div>
		</form>
		
	</div>
	<div class="card-body">
		<form method="POST" action="operation/biz_images.php" enctype="multipart/form-data">
			<div class="form-row">
				<div class="col">
					<div class="form-group text-center"><label for="username"><br></label><img id="image3" src="assets/img/business/myshop/<?php echo $row_ima['image3'];?>" width="200px" alt="owner image" style="margin: 15px;">
						<div class="form-row">
							<div class="col text-center"><input onchange="readURLimag3(this)" type="file" required="" name="image" accept="image/*"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col text-center" style="margin: 10px;"><button class="btn btn-primary btn-sm" value="image3" name="img" type="submit">Update Settings</button></div>
			</div>
		</form>
		
	</div>
	<div class="card-body">
		<form method="POST" action="operation/biz_images.php" enctype="multipart/form-data">
			<div class="form-row">
				<div class="col">
					<div class="form-group text-center"><label for="username"><br></label><img id="image4" src="assets/img/business/myshop/<?php echo $row_ima['image4'];?>" width="200px" alt="owner image" style="margin: 15px;">
						<div class="form-row">
							<div class="col text-center"><input onchange="readURLimag4(this)" type="file" required="" name="image" accept="image/*"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col text-center" style="margin: 10px;"><button class="btn btn-primary btn-sm" value="image4" name="img" type="submit">Update Settings</button></div>
			</div>
		</form>
		
	</div>
	<div class="card-body">
		<form method="POST" action="operation/biz_images.php" enctype="multipart/form-data">
			<div class="form-row">
				<div class="col">
					<div class="form-group text-center"><label for="username"><br></label><img id="image5" src="assets/img/business/myshop/<?php echo $row_ima['image5'];?>" width="200px" alt="owner image" style="margin: 15px;">
						<div class="form-row">
							<div class="col text-center"><input onchange="readURLimag5(this)" type="file" required="" name="image" accept="image/*"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col text-center" style="margin: 10px;"><button class="btn btn-primary btn-sm" value="image5" name="img" type="submit">Update Settings</button></div>
			</div>
		</form>
		
	</div>
</div><script>
	function readURLimag1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image1')
                        .attr('src', e.target.result)
                        
                        
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	function readURLimag2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image2')
                        .attr('src', e.target.result)
                        
                        
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	function readURLimag3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image3')
                        .attr('src', e.target.result)
                        
                        
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	function readURLimag4(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image4')
                        .attr('src', e.target.result)
                        
                        
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	function readURLimag5(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image5')
                        .attr('src', e.target.result)
                        
                        
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	</script>
	<?php } ?>