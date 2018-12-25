<?php 
	include 'inc/connect.php';
	$pant_id = $_GET['pant_id'];

	$sql = "SELECT * FROM pant_tb p INNER JOIN order_tb o ON p.order_id = o.order_id WHERE pant_id='$pant_id'";
	$qry = mysqli_query($conn,$sql);
	while ($res=mysqli_fetch_array($qry)) {

 ?>
<!-- TABLE STRIPED -->
<div class="panel panel-default">
	<div class="panel-heading">
		
		<h3>Serial No: <?php echo $res['serial']; ?>
		<?php 
			if (isset($_SESSION["ADMIN"]) && $_SESSION["ADMIN"]=="IS_ACTIVE") {
				echo '';
			}
			elseif (isset($_SESSION["SYSTEMUSER"]) && $_SESSION["SYSTEMUSER"]=="IS_ACTIVE") {
				echo '';
			}
			else
				echo '<span class="pull-right"><a class="btn btn-success" href="master.php?page=orderassign_list">Back</a></span>';
			
		?>
		</h3>
	</div>
	<div class="panel-body">
		<h3 style="text-align: center;">Pant Measurement</h3>
			<table class="table table-hover" style="margin: 0 auto; width: 500px;">
				<tr>
					<th><label>Length</label></th>
					<td><?php echo $res['length']; ?>"</td>
				</tr>
				<tr>
					<th><label>Waist</label></th>
					<td><?php echo $res['waist']; ?>"</td>
				</tr>
				<tr>
					<th><label>Hip</label></th>
					<td><?php echo $res['hip']; ?>"</td>
				</tr>
				<tr>
					<th><label>Thigh</label></th>
					<td><?php echo $res['thigh']; ?>"</td>
				</tr>
				<tr>
					<th><label>High</label></th>
					<td><?php echo $res['high']; ?>"</td>
				</tr>
				<tr>
					<th><label>Zipper</label></th>
					<td><?php echo $res['zipper']; ?>"</td>
				</tr>
				<tr>
					<th><label>Fly</label></th>
					<td><?php echo $res['fly']; ?>"</td>
				</tr>
				<tr>
					<th><label>Bottom</label></th>
					<td><?php echo $res['bottom']; ?>"</td>
				</tr>
				<tr>
					<th><label>Description</label></th>
					<td><?php echo $res['description']; ?></td>
				</tr>
			</table>
		
	</div>
</div>
<?php } ?>
<!-- END TABLE STRIPED -->