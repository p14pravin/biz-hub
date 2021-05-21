<?php
include('../database/db.php');
include('../session.php');
if(!empty($_POST["catid"])) 
{
 $id=($_POST['catid']);
 if(!is_numeric($id)){
 
 	echo htmlentities("invalid industryid");exit;
 }
 else{
 $stmt = mysqli_query($conn,"SELECT * FROM districts WHERE state_id ='$id'");
 
 while($row=mysqli_fetch_array($stmt))
 {
  ?>
  <option value="<?php echo htmlentities($row['dist_id']); ?>"><?php echo htmlentities($row[$language]); ?></option>
  <?php
 }
}

}
?>