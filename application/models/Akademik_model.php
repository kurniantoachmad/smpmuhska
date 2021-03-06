<?php
/**
* 
*/
class Akademik_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function record_count($kategori) {
		return $this->db->where(['kategori'=> $kategori, 'status' => 'show'])->get("akademik")->num_rows();
	}

	public function fetch_data($limit,$dari, $kategori) {
		$query = $this->db->where(['kategori'=> $kategori, 'status' => 'show'])->get("akademik" ,$limit, $dari)->result();
		return $query;
	}



	function getAllAkademik(){
		$result = $this->db->get('akademik');
		return $result;
	}

	function getAkademikById($id){
		$result = $this->db->where('id_akademik', $id)->get('akademik');
		return $result;
	}

	function getAkademikByIdIfShow($id,$kategori){
		$result = $this->db->limit(1)->where(['id_akademik'=> $id,'kategori'=> $kategori, 'status' => 'show'])->get('akademik');
		return $result;
	}

	function getAkademikIfShowByKategori($kategori){
		$result = $this->db->where(['status' => 'show', 'kategori' => $kategori])->get('akademik');
		return $result;
	}


	function setAkademik($data){
		try {
			$this->db->insert('akademik', $data);
			return true;
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	function updateAkademik($id, $data){
		try {
			$this->db->where('id_akademik', $id)->limit(1)->update('akademik', $data);
			return true;
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	function deleteAkademik($id){
		try {
			$this->db->where('id_akademik', $id)->limit(1)->delete('akademik');
			return true;
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}


	function deleteAllArtikelByKategori($kategori){
		try {
			$this->db->where('kategori', $kategori)->delete('akademik');
			return true;
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	//-------------------------------------------------------------------------

	function getAllKategoriAkademik(){
		$result = $this->db->get('kategoriakademik');
		return $result;
	}

	function getKategoriAkademikById($id){
		$result = $this->db->where('id_kategori', $id)->get('kategoriakademik');
		return $result;
	}

	function setKategoriAkademik($data){
		try {
			$this->db->insert('kategoriakademik', $data);
			return true;
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	function updateKategoriAkademik($id, $data){
		try {
			$this->db->where('id_kategori', $id)->limit(1)->update('kategoriakademik', $data);
			return true;
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	function deleteKategoriAkademik($id){
		try {
			$this->db->where('id_kategori', $id)->limit(1)->delete('kategoriakademik');
			return true;
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

}


?>