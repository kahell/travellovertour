<?php
Class Admin_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    //1. Login - Model ---------------------------------------------------------
   	function getDataLogin($username, $password){
        $array = array('username' => $username , 'password' => $password);
        $array2 = array('email' => $username, 'password' => $password);
        
        $this->db->select('*');
        $this->db->from('identitas');
        $this->db->where($array);
        $this->db->or_where($array2);
        $this->db->limit(1);
        $query = $this->db->get();
	    if($query->num_rows() > 0){
			return $query->result();
	    }else{
			return false;
	    }
	}
    //End of Login-Model -------------------------------------------------------
    
    //2. Home - Model ----------------------------------------------------------
    // - Slider
    function getDataSlider(){
        $this->db->select('id_paket, pict_paket, harga_paket, nama_paket, lokasi_paket, slider_paket, popular_paket');
        $this->db->where("aktif_paket = 'aktif'");
        $this->db->from('paket');
        $query = $this->db->get();
	    if($query->num_rows() > 0){
			return $query;
	    }else{
			return false;
	    }
	}

	function sumDataSlider(){
        $this->db->select("SUM(slider_paket = '1') as slider_paket");
        $this->db->where("aktif_paket = 'aktif'");
        $this->db->from('paket');
        $query = $this->db->get();
	    return $query->row()->slider_paket;
	}

	function sumDataPopular(){
        $this->db->select("SUM(popular_paket = '1') as popular_paket");
        $this->db->where("aktif_paket = 'aktif'");
        $this->db->from('paket');
        $query = $this->db->get();
	    return $query->row()->popular_paket;
	}
    
    // - Slider in Admin for CRUD
 
	var $table = 'home';

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();
        
		return $query->row();
	}

	public function slider_add($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function slider_update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	public function getData($tableName, $where){
		$result = $this->db->query("select * from $tableName $where");
		return $result;
	}
	public function deleteData($tableName, $where){
		$result = $this->db->delete($tableName, $where);
		return $result;
	}

	public function delete_id($id,$table)
	{
		$this->db->where('id_foto', $id);
		$this->db->delete($table);
	}

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

	//- Foto Paket in Admin for CRUD
	public function paket_add($tableName, $data)
	{
		$this->db->insert($tableName, $data);
		return $this->db->insert_id();
	}

	public function paket_update($tableName, $where, $data)
	{
		$this->db->update($tableName, $data, $where);
		return $this->db->affected_rows();
	}

	public function paket_by_id($tableName, $id)
	{
		$this->db->where('id', $id);
		$this->db->delete($tableName);
	}

	public function fotoDelete($tableName, $foto)
	{
		$this->db->where('foto_paket', $foto);
		$this->db->delete($tableName);
	}

	// - Testimonial
	public function getDataTesti(){
		$query = $this->db->query("select * from testimonial where 1");
	    if($query->num_rows() > 0){
			return $query;
	    }else{
			return false;
	    }
	}

	public function testi_update($tableName, $where, $data)
	{
		$this->db->update($tableName, $data, $where);
		return $this->db->affected_rows();
	}
	// - Gallery
	public function getGalleryById($id_gallery)
	{	
		$this->db->select("pict_gallery");
		$this->db->from('gallery');
		$this->db->where('id_gallery',$id_gallery);
		$query = $this->db->get();
		return $query->row()->pict_gallery;
	}
	public function gallery_add($tableName, $data)
	{
		$this->db->insert($tableName, $data);
		return $this->db->insert_id();
	}


	// Blogs
	function getBlogs(){
        $this->db->select("*");
        $this->db->from('post');
        $query = $this->db->get();
	    return $query;
	}
	function addBlogs($tableName, $data){
        $this->db->insert($tableName, $data);
		return $this->db->insert_id();
	}
<<<<<<< HEAD
	function updateBlogs($tableName, $data, $where)
=======
	function updateBlogs($tableName, $where, $data)
>>>>>>> refs/remotes/origin/master
	{
		$this->db->update($tableName, $data, $where);
		return $this->db->affected_rows();
	}
    //End of Home-Model -------------------------------------------------------
}
?>