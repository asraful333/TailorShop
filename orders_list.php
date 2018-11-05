<!-- TABLE STRIPED -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Orders List</h3>
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
					<th>Due</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<tr>
					<td>1</td>
					<td>1111</td>
					<td>Asraful Karim Nayem</td>
					<td>0</td>			
					<td><span class="label label-success">Delivered</span></td>
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
					<td>2</td>
					<td>1112</td>
					<td>Sumon Hossain</td>
					<td>500</td>				
					<td><span class="label label-info">Ready</span></td>
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
					<td>3</td>
					<td>1113</td>
					<td>Kamran Hasan</td>
					<td>650</td>				
					<td><span class="label label-default">On Process</span></td>
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
			</tbody>
		</table>
	</div>
</div>
<!-- END TABLE STRIPED -->
