		<script src="assets/vendor/jquery/jquery.min.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/vendor/bootstrap/js/jquery.dataTables.min.js"></script>
		<script src="assets/vendor/bootstrap/js/dataTables.bootstrap.min.js"></script>
		
		<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
		<script src="assets/vendor/chartist/js/chartist.min.js"></script>
		<script src="assets/scripts/klorofil-common.js"></script>
		
		


	    <!-- Import repeater js  -->
	    <script src="assets/vendor/jquery/repeater.js" type="text/javascript"></script>
	    <!--Repeter js-->

		<!--<script type="text/javascript">
		    $(document).ready(function(){
		        $(document).on('click','.add',function(){
		            var html = '';
		            html += '<tr>';
		            html += '<td><select name="service[]" class="form-control service"><option>Select Service</option><option value="shirt">Shirt</option><option value="pant">Pant</option><option value="suit">Suit</option></select></td>';
		            html += '<td><input type="text" name="rate[]" class="form-control rate" /></td>';
		            html += '<td><input type="text" name="quantity[]" class="form-control quantity" /></td>';
		            html += '<td><input type="text" name="amount[]" class="form-control amount" /></td>';
		            html += '<td><input type="text" name="fabric[]" class="form-control fabric" /></td>';
		            html += '<td><select name="master[]" class="form-control master"><option>Select master</option><option>Nayem</option><option>Shimul</option><option>Sumon</option></select></td>';
		            html += '<td><button type="button" name="remove" class="btn btn-success remove" >Remove</button></td>';
		            $('#item_table').append(html);
		        });
		        $(document).on('click','.remove',function(){
		            $(this).closest('tr').remove();
		        });
		    });
		</script>-->

		<!--End Repeter-->
	    <!--Filter-->
		<script>
			$(document).ready(function(){
			  $("#myInput").on("keyup", function() {
			    var value = $(this).val().toLowerCase();
			    $("#myTable tr").filter(function() {
			      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			    });
			  });
			});
		</script>
		<!--Hidden Form Appear-->
		<script>
		    $("select").change(function () {
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


	</body>
</html>