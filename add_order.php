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
				                    <th><button type="button" name="add" class="btn btn-success add" >Add Another</button></th>
				                </tr>
				                <tr>
				                    <td><select name="service[]" class="form-control service"><option>Select Service</option><option>Shirt</option><option>Pant</option><option>Suit</option></select></td>
				                    <td><input type="text" name="rate[]" class="form-control rate" /></td>
				                    <td><input type="text" name="quantity[]" class="form-control quantity" /></td>
				                    <td><input type="text" name="amount[]" class="form-control amount" /></td>
				                    <td><input type="text" name="fabric[]" class="form-control fabric" /></td>
				                    <td><select name="master[]" class="form-control master"><option>Select master</option><option>Nayem</option><option>Shimul</option><option>Sumon</option></select></td>
				                </tr>
				            </table>
				        </div>
				        
				</div>
		    </form>
		</div>
	</div>
</div>
