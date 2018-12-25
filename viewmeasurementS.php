<?php 
	include 'inc/connect.php';
	$shirt_id = $_GET['shirt_id'];

	$sql = "SELECT * FROM shirt_tb s INNER JOIN order_tb o ON s.order_id = o.order_id WHERE shirt_id='$shirt_id'";
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
		<h3 style="text-align: center;">Shirt Measurement</h3>
			<table class="table table-hover" style="margin: 0 auto; width: 500px;">
				<tr>
					<th><label>Body</label></th>
					<td><?php echo $res['body']; ?>"</td>
				</tr>
				<tr>
					<th><label>Shoulder</label></th>
					<td><?php echo $res['shoulder']; ?>"</td>
				</tr>
				<tr>
					<th><label>Neck</label></th>
					<td><?php echo $res['neck']; ?>"</td>
				</tr>
				<tr>
					<th><label>Forearm</label></th>
					<td><?php echo $res['forearm']; ?>"</td>
				</tr>
				<tr>
					<th><label>Belly</label></th>
					<td><?php echo $res['belly']; ?>"</td>
				</tr>
				<tr>
					<th><label>Body Length</label></th>
					<td><?php echo $res['body_length']; ?>"</td>
				</tr>
				<tr>
					<th><label>Armhole</label></th>
					<td><?php echo $res['armhole']; ?>"</td>
				</tr>
				<tr>
					<th><label>Cuff</label></th>
					<td><?php echo $res['cuff']; ?>"</td>
				</tr>
				<tr>
					<th><label>Hip</label></th>
					<td><?php echo $res['hip']; ?>"</td>
				</tr>
				<tr>
					<th><label>Sleeves Length</label></th>
					<td><?php echo $res['sleeves_length']; ?>"</td>
				</tr>
				<tr>
					<th><label>Arm</label></th>
					<td><?php echo $res['arm']; ?>"</td>
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