<?php 
	include 'inc/connect.php';
	if (isset($_POST['submit'])) {
		$shirt_id 		= mysqli_real_escape_string($conn,$_POST['shirt_id']);
		$body 			= mysqli_real_escape_string($conn,$_POST['body']);
		$shoulder 		= mysqli_real_escape_string($conn,$_POST['shoulder']);
		$neck 			= mysqli_real_escape_string($conn,$_POST['neck']);
		$forearm 		= mysqli_real_escape_string($conn,$_POST['forearm']);
		$belly 			= mysqli_real_escape_string($conn,$_POST['belly']);
		$body_length 	= mysqli_real_escape_string($conn,$_POST['body_length']);
		$armhole 		= mysqli_real_escape_string($conn,$_POST['armhole']);
		$cuff 			= mysqli_real_escape_string($conn,$_POST['cuff']);
		$hip 			= mysqli_real_escape_string($conn,$_POST['hip']);
		$sleeves_length = mysqli_real_escape_string($conn,$_POST['sleeves_length']);
		$arm 			= mysqli_real_escape_string($conn,$_POST['arm']);
		$description 	= mysqli_real_escape_string($conn,$_POST['description']);

		$sql = "UPDATE shirt_tb SET body='$body',shoulder='$shoulder',neck='$neck',forearm='$forearm',belly='$belly',body_length='$body_length',armhole='$armhole',cuff='$cuff',hip='$hip',sleeves_length='$sleeves_length',arm='$arm',description='$description' WHERE shirt_id='$shirt_id' ";
		$qry = mysqli_query($conn,$sql);
	}


	$shirt_id = $_GET['shirt_id'];

	$sql = "SELECT * FROM shirt_tb s INNER JOIN order_tb o ON s.order_id = o.order_id WHERE shirt_id='$shirt_id'";
	$qry = mysqli_query($conn,$sql);
	while ($res=mysqli_fetch_array($qry)) {

 ?>
<!-- TABLEPED -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Serial No: <?php echo $res['serial']; ?></h3>
	</div>
	<div class="panel-body">
		<h3 style="text-align: center;">Edit Shirt Measurement</h3>
		<form method="POST" style="width: 400px; margin: 0 auto;">
			<input type="hidden" name="shirt_id" value="<?php echo $res['shirt_id']; ?>">
			<div class="form-group">
				<label>Body</label>
				<input class="form-control" type="number" name="body" value="<?php echo $res['body']; ?>">
			</div>
			<div class="form-group">
				<label>Shoulder</label>
				<input class="form-control" type="number" name="shoulder" value="<?php echo $res['shoulder']; ?>">
			</div>
			<div class="form-group">
				<label>Neck</label>
				<input class="form-control" type="number" name="neck" value="<?php echo $res['neck']; ?>">
			</div>
			<div class="form-group">
				<label>Forearm</label>
				<input class="form-control" type="number" name="forearm" value="<?php echo $res['forearm']; ?>">
			</div>
			<div class="form-group">
				<label>Belly</label>
				<input class="form-control" type="number" name="belly" value="<?php echo $res['belly']; ?>">
			</div>
			<div class="form-group">
				<label>Body Length</label>
				<input class="form-control" type="number" name="body_length" value="<?php echo $res['body_length']; ?>">
			</div>
			<div class="form-group">
				<label>Armhole</label>
				<input class="form-control" type="number" name="armhole" value="<?php echo $res['armhole']; ?>">
			</div>
			<div class="form-group">
				<label>Cuff</label>
				<input class="form-control" type="number" name="cuff" value="<?php echo $res['cuff']; ?>">
			</div>
			<div class="form-group">
				<label>Hip</label>
				<input class="form-control" type="number" name="hip" value="<?php echo $res['hip']; ?>">
			</div>
			<div class="form-group">
				<label>Sleeves Length</label>
				<input class="form-control" type="number" name="sleeves_length" value="<?php echo $res['sleeves_length']; ?>">
			</div>
			<div class="form-group">
				<label>Arm</label>
				<input class="form-control" type="number" name="arm" value="<?php echo $res['arm']; ?>">
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