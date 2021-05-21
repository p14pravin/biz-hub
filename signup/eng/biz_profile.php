<?php

		$query = mysqli_query($conn,"SELECT biz_image from business where user_id = '$user_id'");
		if($row=mysqli_fetch_array($query)){
	
?>
<div class="card-header py-3">
	<h6 class="text-primary font-weight-bold m-0">Business Profile Image</h6>
</div>

	<form method="POST" action="operation/biz_profile.php" enctype="multipart/form-data">
		<div class="card-body text-center shadow">
			<img class="img-thumbnail mb-3 mt-4" id="blah" src="assets/img/business/profile/<?php echo $row['biz_image'];?>" >
			<div class="col text-center">
				<input type="file" onchange="readURL(this)" accept="image/*" required="" name="biz_image">
			</div>
			<button class="btn btn-primary btn-sm" type="submit" style="margin-top: 20px;">Save&nbsp;Settings</button>
		</div>
	</form>


<script>
	function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        
                        
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	</script>

	<?php
		}
	?>