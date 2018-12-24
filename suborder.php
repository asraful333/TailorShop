<?php 
include 'inc/connect.php';
if (isset($_SESSION["order"]) && isset($_SESSION["serial"]) && isset($_SESSION["customerid"]) && $_SESSION["order"]=='yes') {
	$open = $_SESSION["order"];
	$serial =  $_SESSION["serial"];
	$customerid = $_SESSION["customerid"];
	$q = "SELECT * FROM order_tb WHERE serial='$serial'";
			$query = mysqli_query($conn,$q);
			while ($res= mysqli_fetch_array($query)) {
				$oid= $res['order_id'];
			}
}
// Shirt insert code
if (isset($_POST['shirtS'])) {
		
		$quantity 		= mysqli_real_escape_string($conn,$_POST['quantity']);
		$amount 		= mysqli_real_escape_string($conn,$_POST['amount']);
		$master 		= mysqli_real_escape_string($conn,$_POST['master']);
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

		if ($master!=null) {

		$sql = "INSERT INTO shirt_tb (order_id, quantity, amount, master_id, body, shoulder, neck, forearm, belly, body_length, armhole, cuff, hip, sleeves_length, arm, description) VALUES ('$oid', '$quantity', '$amount', '$master', '$body', '$shoulder', '$neck', '$forearm', '$belly', '$body_length', '$armhole', '$cuff', '$hip', '$sleeves_length', '$arm', '$description')";
		$qry = mysqli_query($conn,$sql);
		if (isset($_SESSION["ADMIN"]) && $_SESSION["ADMIN"]=="IS_ACTIVE") {
				header('location:admin.php?page=suborder');
			}
			else
				header('location:systemUser.php?page=suborder');
		
		}else{
			$mg = "Select Master";

		}
	}
// End shirt insert code

// Pant insert code
if (isset($_POST['pantS'])) {
		$quantity 		= mysqli_real_escape_string($conn,$_POST['quantity']);
		$amount 		= mysqli_real_escape_string($conn,$_POST['amount']);
		$master 		= mysqli_real_escape_string($conn,$_POST['master']);
		$length 		= mysqli_real_escape_string($conn,$_POST['length']);
		$thigh 			= mysqli_real_escape_string($conn,$_POST['thigh']);
		$fly 			= mysqli_real_escape_string($conn,$_POST['fly']);
		$waist 			= mysqli_real_escape_string($conn,$_POST['waist']);
		$high 			= mysqli_real_escape_string($conn,$_POST['high']);
		$bottom 		= mysqli_real_escape_string($conn,$_POST['bottom']);
		$hip 			= mysqli_real_escape_string($conn,$_POST['hip']);
		$zipper 		= mysqli_real_escape_string($conn,$_POST['zipper']);
		$description 	= mysqli_real_escape_string($conn,$_POST['description']);

		if ($master!=null) {

		$sql = "INSERT INTO pant_tb (order_id, quantity, amount, master_id, length, thigh, fly, waist, high, bottom, hip, zipper, description) VALUES ('$oid', '$quantity', '$amount', '$master', '$length', '$thigh', '$fly', '$waist', '$high', '$bottom', '$hip', '$zipper', '$description')";
		$qry = mysqli_query($conn,$sql);
		
			if (isset($_SESSION["ADMIN"]) && $_SESSION["ADMIN"]=="IS_ACTIVE") {
				header('location:admin.php?page=suborder');
			}
			else
				header('location:systemUser.php?page=suborder');

		}else{
			$mg = "Select Master";

		}
	}
// End pant code


 ?>


