<?php 
	include 'inc/connect.php';
	if (isset($_POST['submit'])) {
		$pant_id 		= mysqli_real_escape_string($conn,$_POST['pant_id']);
		$length 		= mysqli_real_escape_string($conn,$_POST['length']);
		$thigh 			= mysqli_real_escape_string($conn,$_POST['thigh']);
		$fly 			= mysqli_real_escape_string($conn,$_POST['fly']);
		$waist 			= mysqli_real_escape_string($conn,$_POST['waist']);
		$high 			= mysqli_real_escape_string($conn,$_POST['high']);
		$bottom 		= mysqli_real_escape_string($conn,$_POST['bottom']);
		$hip 			= mysqli_real_escape_string($conn,$_POST['hip']);
		$zipper 		= mysqli_real_escape_string($conn,$_POST['zipper']);
		$description 	= mysqli_real_escape_string($conn,$_POST['description']);

		$sql = "UPDATE pant_tb SET length='$length',thigh='$thigh',fly='$fly',waist='$waist',high='$high',bottom='$bottom',hip='$hip',zipper='$zipper',description='$description' WHERE pant_id='$pant_id' ";
		$qry = mysqli_query($conn,$sql);
	}


	$pant_id = $_GET['pant_id'];

	$sql = "SELECT * FROM pant_tb p INNER JOIN order_tb o ON p.order_id = o.order_id WHERE pant_id='$pant_id'";
	$qry = mysqli_query($conn,$sql);
	while ($res=mysqli_fetch_array($qry)) {

 ?>
<!-- TABLEPED -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Serial No: <?php echo $res['serial']; ?></h3>
	</div>
	<div class="panel-body">
		<h3 style="text-align: center;">Edit Pant Measurement</h3>
		<form method="POST" style="width: 400px; margin: 0 auto;">
			<input type="hidden" name="pant_id" value="<?php echo $res['pant_id']; ?>">
			<div class="form-group">
				<label>Length</label>
				<input class="form-control" type="number" name="length" value="<?php echo $res['length']; ?>">
			</div>
			<div class="form-group">
				<label>thigh</label>
				<input class="form-control" type="number" name="thigh" value="<?php echo $res['thigh']; ?>">
			</div>
			<div class="form-group">
				<label>fly</label>
				<input class="form-control" type="number" name="fly" value="<?php echo $res['fly']; ?>">
			</div>
			<div class="form-group">
				<label>waist</label>
				<input class="form-control" type="number" name="waist" value="<?php echo $res['waist']; ?>">
			</div>
			<div class="form-group">
				<label>high</label>
				<input class="form-control" type="number" name="high" value="<?php echo $res['high']; ?>">
			</div>
			<div class="form-group">
				<label>bottom</label>
				<input class="form-control" type="number" name="bottom" value="<?php echo $res['bottom']; ?>">
			</div>
			<div class="form-group">
				<label>hip</label>
				<input class="form-control" type="number" name="hip" value="<?php echo $res['hip']; ?>">
			</div>
			<div class="form-group">
				<label>zipper</label>
				<input class="form-control" type="number" name="zipper" value="<?php echo $res['zipper']; ?>">
			</div>
			<div class="form-group">
				<label>Description</label>
				<input class="form-control" type="text" name="description" value="<?php echo $res['description']; ?>">
			</div>
			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-success">Update</button>
			</div>
		</form>
	</div>
</div>
<?php } ?>
<!-- END TABLEPED -->