<!-- TABLE STRIPED -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Customers List</h3>
	</div>
	<div class="panel-body">
		<input class="form-control pull-right" id="myInput" type="text" placeholder="Search.." style="width: 50%;">
		<br><br>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Order Id</th>
					<th>Customer Name</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<tr>
					<td>1</td>
					<td>1111</td>
					<td>Asraful Karim Nayem</td>				
					<td><span class="label label-success">Delivered</span></td>
					<td><a href="#">Edit</a> | <a href="#">View</a> | <a href="#">Print</a></td>
				</tr>
				<tr>
					<td>2</td>
					<td>1112</td>
					<td>Sumon Hossain</td>					
					<td><span class="label label-info">Ready</span></td>
					<td><a href="#">Edit</a> | <a href="#">View</a> | <a href="#">Print</a></td>
				</tr>
				<tr>
					<td>3</td>
					<td>1113</td>
					<td>Kamran Hasan</td>					
					<td><span class="label label-default">On Process</span></td>
					<td><a class="btn btn-primary" href="#">Edit</a> | <a class="btn btn-info" href="#">View</a> | <a class="btn btn-success" href="#">Print</a></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<!-- END TABLE STRIPED -->