<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Add Order<a class="btn btn-success hidden-print pull-right" href="deleteO.php">Cancel</a></h3>

				<?php 

				$q = "SELECT * FROM customer_tb WHERE customer_id='$customerid'"; 
				$query = mysqli_query($conn,$q);
					while ($res= mysqli_fetch_array($query)) {
						$name= $res['customer_name'];
				?>
				<label> Customer Name: <?php echo $name; ?> </label>
				<?php
					} 
				?> 
			
			<label class="pull-right">Srial: <?php echo $serial ?></label>
		</div>
		<div class="panel-body">
			<div class="container-fluid">
				<div class="">
				<div class="row">
						<form method="POST">
				                <div class="col-sm-3">
				                    <div class="form-group">
				                    	<label>Service</label>
				                    	<select name="servicetype" id="chosen" class="form-control service">
					                    	<option disabled="" selected="">Select Service</option>
					                    	<option value="shirt" >Shirt</option>
					                    	<option value="pant" >Pant</option>
					                    	<!--<option value="suit" >Suit</option>-->
				                    	</select>
				                    </div>
				                </div>
				                <div class="col-sm-2">
				                    <div class="form-group">
				                    	<label>Rate</label>
				                    	<input id="rate" type="text" name="rate" class="form-control rate" value="" required="" />
				                    	<?php 
											include 'inc/connect.php';
											$q = "SELECT * FROM rate_tb";
											$query = mysqli_query($conn,$q);

											while ($res= mysqli_fetch_array($query)) {
										?>
									<input id="<?php echo $res['itemName']; ?>" type="hidden" name="rate" class="form-control rate" value="<?php echo $res['rate']; ?>"/>

										<?php 
											}
										?>
				                    </div>
				                </div>
				                <div class="col-sm-2">
				                    <div class="form-group">
				                    	<label>Quantity</label> 

				                    	<input id="quantity" type="text" onblur="set(this.value)" name="quantity" class="form-control quantity" required="" />
				                    </div>
				                </div>
				                <div class="col-sm-2">
				                    <div class="form-group">
				                    	<label>Amount</label> 

				                    	<input id="amount" type="text" name="amount" class="form-control amount" required="" />
				                    </div>
				                </div>
				                <div class="col-sm-3">
				                    <div class="form-group">
				                    	<label>Master</label>

				                    	<?php if (isset($mg)): ?>
				                    		<span style="color: red;"><?php echo $mg;?></span>
										  <?php endif ?>

				                    	<select name="master" id="batch" onchange="setM(this.value)" class="chosen form-control master">
				                    		<option disabled="" selected="">Select master</option>

				                    		<?php 
											
											$q = "SELECT * FROM master_tb";
											$query = mysqli_query($conn,$q);

											while ($res= mysqli_fetch_array($query)) {
										?>
									<option value="<?php echo $res['master_id']; ?>"><?php 
									echo $res['master_name'];
									echo " ";
									echo $res['master_type'];
									?></option>

										<?php 
											}
										?>
				                    	</select>
				                    </div>
				                </div>
				            </form>
				    </div>

				    	<div class="row">
				    		<h3>Mesurement:</h3>
				    		<hr/>
				    			<div class="panel panel-default">
									<div class="panel-body">		        	
				        				<div class="col-md-12">
					            			<div class="optional shirt form-group" style="display: none;">
					            				<h4><b>Shirt</b></h4>
					            				<hr/>
					            				<form method="POST">
					            				<div class="col-md-4">
					            					<div class="form-group required">
								            			<input type="hidden" class="form-control" name="quantity" id="sq" required="" />
								            		</div>

								            		<div class="form-group required">
								            			<input type="hidden" class="form-control" name="amount" id="amountS" required="" />
								            		</div>

								            		<div class="form-group required">
								            			<input type="hidden" class="form-control" name="master" id="sm" required="" />
								            		</div>

								            		<div class="form-group required">
								            			<label class="control-label">Body</label>
								            			<input type="text" class="form-control" name="body" required="" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Shoulder</label>
								            			<input type="text" class="form-control" name="shoulder" required="" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Neck</label>
								            			<input type="text" class="form-control" name="neck" required="" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Forearm</label>
								            			<input type="text" class="form-control" name="forearm" required="" />
								            		</div>
								            	</div>
								            	<div class="col-md-4">
								            		<div class="form-group required">
								            			<label class="control-label">Belly</label>
								            			<input type="text" class="form-control" name="belly" required="" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Body Length</label>
								            			<input type="text" class="form-control" name="body_length" required="" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Armhole</label>
								            			<input type="text" class="form-control" name="armhole" required="" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Cuff</label>
								            			<input type="text" class="form-control" name="cuff" required="" />
								            		</div>
								            	</div>
								            	<div class="col-md-4">
								            		<div class="form-group required">
								            			<label class="control-label">Hip</label>
								            			<input type="text" class="form-control" name="hip" required="" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Sleeves Length</label>
								            			<input type="text" class="form-control" name="sleeves_length" required="" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Arm</label>
								            			<input type="text" class="form-control" name="arm" required="" />
								            		</div>
								            		<div class="form-group">
								            			<label>Description</label>
								            			<textarea class="form-control" rows="4" id="description" name="description" placeholder="If any Description needed!"></textarea>
								            		</div>
								            	</div>
								            	<input type="submit" name="shirtS" class="btn btn-success b1" value="Add" />
								            </form>
								            </div>

								            <div class="optional pant form-group" style="display: none;">
								            	<h4><b>Pant</b></h4>
								            	<hr/>
								            	<form method="POST">
								            	<div class="col-md-4">
								            		<div class="form-group required">
								            			<input type="hidden" class="form-control" name="quantity" id="pq" required="" />
								            		</div>

								            		<div class="form-group required">
								            			<input type="hidden" class="form-control" name="amount" id="amountP" required="" />
								            		</div>

								            		<div class="form-group required">
								            			<input type="hidden" class="form-control" name="master" id="pm" required="" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Length</label>
								            			<input type="text" class="form-control" name="length" required="" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Thigh</label>
								            			<input type="text" class="form-control" name="thigh" required="" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Fly</label>
								            			<input type="text" class="form-control" name="fly" required="" />
								            		</div>
								            	</div>
								            	<div class="col-md-4">
								            		<div class="form-group required">
								            			<label class="control-label">Waist</label>
								            			<input type="text" class="form-control" name="waist" required="" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">High</label>
								            			<input type="text" class="form-control" name="high" required="" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Bottom</label>
								            			<input type="text" class="form-control" name="bottom" required="" />
								            		</div>
								            	</div>
								            	<div class="col-md-4">
								            		<div class="form-group required">
								            			<label class="control-label">Hip</label>
								            			<input type="text" class="form-control" name="hip" required="" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Zipper</label>
								            			<input type="text" class="form-control" name="zipper" required="" />
								            		</div>
								            		<div class="form-group">
								            			<label>Description</label>
								            			<textarea class="form-control" rows="4" id="description" name="description" placeholder="If any Description needed!"></textarea>
								            		</div>
								            	</div>
								            	<input type="submit" name="pantS" class="btn btn-success b1" value="Add" />
								            	</form>
								            </div>
								        
								            
								            <!--<div class="optional suit form-group" style="display: none;">
								            	<h4><b>Suit</b></h4>
								            	<hr/>
								            	<form method="POST">
								            	<div class="col-md-4">
					            					<div class="form-group required">
								            			<input type="hidden" class="form-control" name="quantity" id="bq" />
								            		</div>
								            		<div class="form-group required">
								            			<input type="hidden" class="form-control" name="master" id="bm" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Name</label>
								            			<input type="text" class="form-control" name="" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Name</label>
								            			<input type="text" class="form-control" name="" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Name</label>
								            			<input type="text" class="form-control" name="" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Name</label>
								            			<input type="text" class="form-control" name="" />
								            		</div>
								            	</div>
								            	<div class="col-md-4">
								            		<div class="form-group required">
								            			<label class="control-label">Name</label>
								            			<input type="text" class="form-control" name="" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Name</label>
								            			<input type="text" class="form-control" name="" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Name</label>
								            			<input type="text" class="form-control" name="" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Name</label>
								            			<input type="text" class="form-control" name="" />
								            		</div>
								            	</div>
								            	<div class="col-md-4">
								            		<div class="form-group required">
								            			<label class="control-label">Name</label>
								            			<input type="text" class="form-control" name="" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Name</label>
								            			<input type="text" class="form-control" name="" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Name</label>
								            			<input type="text" class="form-control" name="" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Name</label>
								            			<input type="text" class="form-control" name="" />
								            		</div>
								            	</div>
								            	<input type="submit" name="suitS" class="btn btn-success b1"/>
								            </form>
								            </div>-->
							            </div>
				        			</div>
				    			</div>
				        </div>
				    </div>

				        <hr/>

				    <div class="row">
				        <div class="t1 table-responsive ">
					        <table class="table table-striped table-bordered">
					            	<h3>Sub-Orders:</h3>
					            	<tr>
						            	<th>Service</th>
						            	<th>Quantity</th>
						            	<th>Master</th>
						            	<th>Action</th>
					            	</tr>
					            	<?php $q = "SELECT * FROM shirt_tb s INNER JOIN master_tb m ON s.master_id = m.master_id WHERE order_id = '$oid'";
					            		$query = mysqli_query($conn,$q);
					            		//$i = 1;
										while ($res= mysqli_fetch_array($query)) {
											

					            	 ?>
					            	<tr>
					            		<td><?php if ($res['master_type'] == 'Shirt') {
					            			echo "Shirt";
					            		}?></td>
					            		<td><?php echo $res['quantity']; ?></td>
					            		<td><?php echo $res['master_name']; ?></td>
					            		<td><a href="deleteS.php?shirt_id=<?php echo $res['shirt_id'] ?> " class="btn btn-info">
          									<span class="glyphicon glyphicon-remove"></span>
        								</a></td>
					            	</tr>
					            		<?php } ?>

					            	<?php $q = "SELECT * FROM pant_tb s INNER JOIN master_tb m ON s.master_id = m.master_id WHERE order_id = '$oid'";
					            		$query = mysqli_query($conn,$q);
					            		// $i = 1;
										while ($res= mysqli_fetch_array($query)) {
					            	 ?>
					            	<tr>
					            		<td><?php if ($res['master_type'] == 'Pant') {
					            			echo "Pant";
					            		}?></td>
					            		<td><?php echo $res['quantity']; ?></td>
					            		<td><?php echo $res['master_name']; ?></td>
					            		<td><a href="deleteP.php?pant_id=<?php echo $res['pant_id'] ?> " class="btn btn-info">
          									<span class="glyphicon glyphicon-remove"></span>
        								</a></td>
					            	</tr>
					            		<?php } ?>

					            	
					            		
					            	
					        </table>
				        </div>
				    </div>

				    <hr/>
				    	<form method="POST" action="invoice.php">
				    	<div class="row">        
						    <div class="col-md-3">
							    <div class="input-group">
							      <span class="input-group-addon" style="background-color: #28ACB8; color: white;">Sub-Total</span>
							      <?php 

							      $val1 = 0;
							      $q = "SELECT *FROM pant_tb WHERE order_id = $oid";
							      $query = mysqli_query($conn,$q);
							      while ($res= mysqli_fetch_array($query)) {
							      	$val1 += $res['amount'];
							      }
							      
							      $val2 = 0;
							      $qr = "SELECT *FROM shirt_tb WHERE order_id = $oid";
							      $querys = mysqli_query($conn,$qr);
							      while ($re= mysqli_fetch_array($querys)) {
							      	$val2 += $re['amount'];
							      }


							       ?>
							      <input id="total_amount" type="text" class="form-control" name="total_amount" placeholder="Total" value="<?php echo $val1+$val2; ?>" />
							    </div>
						    </div>
						    <div class="col-md-3">
							    <div class="input-group">
							      <span class="input-group-addon" style="background-color: #3A80D7; color: white;">Discount</span>
							      <input id="discount" type="text" class="form-control" name="discount" placeholder="Discount" required="">
							    </div>
						    </div>
						    <div class="col-md-3">
							    <div class="input-group">
							      <span class="input-group-addon" style="background-color: #4E54B6; color: white;">Total</span>
							      <input id="total" type="text" class="form-control" name="total" placeholder="Total" required="">
							    </div>
						    </div>
						    <div class="col-md-3">
							    <div class="input-group">
							      <span class="input-group-addon" style="background-color: #703688; color: white;">Advance</span>
							      <input id="advance" type="text" class="form-control" name="advance" placeholder="Advance" required="">
							    </div>
						    </div>
						    <input id="payable" type="hidden" class="form-control" name="payable" >
						</div>

						    <hr/>

						    			    
							<div class="form-group">
								<label>Delivery Date</label>
								<div class='input-group date' id='datetimepicker1'>
									<input type='date' name="deliveryDate" class="form-control" value="<?php date_default_timezone_set('Asia/Dhaka'); echo date('Y-m-d') ?>"/>
								</div>
							</div>
						

						    <!--<div class="row">
						    	<div class="form-group">
								    <h3><label class="control-label col-sm-2" for="pwd">Status:</label></h3>
								    <div class="col-sm-10"> 
								      <label class="radio-inline"><input type="radio" name="status" checked>Confirm</label>
									  <label class="radio-inline"><input type="radio" name="status">Delivered</label>
								    </div>
								  </div>
						    </div>-->

						<div class="row">	
							<center><input type="submit" name="sOrders" class="btn btn-success b1"/></center>
							
						</div>
						</form>
			</div>
		</div>
	</div>
