<?php
	$servername = "200.18.128.52";
	// 10.90.24.52 escola
	// 200.18.128.52 casa
	$username = "brunoh_adriano";
	$password = "brunoh_adriano";
	$dbname = "brunoh_adriano";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	    die("Falha na conexão: " . $conn->connect_error);
	}
?>
