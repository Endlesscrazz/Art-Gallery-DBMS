<?php

		
		$success  = mail("bobbypt05@gmail.com","Test","Sending Email via xampp");
		if (!$success) {
 		  print_r(error_get_last());
 		  echo '$error';
		}
		
?>