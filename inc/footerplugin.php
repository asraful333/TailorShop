		<script src="assets/vendor/jquery/jquery.min.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/vendor/bootstrap/js/chosen.jquery.min.js"></script>
		<!--<script src="assets/vendor/bootstrap/js/datatables.min.js"></script>-->
		<script src="assets/vendor/bootstrap/js/jquery.dataTables.min.js"></script>
		<script src="assets/vendor/bootstrap/js/dataTables.bootstrap.min.js"></script>

		
		<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
		<script src="assets/vendor/chartist/js/chartist.min.js"></script>
		<script src="assets/scripts/klorofil-common.js"></script>
		
		


	    <!-- Import repeater js  -->
	    <script src="assets/vendor/jquery/repeater.js" type="text/javascript"></script>
	    <!--Repeter js-->
	    <script type="text/javascript">
	    	$(".chosen").chosen();
	    </script>

	<!--	<script type="text/javascript">
		    $(document).ready(function(){
		        $(document).on('click','#add',function(){
		            var html = '';
		            html += '<div class="row"><div class="table-responsive"><table class="table table-striped"><h3>Orders:</h3><tr><th>Service</th><th>Rate</th><th>Quantity</th><th>Amount</th><th>Action</th></tr><tr><td><select name="service[]" class="form-control service2"><option>Select Service</option><option value="shirtShow">Shirt</option><option value="pantShow">Pant</option><option value="suitShow">Suit</option></select></td><td><input type="text" name="rate[]" class="form-control rate" /></td><td><input type="text" name="quantity[]" class="form-control quantity" /></td><td><input type="text" name="amount[]" class="form-control amount" /></td><td><button type="button" name="remove" class="btn btn-success remove" >Remove</button></td></tr></table>'

		            
		            html += '<h3>Mesurement:</h3><hr/><div class="panel panel-default"><div class="panel-body">'
		            var shrt = '';
		            shrt += '<div class="col-md-12"><div class="show shirtShow form-group"><h4><b>Shirt</b></h4><hr/><div class="col-md-4"><div class="form-group required"><label class="control-label">Body</label><input type="text" class="form-control" name="body" /></div><div class="form-group required"><label class="control-label">Shoulder</label><input type="text" class="form-control" name="shoulder" /></div><div class="form-group required"><label class="control-label">Neck</label><input type="text" class="form-control" name="neck" /></div><div class="form-group required"><label class="control-label">Forearm</label><input type="text" class="form-control" name="forearm" /></div></div><div class="col-md-4"><div class="form-group required"><label class="control-label">Belly</label><input type="text" class="form-control" name="belly" /></div><div class="form-group required"><label class="control-label">Body Length</label><input type="text" class="form-control" name="body_length" /></div><div class="form-group required"><label class="control-label">Armhole</label><input type="text" class="form-control" name="armhole" /></div><div class="form-group required"><label class="control-label">Cuff</label><input type="text" class="form-control" name="cuff" /></div></div><div class="col-md-4"><div class="form-group required"><label class="control-label">Hip</label><input type="text" class="form-control" name="hip" /></div><div class="form-group required"><label class="control-label">Sleeves Length</label><input type="text" class="form-control" name="sleeves_length" /></div><div class="form-group required"><label class="control-label">Arm</label><input type="text" class="form-control" name="arm" /></div><div class="form-group"><label class="control-label">Description</label><textarea class="form-control" rows="4" id="address" name="description" placeholder="If any Description needed!"></textarea></div></div></div>'
		           var pnt = '';
		           pnt += '<div class="show pantShow form-group"><h4><b>Pant</b></h4><hr/><div class="col-md-4"><div class="form-group required"><label class="control-label">Length</label><input type="text" class="form-control" name="length" /></div><div class="form-group required"><label class="control-label">Thigh</label><input type="text" class="form-control" name="thigh" /></div><div class="form-group required"><label class="control-label">Fly</label><input type="text" class="form-control" name="fly" /></div></div><div class="col-md-4"><div class="form-group required"><label class="control-label">Waist</label><input type="text" class="form-control" name="waist" /></div><div class="form-group required"><label class="control-label">High</label><input type="text" class="form-control" name="high" /></div><div class="form-group required"><label class="control-label">Bottom</label><input type="text" class="form-control" name="bottom" /></div></div><div class="col-md-4"><div class="form-group required"><label class="control-label">Hip</label><input type="text" class="form-control" name="p_hip" /></div><div class="form-group required"><label class="control-label">Zipper</label><input type="text" class="form-control" name="zipper" /></div><div class="form-group required"><label class="control-label">Description</label><textarea class="form-control" rows="4" id="address" name="p_description" placeholder="If any Description needed!"></textarea></div></div></div>'
		           var sut = '';
		           sut += '<div class="show suitShow form-group"><h4><b>Suit</b></h4><hr/><div class="col-md-4"><div class="form-group required"><label class="control-label">Name</label><input type="text" class="form-control" name="" /></div></div><div class="col-md-4"><div class="form-group required"><label class="control-label">Name</label><input type="text" class="form-control" name="" /></div></div><div class="col-md-4"><div class="form-group required"><label class="control-label">Name</label><input type="text" class="form-control" name="" /></div></div></div></div></div></div></div></div>';
		           

		            $('#item_table').append(html);
		            $('#shirt').append(shrt);
		            $('#pant').append(pnt);
		            $('#suit').append(sut);
		        });
		        $(document).on('click','.remove',function(){
		            $(this).closest('div').remove();
		        });
		    });
		</script>-->

		<!--End Repeter-->
	    <!--Filter-->
<!--		<script>
			$(document).ready(function(){
			  $("#myInput").on("keyup", function() {
			    var value = $(this).val().toLowerCase();
			    $("#myTable tr").filter(function() {
			      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			    });
			  });
			});
		</script>-->
		<!--Hidden Form Appear-->
		<script>
		    $(".service").change(function () {
		        // hide all optional elements
		        $('.optional').css('display', 'none');

		        $("select option:selected").each(function () {
		            if ($(this).val() == "shirt") {
		                $('.shirt').css('display', 'block');
		            } else if ($(this).val() == "pant") {
		                $('.pant').css('display', 'block');
		            } else if ($(this).val() == "suit") {
		            	$('.suit').css('display', 'block');
		            }
		        });
		    });
		</script>
		<!--End Hidden Form Appear-->

		<!--Data Table Start-->
		<script type="text/javascript">
			$(document).ready(function() {
    		$('#example').DataTable();
			} );
		</script>
		<!--<script type="text/javascript">
			$(document).ready( function () {
    		$('#table_id').DataTable();
			} );
		</script>-->

		<!--Customer insert using data modal-->
		<script>  
			$(document).ready(function(){
			 $('#insert_form').on("submit", function(event){  
			  event.preventDefault();  
			  if($('#name').val() == "")  
			  {  
			   alert("Name is required");  
			  }  
			  else if ($('#age').val() == '') {
			  	alert("Age is required");
			  }
			  else if($('#phone').val() == '')
			  {  
			   alert("Phone is required");  
			  }
			  else if($('#address').val() == '')  
			  {  
			   alert("Address is required");  
			  }  
			   
			  else  
			  {  
			   $.ajax({  
			    url:"insertCustomer.php",  
			    method:"POST",  
			    data:$('#insert_form').serialize(),  
			    beforeSend:function(){  
			     $('#insert').val("Inserting");  
			    },  
			    success:function(data){  
			     $('#insert_form')[0].reset();  
			     $('#add_data_Modal').modal('hide'); 
			    }  
			   });  
			  }  
			 }); 
			 </script>



	</body>
</html>