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
		$this->db->select('id_paket, pict_paket, harga_paket, nama_paket, lokasi_paket, slider_paket, popular_paket, typeTrip_paket');
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
	
	public function getPaketNews()
	{	
		$query = $this->db->query("
			SELECT * FROM paket WHERE '1' ORDER BY id_paket DESC limit 4");
		return $query;
	}
	public function getPopularPost()
	{	
		$query = $this->db->query("
			SELECT * FROM paket WHERE popular_paket = '1' ORDER BY id_paket ASC limit 8");
		return $query;
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
	function getDataPaketForCheckout($id_paket){
		$this->db->select("nama_paket, typeTrip_paket, lokasi_paket");
		$this->db->from('paket');
		$query = $this->db->get();
		return $query;
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
	function getGallery(){
		$this->db->select("*");
		$this->db->from("gallery");
		$this->db->limit('12', '0');
		$this->db->order_by("id_gallery", "desc");
		$query = $this->db->get();
		return $query;
	}
	public function gallery_add($tableName, $data)
	{
		$this->db->insert($tableName, $data);
		return $this->db->insert_id();
	}
	public function gallery_update($tableName, $data, $where)
	{
		$this->db->update($tableName, $data, $where);
		return $this->db->affected_rows();
	}

	// Blogs
	function getBlogs(){
		$this->db->select("*");
		$this->db->from('post');
		$this->db->order_by("id_post", "desc");
		$query = $this->db->get();
		return $query;
	}
	function getBlogsHome(){
		$this->db->select("*");
		$this->db->from("post");
		$this->db->where('status_post','1');
		$this->db->limit('4', '0');
		$this->db->order_by("id_post", "desc");
		$query = $this->db->get();
		return $query;
	}
	function addBlogs($tableName, $data){
		$this->db->insert($tableName, $data);
		return $this->db->insert_id();
	}
	function updateBlogs($tableName, $where, $data)
	{
		$this->db->update($tableName, $data, $where);
		return $this->db->affected_rows();
	}

	//Get Tag Join
	function getTagJoin($id){
		$query = $this->db->query("SELECT tags.name, tag_post.id_post, tag_post.id_tag_post
			FROM tag_post
			INNER JOIN tags ON tag_post.id_post = '$id'
			AND tag_post.id_tag_post = tags.id_tags");
		return $query;
	}

	function getCategoryJoin($id){
		$query = $this->db->query("SELECT categories.name, category_post.id_post, category_post.id_category_post
			FROM category_post
			INNER JOIN categories ON category_post.id_post = '$id'
			AND category_post.id_category_post = categories.id_category");
		return $query;
	}

	//Tags
	function getTags($data){
		$this->db->select("*");
		$this->db->where('name',$data);
		$this->db->from('tags');
		$query = $this->db->get();
		return $query;
	}
	function addTags($tableName, $data){
		$this->db->insert($tableName, $data);
		return $this->db->insert_id();
	}
	public function deleteTags($tableName, $name)
	{
		$this->db->where('name', $name);
		$this->db->delete($tableName);
	}

	public function deleteTagsRel($tableName, $id_tags, $id_post){
		$this->db->where('id_tag_post', $id_tags);
		$this->db->where('id_post', $id_post);
		$this->db->delete($tableName);
	}
	function getId($tableName, $name){
		$this->db->select("id_tags");
		$this->db->where("name", $name);
		$this->db->from($tableName);
		$query = $this->db->get();
		return $query->row()->id_tags;
	}
	function getIdPost($tableName, $id_tags,$id_post){
		$this->db->select("*");
		$this->db->where("id_tag_post", $id_tags);
		$this->db->where("id_post", $id_post);
		$this->db->from($tableName);
		$query = $this->db->get();
		return $query;
	}

	// Category
	function getCategory($data){
		$this->db->select("*");
		$this->db->where('name',$data);
		$this->db->from('categories');
		$query = $this->db->get();
		return $query;
	}
	function addCategories($tableName, $data){
		$this->db->insert($tableName, $data);
		return $this->db->insert_id();
	}
	function getIdCategory($tableName, $name){
		$this->db->select("id_category");
		$this->db->where("name", $name);
		$this->db->from($tableName);
		$query = $this->db->get();
		return $query->row()->id_category;
	}
	function getIdPostCategory($tableName, $id_tags, $id_post){
		$this->db->select("*");
		$this->db->where("id_category_post", $id_tags);
		$this->db->where("id_post", $id_post);
		$this->db->from($tableName);
		$query = $this->db->get();
		return $query;
	}
	function deleteCategoryRel($tableName, $id_tags, $id_post){
		$this->db->where('id_category_post', $id_tags);
		$this->db->where('id_post', $id_post);
		$this->db->delete($tableName);
	}
	//Transaksi Model
	function getDataTransaksi(){
		$this->db->select("*");
		$this->db->from('transaksi');
		$query = $this->db->get();
		return $query;
	}
	function getDataTransaksiById($id){
		$this->db->select("*");
		$this->db->from('transaksi');
		$this->db->where('id_transaksi', $id);
		$query = $this->db->get();
		return $query;
	}
	function getDataTamu($id){
		$this->db->select("id_dataTamu, nama_tamu, gender_tamu");
		$this->db->where('id_transaksi', $id);
		$this->db->from('datatamu');
		$query = $this->db->get();
		return $query;
	}
	function transaksi_update($where, $data){
		$this->db->update('transaksi', $data, $where);
		return $this->db->affected_rows();
	}
	function dataTamu_update($where, $data){
		$this->db->update('datatamu', $data, $where);
		return $this->db->affected_rows();
	}
    //End of Home-Model -------------------------------------------------------
}
?>