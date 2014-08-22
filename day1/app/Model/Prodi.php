<?php
class Prodi extends AppModel {
	// relasi ORM one-to-many
	public $hasMany = array(
				'Student' => array(
					'foreignKey' => 'prodi_id'
				)
			);
	
	// validate hanya akan digunakan ketika operasi INSERT dan UPDATE
	public $validate = array(
				'kode' => array(
						'notEmpty' => array(
							'rule'=>'notEmpty', 
							'message' => 'Kode harus angka dan tidak boleh kosong'
						),
						'numeric' => array(
							'rule' => 'numeric',
							'message' => 'Kode harus angka'
						),
						'isUnique' => array(
							'rule' => 'isUnique', 
							'message' => 'Kode tidak boleh sama dengan yang sudah ada'
						),
						'required' => true,
						'allowEmpty' => false,
					),
				'nama' => array(
						'rule' => 'notEmpty',
						'allowEmpty' => false,
						'required' => true,
						'message' => 'Nama Prodi tidak boleh kosong'
					)
			);
}
?>