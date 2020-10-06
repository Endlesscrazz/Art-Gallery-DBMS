<?php include("includes/head.php"); ?>
<!DOCTYPE HTML>
<HTML>
<title> guidelines</title>
<body>
<br><br><br><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
$file = fopen("guidelines.txt","r");
while(! feof($file))
  {
  echo fgets($file);
  }
  fclose($file);
  ?>
 </body>
</HTML>
<?php include("includes/footer.php"); ?>