<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
		foreach ($products as $product)
		{
		?>
			<div class="">
				<h3><?php echo $product->name ?></h3>
			</div>
		<?php
		}
		?>
	</body>
</html>
