<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title><?php
	if (isset($title)){
		echo $title;
	} else {
		echo 'Day 1';
	}?> - CakePHP Training</title>
	<?php
	echo $this->Html->css(array('cake.generic.css', 'bootstrap.min.css', 'training.css'));
	?>
</head>
<body>
	<div id="wrap">
		
		<?php echo $this->element('navbar', 
						array('menu'=> strtolower($this->params['controller'])) ); ?>
		
		<div class="container">
		<?php
		echo $this->Session->flash();
		echo $this->fetch('content');
		?>
		</div>
		
		<?php
		echo $this->element('footer');
		?>
	</div>
	
	<?php
	echo $this->Html->script(array('jquery-2.1.0.min.js', 'bootstrap.min.js'));
	?>
	
	<script type="text/javascript">
	$(document).ready(function(){
	<?php echo $this->element('jsstudent'); ?>
	});
	</script>
</body>
</html>