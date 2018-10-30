<!DOCTYPE html> 
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Repeater</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

</head>

<body>
    <form method="" id="insert_form">
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
    </form>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click','.add',function(){
            var html = '';
            html += '<tr>';
            html += '<td><select name="service[]" class="form-control service"><option>Select Service</option><option>Shirt</option><option>Pant</option><option>Suit</option></select></td>';
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
</script>