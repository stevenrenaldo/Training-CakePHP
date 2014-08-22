<?php
if (strtolower($this->params['controller']) === 'students') {
?>
$('.anim').click( function(event){
	event.preventDefault();
	var nim = $(this).attr('nim');
	
	$.ajax({
		dataType: 'json',
		url: '<?= $this->Html->url(array('action'=>'getdata')); ?>/' + nim
	}).done(function(data){
		if (data) {
			$('#infodetil').html(
				'<p>NIM : ' + data.Student.nim + '</p>' +
				'<p>Nama : ' + data.Student.nama + '</p>' +
				'<p>Program Studi : ' + data.Prodi.nama + '</p>' +
				'<p><img src="<?php echo $this->Html->url(array('action'=>'photos')); ?>/' + 
				data.Student.id + '"/></p>'
			);
		} else {
			$('#infodetil').html('Maaf, data tidak ditemukan.');
		}
	});
});

<?php
}
?>