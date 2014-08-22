<html>
<head>
	<title><?php echo $title ?> - CakePHP Training</title>
	<?php
	echo $this->Html->css(array('cake.generic.css', 'training.css'));
	?>
</head>
<body>
	<?php
	echo $this->fetch('content');
	?>
</body>
</html>