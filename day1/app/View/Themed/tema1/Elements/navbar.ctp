<?php
$main = '';
$prodis = '';
$students = '';
$mainurl = $this->Html->url(array('controller'=>'main', 'action'=>'hello'));
$prodisurl = $this->Html->url(array('controller'=>'prodis', 'action'=>'index'));
$studentsurl = $this->Html->url(array('controller'=>'students', 'action'=>'index'));
if ($menu === 'main') {
	$main = 'class="active"';
	$mainurl = '#';
} elseif ($menu === 'prodis') {
	$prodis = 'class="active"';
	$prodisurl = '#';
} elseif ($menu === 'students') {
	$students = 'class="active"';
	$studentsurl = '#';
}
?>
		<div class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse"
							data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div>
					<a href="#" class="navbar-brand">Training Day</a>
					</div>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li <?= $main; ?>><a href="<?= $mainurl; ?>">Home</a></li>
						<li <?= $prodis; ?>><a href="<?= $prodisurl; ?>">Prodi</a></li>
						<li <?= $students; ?>><a href="<?= $studentsurl; ?>">Student</a></li>
					</ul>
				</div>
			</div>
		</div>