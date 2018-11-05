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
								<select class="form-control" id="sel1">
									<option>Nayem</option>
									<option>Sumon</option>
									<option>Shimul</option>
									<option>Dam</option>
									<option>Plabon</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">			    
							<div class="form-group">
								<label>Delivery Date</label>
								<div class='input-group date' id='datetimepicker1'>
									<input type='date' class="form-control" />
								</div>
							</div>
						</div>
					</div>

					<hr/>

					<div class="row">
				        <div class="table-responsive">
				            <table class="table table-striped" id="item_table">
				            	<h3>Orders:</h3>
				                <tr>
				                    <th style="width: 20%;">Service</th>
				                    <th>Rate</th>
				                    <th>Quantity</th>
				                    <th>Amount</th>
				                    <!--<th>Fabric</th>-->
				                    <th style="width: 20%;">Master</th>
				                    <th>Action</th>
				                </tr>
				                <tr>
				                    <td>
				                    	<select name="service[]" class="form-control service">
					                    	<option>Select Service</option>
					                    	<option value="shirt">Shirt</option>
					                    	<option value="pant">Pant</option>
					                    	<option value="suit">Suit</option>
				                    	</select>
				                    </td>
				                    <td><input type="text" name="rate[]" class="form-control rate" /></td>
				                    <td><input type="text" name="quantity[]" class="form-control quantity" /></td>
				                    <td><input type="text" name="amount[]" class="form-control amount" /></td>
				                    <!--<td><input type="text" name="fabric[]" class="form-control fabric" /></td>-->
				                    <td>
				                    	<select name="master[]" class="form-control master">
				                    		<option>Select master</option>
				                    		<option>Nayem <span class="badge bg-danger">(2)</span></option>
				                    		<option>Shimul <span class="badge">(4)</span></option>
				                    		<option>Sumon <span class="badge">(5)</span></option>
				                    	</select>
				                    </td>
				                    <td><button type="button" name="add" class="btn btn-success" >Add</button></td>
				                </tr>
				            </table>				            
				        </div>
				    </div>


				    	<div class="row">
				    		<h3>Mesurement:</h3>
				    		<hr/>
				    		<?php 
				    			include 'inc/measurement.php';
				    		?>
				        </div>

				        <hr/>

				    <div class="row">
				        <div class="table-responsive">
					            <table class="table table-striped">
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

						    <div class="row">
						    	<div class="form-group">
								    <h3><label class="control-label col-sm-2" for="pwd">Status:</label></h3>
								    <div class="col-sm-10"> 
								      <label class="radio-inline"><input type="radio" name="status" checked>Confirm</label>
									  <label class="radio-inline"><input type="radio" name="status">Delivered</label>
								    </div>
								  </div>
						    </div>

						<div class="row">		
							<center><a type="button" class="btn btn-success" href="" style="margin-top: 20px;">Submit Order</a></center>
						</div>
				</div>
		    </form>
		</div>
	</div>
</div>
