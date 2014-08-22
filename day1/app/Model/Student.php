<?php
class Student extends AppModel {
	// definisi ORM many-to-one
	public $belongsTo = array(
				'Prodi' => array(
					'foreignKey' => 'prodi_id'
				)
			);
}
?>