<<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<?php
include("includes/connect.php");

$select_query = "SELECT 'images_path' FROM  'images_tbl' ORDER by 'images_id' DESC";

$sql = mysql_query($select_query) or die(mysql_error());

while($row = mysql_fetch_array($sql,MYSQL_BOTH)){

<table style="border-collapse: collapse; font: 12px Tahoma;" border="1" cellspacing="5" cellpadding="5">
<tbody><tr>
<td>
<img src="<?php echo $row[" images_path"];="" ?="">" alt="" />">
}
</td>
</tr>
</tbody></table>


</body>
</html>

