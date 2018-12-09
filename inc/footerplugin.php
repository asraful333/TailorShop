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

	    <script type="text/javascript">
	    	$(function() {
	    		//var rate = $('#rate');
	    		$('.service').change(function() {
	    			if($(this).val()==='shirt'){
	    				$('#rate').val('450');
	    			} else if ($(this).val()==='pant') {
	    				$('#rate').val('500');
	    			} else if($(this).val()==='suit'){
	    				$('#rate').val('1000');
	    			}
	    		});
	    		$('input').keyup(function() {
	    			var a = $('#rate').val();
	    			var b = $('#quantity').val();
	    			var c = a * b;
	    			$('#amount').attr('value',c);
	    			$('#amountS').attr('value',c);
	    			$('#amountP').attr('value',c);

	    			// var subTotal = 0;
	    			// $('#msg').attr('value', subTotal+c);

	    		});
	    		$('input').keyup(function() {
	    			var a = $('#total_amount').val();
	    			var b = $('#discount').val();
	    			var c = a - b;
	    			$('#total').attr('value',c);

	    		});
	    		$('input').keyup(function() {
	    			var a = $('#total').val();
	    			var b = $('#advance').val();
	    			var c = a - b;
	    			$('#payable').attr('value',c);

	    		});
	    		$('input').keyup(function() {
	    			var a = $('#payable').val();
	    			var b = 'paid';
	    			var c = 'non paid'
	    			if (a == 0) {
	    				$('#paystatus').attr('value',b);
	    			}else{
	    				$('#paystatus').attr('value',c);
	    			}
	    			

	    		});
	    	});
	    </script>

		<!--Hidden Form Appear-->
		<script>
		    $(".service").change(function () {
		        // hide all optional elements
		        $('.optional').css('display', 'none');

		        $("select option:selected").each(function () {
		            if ($(this).val() == "shirt") {
		            	document.getElementById('shirt').type = 'text';
		            	document.getElementById('pant').type = 'hidden';
		            	document.getElementById('suit').type = 'hidden';
		            	document.getElementById('rate').type = 'hidden';
		                $('.shirt').css('display', 'block');
		            } else if ($(this).val() == "pant") {
		            	document.getElementById('shirt').type = 'hidden';
		            	document.getElementById('pant').type = 'pant';
		            	document.getElementById('suit').type = 'hidden';
		            	document.getElementById('rate').type = 'hidden';
		                $('.pant').css('display', 'block');
		            } else if ($(this).val() == "suit") {
		            	document.getElementById('shirt').type = 'hidden';
		            	document.getElementById('pant').type = 'hidden';
		            	document.getElementById('suit').type = 'text';
		            	document.getElementById('rate').type = 'hidden';
		            	$('.suit').css('display', 'block');
		            }
		            else{
		            	document.getElementById('shirt').type = 'hidden';
		            	document.getElementById('pant').type = 'hidden';
		            	document.getElementById('suit').type = 'hidden';
		            	document.getElementById('rate').type = 'text';
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