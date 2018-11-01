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

				        <div class="table-responsive">
				            <table class="table table-bordered" id="item_table">
				                <tr>
				                    <th>Service</th>
				                    <th>Rate</th>
				                    <th>Quantity</th>
				                    <th>Amount</th>
				                    <th>Fabric</th>
				                    <th>Master</th>
				                    <th>Action</th>
				                </tr>
				                <tr>
				                    <td><select name="service[]" class="form-control service">
				                    	<option>Select Service</option>
				                    	<option value="shirt">Shirt</option>
				                    	<option value="pant">Pant</option>
				                    	<option value="suit">Suit</option>
				                    </select></td>
				                    <td><input type="text" name="rate[]" class="form-control rate" /></td>
				                    <td><input type="text" name="quantity[]" class="form-control quantity" /></td>
				                    <td><input type="text" name="amount[]" class="form-control amount" /></td>
				                    <td><input type="text" name="fabric[]" class="form-control fabric" /></td>
				                    <td><select name="master[]" class="form-control master"><option>Select master</option><option>Nayem</option><option>Shimul</option><option>Sumon</option></select></td>
				                    <td><button type="button" name="add" class="btn btn-success" >Add</button></td>
				                </tr>
				            </table>

				            <div class="col-md-4">
					            <div class="optional shirt form-group" style="display: none;">
					            	<h1>Measurement</h1>
					            	<label class="form-control">Body</label>
					            	<input type="text" class="form-control" name="body" />
					            </div>					            				            	



					            <div class="optional pant form-group" style="display: none;">
					            	<h1>Measurement</h1>
					            	<label class="form-control">Length</label>
					            	<input type="text" class="form-control" name="length" />
					            </div>


					            <div class="optional suit form-group" style="display: none;">
					            	<h1>Measurement</h1>
					            	<label class="form-control">chist</label>
					            	<input type="text" class="form-control" name="chist" />
					            </div>

				            </div>
				        </div>
				        <div class="table-responsive">
					            <table class="table table-bordered">
					            	<h3>Sub-Orders</h3>
					            	<tr>
						            	<th>Order Id</th>
						            	<th>Customer Name</th>
						            	<th>Service</th>
						            	<th>Quantity</th>
						            	<th>Master</th>
					            	</tr>
					            	<tr>
					            		<td>1</td>
					            		<td>Nayem</td>
					            		<td>Shirt</td>
					            		<td>2</td>
					            		<td>Shimul</td>
					            	</tr>
					            </table>
				            </div>
				            
						    <div class="col-md-4">
							    <div class="input-group">
							      <span class="input-group-addon">Total Amount</span>
							      <input id="msg" type="text" class="form-control" name="msg" placeholder="Total">
							    </div>
						    </div>
						    <div class="col-md-4">
							    <div class="input-group">
							      <span class="input-group-addon">Discount</span>
							      <input id="msg" type="text" class="form-control" name="msg" placeholder="Discount">
							    </div>
						    </div>
						    <div class="col-md-4">
							    <div class="input-group">
							      <span class="input-group-addon">Due</span>
							      <input id="msg" type="text" class="form-control" name="msg" placeholder="Due">
							    </div>
						    </div>
						   			
							<center><a type="button" class="btn btn-success" href="" style="margin-top: 20px;">Submit Order</a></center>
				</div>
		    </form>
		</div>
	</div>
</div>
