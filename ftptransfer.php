<?php

/***********
Snippet: Server to Server file transfer using FTP
Author: Adeniji Idris
Github: https://github.com/realprinceviper
Socials: @realprinceviper
Date: 19 Feb 2019
************/

/*the following 2 lines are not mandatory but we keep it to 
avoid risk of exceeding default execution time and memory*/
ini_set('max_execution_time', 0);
ini_set('memory_limit', '2048M');

	if(isset($_POST['submit'])) {
		$server = $_POST['server'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$filename = $_POST['filename'];
		
		$connection = ftp_connect($server);
		$login = ftp_login($connection, $username, $password);
		
		//open ftp in passive mode
		ftp_pasv($connection, true);
		
		$local = $filename;
		$server = $filename;
		
		// download file from remote server
		ftp_get($connection, $local, $server, FTP_BINARY);
		echo "<script>alert('File Transferred Successfully')</script>";
		ftp_close($connection);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Remote FTP file Transfer</title>
</head>
<body>
	<div class="container">
		<h1 class="page-header text-center">Remote File Transfer Script</h1>
		<div class="col-md-6 col-md-offset-3">
			<form method = "POST" action = "ftptransfer.php">
					<div class="form-group">
						<label for="server" class="control-label">FTP Server: </label>
						<input type = "text" name = "server" placeholder = "Server IP or URL" class = "form-control">
					</div>
					<div class="form-group">
						<label for="username" class="control-label">FTP Username: </label>
						<input type = "text" name = "username" placeholder = "FTP Username" class = "form-control">
					</div>
					<div class="form-group">
						<label for="password" class="control-label">FTP Password: </label>
						<input type = "password" name = "password" placeholder = "FTP Password" class = "form-control">
					</div>
					<div class="form-group">
						<label for="filename" class="control-label">File Name: </label>
						<input type = "text" name = "filename" placeholder = "e.g websitefiles.zip" class = "form-control">
					</div>
					<div class="form-group">
						<input type = "submit" name = "submit" value = "Transfer File" class = "btn btn-success">
					</div>
			</form>
		</div>
	</div>
</body>
</html>