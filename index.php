<?php
	require_once("models/files.php");
	include("views/form.html");
	
	if (isset($_POST['btn'])) 
		get_files_list($_POST['path']);
