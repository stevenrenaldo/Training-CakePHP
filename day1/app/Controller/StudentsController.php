<?php
App::uses('File', 'Utility');

class StudentsController extends AppController {
	public $uses = array('Student');
	public $components = array('Paginator');
	public $layout = 'training';
	public $theme = 'tema1';
	
	public function index() {
		$this->set("title", 'Daftar Siswa');
		
		$this->Paginator->settings = array(
					'limit' => 5,
					'order' => array('Student.nim' => 'asc')
				);
		$datas = $this->Paginator->paginate('Student');
		
		$this->set(compact('datas'));
	}
	
	public function delete($id = null) {
		if ($this->request->is('post')) {
			if ($id) {
				$data = $this->Student->findById($id);
				if ($data) {
					$file = new File($data['Student']['filepath'] . 
									 $data['Student']['filename'], false, 0777);
				}
				
				$this->Student->id = $id;
				if ($this->Student->delete()) {
					if ($file) {
						$file->delete();
					}
					$this->Session->setFlash('Data sudah terhapus', 'default',
											array('class'=>'success'));
				}
			}
		}
		$this->redirect(array('action'=>'index'));
	}
	
	public function add() {
		$this->set("title", 'Tambah Student');
		if ($this->request->is('post')) {
			// proses upload
			if ($this->request->data['Student']['photo']['tmp_name']) {
				$file = $this->request->data['Student']['photo'];
				$upload = $this->__upload($file);
				
				if ($upload) {
					$this->request->data['Student']['filename'] =
							$file['name'];
					$this->request->data['Student']['filepath'] = 
							$_SERVER['DOCUMENT_ROOT'] . $this->request->base . 
							DS . 'files' . DS . 'photos' . DS . 'students' . DS;
					$this->request->data['Student']['mime_type'] =
							$file['type'];
				}
			}
	
			// lakukan operasi insert
			$this->Student->create();
			if ($this->Student->save($this->request->data)) {
				// jika insert berhasil
				$this->Session->setFlash('Tambah Student berhasil!', 
										 'default',
										 array('class'=>'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				// jika insert gagal
				// tetap tampilkan form
				// flash default adalah 'bad'
				$this->Session->setFlash('Ada kesalahan INSERT data Student.');
			}
		}
		$prodis = $this->Student->Prodi->find('list', 
						array('fields' => array('Prodi.id', 'Prodi.nama')));
		$this->set(compact('prodis'));
	}
	
	private function __upload($file) {
		$ext = substr(strrchr(strtolower($file['name']), '.'), 1);
		
		if (in_array($ext, array('jpg', 'jpeg', 'png', 'gif'))) {
			
			$fullpath = $_SERVER['DOCUMENT_ROOT'] . $this->request->base . DS . 
						'files' . DS . 'photos'  . DS . 'students' . DS;
			
			move_uploaded_file($file['tmp_name'], $fullpath . $file['name']);
			
			return true;
		} else {
			return false;
		}
	}
	
	public function detil($id=null){
		if ($id) {
			/*$data = $this->Student->find('first', array(
								'conditions' => array(
									'Student.id' => $id
								)
							));
			
			perintah di atas sama dengan:
			
			$data = $this->Student->findById($id); 
			*/
			$data = $this->Student->findByNim($id);
			$this->set(compact('data'));
		} else {
			$this->Session->setFlash('Permintaan tidak valid.');
			$this->redirect(array('action' => 'index'));
		}
	}
	
	public function getdata($nim) {
		$this->autoRender = false;
		if ($this->request->is('ajax')) {
			$data = $this->Student->findById($nim);
			if ($data) {
				echo json_encode($data);
			} else {
				echo json_encode(array());
			}
		} else {
			$this->redirect(array('action' => 'detil', $nim));
		}
	}
	
	public function photos($id=null) {
		$filename = 'anonym.png';
		if ($id) {
			$data = $this->Student->findById($id);
			if ($data) {
				$filename = $data['Student']['filename'];
				if (!$filename) {
					$filename = 'anonym.png';
				}
			}
		}
		
		$fullpath = $_SERVER['DOCUMENT_ROOT'] . $this->request->base . DS . 
						'files' . DS . 'photos'  . DS . 'students' . DS;
		$file = new File($fullpath . $filename, false, 0777);
		if ($file->exists()) {
			$this->response->file($fullpath . $filename, 
						array('download'=>true, 'name' => $filename));
		} else {
			$this->response->file($fullpath . 'anonym.png', 
						array('download'=>true, 'name' => 'anonym.png'));
		}
		return $this->response;
	}
	
	public function edit($id = null){
		$this->set('title', 'Edit Student');
		if ($this->request->is('post')) {
			// lakukan operasi UPDATE
			if ($this->request->data) {
				if ($this->request->data['Student']['photo']['tmp_name']) {
					$file = $this->request->data['Student']['photo'];
					$upload = $this->__upload($file);
					
					if ($upload) {
						$this->request->data['Student']['filename'] =
								$file['name'];
						$this->request->data['Student']['filepath'] = 
								$_SERVER['DOCUMENT_ROOT'] . $this->request->base . 
								DS . 'files' . DS . 'photos' . DS . 'students' . DS;
						$this->request->data['Student']['mime_type'] =
								$file['type'];
					}
				}
				
				$this->Student->id = $this->request->data['Student']['id'];
				if ($this->Student->save($this->request->data)) {
					$this->Session->setFlash('Sunting data telah tersimpan.',
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
					$data = $this->Student->read(null, $id);
					//$this->set(compact('data'));
					$this->request->data = $data;
				} catch (NotFoundException $ex) {
					$this->Session->setFlash('Data tidak ditemukan.');
					$this->redirect(array('action'=>'index'));
				}
				$prodis = $this->Student->Prodi->find('list', 
								array('fields' => array('Prodi.id', 'Prodi.nama')));
				$this->set(compact('prodis'));
			} else {
				$this->Session->setFlash('Permintaan tidak valid.');
				$this->redirect(array('action'=>'index'));
			}
		}
	}
}
?>