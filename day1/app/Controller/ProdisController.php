<?php
class ProdisController extends AppController {
	public $uses = array('Prodi');
	public $layout = "training";
	public $theme = "tema1";
	
	public function index() {
		$this->set("title", 'Prodi');
		$datas = $this->Prodi->find('all');
		
		$this->set(compact("datas"));
	}
	
	public function lihat($id=null) {
		$this->set("title", 'Daftar Siswa Prodi');
		if ($id) {
			$datas = $this->Prodi->Student->find('all',
							array('conditions' => array(
										'Prodi.id' => $id
									)));
			$this->set(compact('datas'));
		} else {
			$this->Session->setFlash('Permintaan tidak valid.');
			$this->redirect(array('action'=>'index'));
		}
	}
	
	public function delete($id = null) {
		if ($this->request->is('post')) {
			if ($id) {
				$this->Prodi->id = $id;
				if ($this->Prodi->delete()) {
					$this->Session->setFlash('Data sudah terhapus', 'default',
											array('class'=>'success'));
				}
			}
		}
		$this->redirect(array('action'=>'index'));
	}
	
	public function add() {
		$this->set("title", 'Tambah Prodi');
		if ($this->request->is('post')) {
			// lakukan operasi insert
			$this->Prodi->create();
			if ($this->Prodi->save($this->request->data)) {
				// jika insert berhasil
				$this->Session->setFlash('Tambah prodi berhasil!', 
										 'default',
										 array('class'=>'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				// jika insert gagal
				// tetap tampilkan form
				// flash default adalah 'bad'
				$this->Session->setFlash('Ada kesalahan INSERT data prodi.');
			}
		}
	}
	
	public function edit($id = null){
		$this->set('title', 'Edit Prodi');
		if ($this->request->is('post')) {
			// lakukan operasi UPDATE
			if ($this->request->data) {
				$this->Prodi->id = $this->request->data['Prodi']['id'];
				if ($this->Prodi->save($this->request->data)) {
					$this->Session->setFlash('Sunting data terlah tersimpan.',
											 'default',
											 array('class'=>'success'));
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('Sorry brosis, sunting data gagal.');
				}
			} else {
				$this->Session->setFlash('Permintaan tidak valid.');
			}
			$this->redirect(array('action'=>'index'));
		} else {
			if ($id) {
				try {
					$data = $this->Prodi->read(null, $id);
					//$this->set(compact('data'));
					$this->request->data = $data;
				} catch (NotFoundException $ex) {
					$this->Session->setFlash('Data tidak ditemukan.');
					$this->redirect(array('action'=>'index'));
				}
			} else {
				$this->Session->setFlash('Permintaan tidak valid.');
				$this->redirect(array('action'=>'index'));
			}
		}
	}
}
?>