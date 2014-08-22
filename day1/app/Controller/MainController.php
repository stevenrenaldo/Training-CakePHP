<?php
class MainController extends AppController {
	public $layout = "training";
	public $theme = "tema1";

	public function hello($nama = null, $kelas = null) {
		$this->set("title", 'Hello');
		$this->set(compact("nama"));
		$this->set(compact("kelas"));
	}
	
	public function hai() {
		$this->set("title", 'Hai');
		if ($this->request->is('post')) {
			$nama = $this->request->data['hai']['nama'];
			$this->set('namalengkap', strtoupper($nama));
		}
	}
	
}
?>