</div>


	<script type="text/javascript">
		function set(x) {
			$("select option:selected").each(function () {
		            if ($(this).val() == "shirt") {
		            	document.getElementById('sq').value = x;
		            } else if ($(this).val() == "pant") {
		            	document.getElementById('pq').value = x;
		                $('.pant').css('display', 'block');
		            } else if ($(this).val() == "suit") {
		            	document.getElementById('bq').value = x;
		            }
		        });
		 } 
		 function setA(x) {
			$("select option:selected").each(function () {
		            if ($(this).val() == "shirt") {
		            	document.getElementById('sa').value = x;
		            } else if ($(this).val() == "pant") {
		            	document.getElementById('pa').value = x;
		                $('.pant').css('display', 'block');
		            } else if ($(this).val() == "suit") {
		            	document.getElementById('ba').value = x;
		            }
		        });
		 }
		 function setM(x) {
			$("select option:selected").each(function () {
		            if ($(this).val() == "shirt") {
		            	document.getElementById('sm').value = x;
		            } else if ($(this).val() == "pant") {
		            	document.getElementById('pm').value = x;
		                $('.pant').css('display', 'block');
		            } else if ($(this).val() == "suit") {
		            	document.getElementById('bm').value = x;
		            }
		        });
		 }
		 
		
	</script>
