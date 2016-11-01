<?php
	
	session_start();
	unset($_SESSION['Lost_Found']);
	header("location: ../templates/");
	
?>