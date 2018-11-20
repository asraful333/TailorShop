<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Add Order</h3>
		</div>
		<div class="panel-body">						
			<form method="" id="insert_form">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Select Customer</label>
								<select class="chosen form-control" id="sel1">
									<option disabled="" selected="">Select</option>
									<?php 
											include 'inc/connect.php';
											$q = "SELECT * FROM customer_tb";
											$query = mysqli_query($conn,$q);

											while ($res= mysqli_fetch_array($query)) {
										?>
									<option value="<?php echo $res['customer_id']; ?>"><?php echo $res['customer_name']; ?></option>

										<?php 
											}
										?>
								</select>
							</div>
						</div>
						<div class="col-md-6">			    
							<div class="form-group">
								<label>Delivery Date</label>
								<div class='input-group date' id='datetimepicker1'>
									<input type='date' class="form-control" value="<?php date_default_timezone_set('Asia/Dhaka'); echo date('Y-m-d') ?>"/>
								</div>
							</div>
						</div>
					</div>

					<hr/>

					<div class="row">
				        <div class="table-responsive">
				            <table class="table table-striped">
				            	<h3>Orders:</h3>
				                <tr>
				                    <th>Service</th>
				                    <th>Rate</th>
				                    <th>Quantity</th>
				                    <th>Amount</th>
				                    <th>Fabric</th>
				                    <th style="width: 20%;">Master</th>
				                    <!--<th>Action</th>-->
				                </tr>
				                <tr>
				                    <td>
				                    	<select name="service[]" class="form-control service">
					                    	<option disabled="" selected="">Select Service</option>
					                    	<option value="shirt">Shirt</option>
					                    	<option value="pant">Pant</option>
					                    	<option value="suit">Suit</option>
				                    	</select>
				                    </td>
				                    <td><input type="text" name="rate[]" class="form-control rate" /></td>
				                    <td><input type="text" name="quantity[]" class="form-control quantity" /></td>
				                    <td><input type="text" name="amount[]" class="form-control amount" /></td>
				                    <td><input type="text" name="fabric[]" class="form-control fabric" /></td>
				                    <td>
				                    	<select name="master[]" class="form-control master">
				                    		<option>Select master</option>
				                    		<option>Nayem <span class="badge bg-danger">(2)</span></option>
				                    		<option>Shimul <span class="badge">(4)</span></option>
				                    		<option>Sumon <span class="badge">(5)</span></option>
				                    	</select>
				                    </td>
				                    <!--<td><button type="button" name="add" class="btn btn-success" >Add</button></td>-->
				                </tr>
				            </table>				            
				        </div>
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
					            				<div class="col-md-4">
								            		<div class="form-group required">
								            			<label class="control-label">Body</label>
								            			<input type="text" class="form-control" name="body" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Shoulder</label>
								            			<input type="text" class="form-control" name="shoulder" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Neck</label>
								            			<input type="text" class="form-control" name="neck" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Forearm</label>
								            			<input type="text" class="form-control" name="forearm" />
								            		</div>
								            	</div>
								            	<div class="col-md-4">
								            		<div class="form-group required">
								            			<label class="control-label">Belly</label>
								            			<input type="text" class="form-control" name="belly" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Body Length</label>
								            			<input type="text" class="form-control" name="body_length" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Armhole</label>
								            			<input type="text" class="form-control" name="armhole" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Cuff</label>
								            			<input type="text" class="form-control" name="cuff" />
								            		</div>
								            	</div>
								            	<div class="col-md-4">
								            		<div class="form-group required">
								            			<label class="control-label">Hip</label>
								            			<input type="text" class="form-control" name="hip" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Sleeves Length</label>
								            			<input type="text" class="form-control" name="sleeves_length" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Arm</label>
								            			<input type="text" class="form-control" name="arm" />
								            		</div>
								            		<div class="form-group">
								            			<label class="control-label">Description</label>
								            			<textarea class="form-control" rows="4" id="address" name="description" placeholder="If any Description needed!"></textarea>
								            		</div>
								            	</div>
								            	<input type="submit" name="shirtS" class="btn btn-success"/>
								            </div>

								            <div class="optional pant form-group" style="display: none;">
								            	<h4><b>Pant</b></h4>
								            	<hr/>
								            	<div class="col-md-4">
								            		<div class="form-group required">
								            			<label class="control-label">Length</label>
								            			<input type="text" class="form-control" name="length" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Thigh</label>
								            			<input type="text" class="form-control" name="thigh" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Fly</label>
								            			<input type="text" class="form-control" name="fly" />
								            		</div>
								            	</div>
								            	<div class="col-md-4">
								            		<div class="form-group required">
								            			<label class="control-label">Waist</label>
								            			<input type="text" class="form-control" name="waist" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">High</label>
								            			<input type="text" class="form-control" name="high" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Bottom</label>
								            			<input type="text" class="form-control" name="bottom" />
								            		</div>
								            	</div>
								            	<div class="col-md-4">
								            		<div class="form-group required">
								            			<label class="control-label">Hip</label>
								            			<input type="text" class="form-control" name="p_hip" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Zipper</label>
								            			<input type="text" class="form-control" name="zipper" />
								            		</div>
								            		<div class="form-group required">
								            			<label class="control-label">Description</label>
								            			<textarea class="form-control" rows="4" id="address" name="p_description" placeholder="If any Description needed!"></textarea>
								            		</div>
								            	</div>
								            	<input type="submit" name="pantS" class="btn btn-success"/>
								            </div>
								            
								            <div class="optional suit form-group" style="display: none;">
								            	<h4><b>Suit</b></h4>
								            	<hr/>
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
								            	<input type="submit" name="suitS" class="btn btn-success"/>
								            </div>
							            </div>
				        </div>
				    </div>
				        </div>

				        <hr/>

				      <!-- <button type="button" id="add" name="add" class="btn btn-success" >Add</button>-->

				    <div class="row">
				        <div class="table-responsive">
					            <table class="table table-striped table-bordered">
					            	<h3>Sub-Orders:</h3>
					            	<tr>
						            	<th>#</th>
						            	<th>Service</th>
						            	<th>Quantity</th>
						            	<th>Master</th>
					            	</tr>
					            	<tr>
					            		<td>1</td>
					            		<td>Shirt</td>
					            		<td>2</td>
					            		<td>Shimul</td>
					            	</tr>
					            </table>
				        </div>
				    </div>

				    <hr/>

				    	<div class="row">        
						    <div class="col-md-3">
							    <div class="input-group">
							      <span class="input-group-addon" style="background-color: #28ACB8; color: white;">Sub-Total</span>
							      <input id="msg" type="text" class="form-control" name="total_amount" placeholder="Total">
							    </div>
						    </div>
						    <div class="col-md-3">
							    <div class="input-group">
							      <span class="input-group-addon" style="background-color: #3A80D7; color: white;">Discount</span>
							      <input id="msg" type="text" class="form-control" name="discount" placeholder="Discount">
							    </div>
						    </div>
						    <div class="col-md-3">
							    <div class="input-group">
							      <span class="input-group-addon" style="background-color: #4E54B6; color: white;">Total</span>
							      <input id="msg" type="text" class="form-control" name="advance" placeholder="Advance">
							    </div>
						    </div>
						    <div class="col-md-3">
							    <div class="input-group">
							      <span class="input-group-addon" style="background-color: #703688; color: white;">Advance</span>
							      <input id="msg" type="text" class="form-control" name="advance" placeholder="Advance">
							    </div>
						    </div>
						</div>

						    <hr/>

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
							<center><a type="button" class="btn btn-success" href="" style="margin-top: 20px;">Submit Order</a></center>
						</div>
				</div>
		    </form>
		</div>
	</div>
</div>
