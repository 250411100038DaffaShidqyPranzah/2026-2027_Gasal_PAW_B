<html>
<head>
</head>

<body>
	<h3>Posted Data:</h3>
	<?php 
	foreach ($_POST as $key => $value) {
		echo "($key) => ($value)<br/>";
	}
	?>
</body>
</html>