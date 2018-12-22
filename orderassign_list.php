<!-- TABLE STRIPED -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Transaction</h3>
	</div>
	<div class="panel-body">
		<input class="form-control pull-right" id="myInput" type="text" placeholder="Search.." style="width: 50%;">
		<br><br>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Serial No</th>
					<th>Customer Name</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<tr>
					<td>1</td>
					<td>1001</td>
					<td>Asraful Karim</td>
					<td><span class="label label-danger">On Process</span></td>
					<td>
						<div class="dropdown">
						    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
						    <span class="caret"></span></button>
						    <ul class="dropdown-menu">
						      <li><a href="#">Update/Edit</a></li>
						      <li><a href="#">Details</a></li>
						      <li><a href="#">Print</a></li>
						    </ul>
						</div>
					</td>
				</tr>
				<tr>
					<td>1</td>
					<td>1002</td>
					<td>Karim</td>
					<td><span class="label label-success">On Process</span></td>
					<td>
						<div class="dropdown">
						    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
						    <span class="caret"></span></button>
						    <ul class="dropdown-menu">
						      <li><a href="#">Update/Edit</a></li>
						      <li><a href="#">Details</a></li>
						      <li><a href="#">Print</a></li>
						    </ul>
						</div>
					</td>
				</tr>
				<!-- <tr>
					<td>1</td>
					<td>1113</td>
					<td>Asraful</td>
					<td>500</td>
					<td><span class="label label-danger">Payable</span></td>
					<td>
						<div class="dropdown">
						    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
						    <span class="caret"></span></button>
						    <ul class="dropdown-menu">
						      <li><a href="#">Update/Edit</a></li>
						      <li><a href="#">Details</a></li>
						      <li><a href="#">Print</a></li>
						    </ul>
						</div>
					</td>
				</tr> -->
			</tbody>
		</table>
	</div>
</div>
<!-- END TABLE STRIPED -->
