<?php

		$verify = password_hash("hello",PASSWORD_DEFAULT);
		echo password_verify("hello",$verify);

?>