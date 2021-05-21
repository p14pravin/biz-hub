<?php
   $query_contact = mysqli_query($conn,"SELECT * from reg where id = '$user_id'");
   $row_contact = mysqli_fetch_array($query_contact);

?>
<div class="card shadow mb-3">
	<div class="card-header py-3">
		<p class="text-primary m-0 font-weight-bold">संपर्क स्थापन</p>
	</div>
	<div class="card-body">
		<form>
			<div class="form-row">
				<div class="col">
					<div class="form-group"><label for="username"><strong>ई-मेल</strong><br></label><input value="<?php echo $row_contact['mobile'];?>" class="form-control" type="text" placeholder="E-mail" name="mail" required="" disabled=""></div>
					<div class="form-group"><label for="last_name"><strong>दुरध्वनी</strong><br></label><input value="<?php echo $row_contact['email'];?>" class="form-control" type="text" name="mobile" placeholder="Mobile" required="" disabled=""></div>
					<div class="form-row">
						<div class="col text-center" style="margin: 10px;"><button class="btn btn-primary btn-sm" type="submit" disabled="">राखून ठेवा&nbsp; स्थापन</button></div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
	
