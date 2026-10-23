<html>
<head>
</head>

<body>
	<h3>Posted Data:</h3>
	<?php
	/*
	require 'validate.inc'; 
	if (validateName($_POST, 'surname'))
		echo 'Data OK!';
	else
		echo 'Data invalid!';
	*/
	/*
	3. Ketika field nama diisi dan disubmit maka outputnya "Data OK",
	Jika field nama kosong maka kelua output "Data Invalid"
	*/
	require 'validate.inc'; 
	$errors = array();

	validateName($errors, $_POST, 'surname'); 
	if ($errors)
	{
	echo 'Errors:<br/>';

	foreach ($errors as $field => $error)
		echo "$field $error</br>";

	} 
	else
		echo 'Data OK!';

	/*
	6. Ketika field nama diisi dan disubmit maka outputnya "Data OK",
	Jika field nama kosong maka kelua output "Errors: 
	surname required"
	Perbedaan pada output
	*/
	?>
</body>	
</html>