<? 
require_once 'inc/global.inc.php';
$from_date =  $_POST['from_date'] ??  '';
$to_date =    $_POST['to_date'] ??  '';	
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Posts</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"
type="text/javascript"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css"
rel="Stylesheet"type="text/css"/>
<script type="text/javascript">
$(function () {
    $("#txtFrom").datepicker({
        numberOfMonths: 1,
		dateFormat: 'M dd, yy',
        onSelect: function (selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() + 1);
            $("#txtTo").datepicker("option", "minDate", dt);
        }
    });
    $("#txtTo").datepicker({
        numberOfMonths: 1,
		dateFormat: 'M dd, yy',
        onSelect: function (selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() - 1);
            $("#txtFrom").datepicker("option", "maxDate", dt);
        }
    });
});
</script>
</head>
<body>
<div class="box">
	<div align="right">
		<form method="post">
			From:<input type="text" id="txtFrom" name="from_date" value="<?=$from_date?>" />&nbsp;&nbsp;&nbsp;
			To:<input type="text" id="txtTo" name="to_date" value="<?=$to_date?>" />&nbsp;&nbsp;&nbsp;
			<input type="submit" value="Filter">
		</form>
	</div><br>