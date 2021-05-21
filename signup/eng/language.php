<?php $query_language = mysqli_query($conn,"SELECT lang from reg where id = '$user_id'");
	$row_language=mysqli_fetch_array($query_language);
?>

<div class="card-header py-3">
	<h6 class="text-primary font-weight-bold m-0">Language</h6>
</div>
<div class="card-body">
	<h4 class="small font-weight-bold">Current Language<span class="float-right"><?php echo strtoupper($row_language['lang']);?></span></h4>
	<div class="form-group text-center">
		<form method="POST" action="operation/language.php">
			<select class="form-control" name="language" required="">
				<option value="">Change Language</option>
					<?php 
						$query = mysqli_query($conn, "SELECT * from language");
						while($row=mysqli_fetch_assoc($query)){
					?>
						<option value="<?php echo $row['lang_type']?>"><?php echo $row['language'];?></option>";
					<?php	
						}
					?>
			</select>
			<button class="btn btn-primary btn-sm" type="submit" style="margin-top: 20px;">Save&nbsp;Settings</button>
		</form>
	</div>
	<div class="progress progress-sm mb-3">
		<div class="progress-bar bg-success" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="sr-only">100%</span></div>
	</div>
</div>
	