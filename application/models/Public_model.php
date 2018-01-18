<?php
error_reporting(0);
class Public_model extends CI_Model {
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function get_pic_of_the_day(){
    $query = $this->db->query("SELECT p.*, c.catalog FROM product p, catalog c
      WHERE p.pic_day = 'on' AND p.catalog_id = c.catalog_id AND p.status = 1");
    if($query->num_rows() > 0 ){
      return $query->result();
    }else{
      return array();
    }
  }

  public function get_deal_of_the_day(){
    $query = $this->db->query("SELECT p.*, c.catalog FROM product p, catalog c
      WHERE p.deal_day = 'on' AND p.catalog_id = c.catalog_id AND p.status = 1");
    if($query->num_rows() > 0 ){
      return $query->result();
    }else{
      return array();
    }
  }

  public function sub_catalog_combo($catalog_id){
    $query = $this->db->query("SELECT * FROM sub_catalog WHERE status=1 AND catalog_id = $catalog_id");
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return array();
    }
  }

  public function images(){
    $query = $this->db->query("SELECT p.*, c.catalog FROM product p, catalog c
      WHERE p.status = 1 AND p.catalog_id = c.catalog_id AND p.catalog_id = 1 ORDER BY p.product_id DESC");
      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return array();
      }
  }

  public function videos(){
    $query = $this->db->query("SELECT p.*, c.catalog FROM product p, catalog c
      WHERE p.status = 1 AND p.catalog_id = c.catalog_id AND p.catalog_id = 2 ORDER BY p.product_id DESC");
      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return array();
      }
  }

  public function animations(){
    $query = $this->db->query("SELECT p.*, c.catalog FROM product p, catalog c
      WHERE p.status = 1 AND p.catalog_id = c.catalog_id AND p.catalog_id = 3 ORDER BY p.product_id DESC");
      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return array();
      }
  }

  public function games(){
    $query = $this->db->query("SELECT p.*, c.catalog FROM product p, catalog c
      WHERE p.status = 1 AND p.catalog_id = c.catalog_id AND p.catalog_id = 4 ORDER BY p.product_id DESC");
      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return array();
      }
  }

  public function music(){
    $query = $this->db->query("SELECT p.*, c.catalog FROM product p, catalog c
      WHERE p.status = 1 AND p.catalog_id = c.catalog_id AND p.catalog_id = 5 ORDER BY p.product_id DESC");
      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return array();
      }
  }

  public function image_filter($sid){
    $arr = array();
    $query = $this->db->query("SELECT p.*, c.catalog FROM product p, catalog c
      WHERE p.status = 1 AND p.catalog_id = c.catalog_id AND p.catalog_id = 1 AND p.sub_catalog_id = $sid
      ORDER BY p.product_id DESC");
    if($query->num_rows() > 0){
      foreach ($query->result() as $val){
         array_push($arr,
         array(
           "product_id"=>$val->product_id,
           "product_name"=>$val->product_name,
           "pimg"=>PRODUCT_IMG_PATH.$val->pimg,
           "catalog"=>$val->catalog,
           "price"=>$val->price
         )
       );
      }
      return json_encode($arr);
    }else{
      return json_encode($arr);
    }
  }

  public function animation_filter($sid){
    $arr = array();
    $query = $this->db->query("SELECT p.*, c.catalog FROM product p, catalog c
      WHERE p.status = 1 AND p.catalog_id = c.catalog_id AND p.catalog_id = 3 AND p.sub_catalog_id = $sid
      ORDER BY p.product_id DESC");
    if($query->num_rows() > 0){
      foreach ($query->result() as $val){
         array_push($arr,
         array(
           "product_id"=>$val->product_id,
           "product_name"=>$val->product_name,
           "pimg"=>PRODUCT_IMG_PATH.$val->pimg,
           "catalog"=>$val->catalog,
           "price"=>$val->price
         )
       );
      }
      return json_encode($arr);
    }else{
      return json_encode($arr);
    }
  }

  public function games_filter($sid){
    $arr = array();
    $query = $this->db->query("SELECT p.*, c.catalog FROM product p, catalog c
      WHERE p.status = 1 AND p.catalog_id = c.catalog_id AND p.catalog_id = 4 AND p.sub_catalog_id = $sid
      ORDER BY p.product_id DESC");
    if($query->num_rows() > 0){
      foreach ($query->result() as $val){
         array_push($arr,
         array(
           "product_id"=>$val->product_id,
           "product_name"=>$val->product_name,
           "pimg"=>PRODUCT_IMG_PATH.$val->pimg,
           "catalog"=>$val->catalog,
           "price"=>$val->price
         )
       );
      }
      return json_encode($arr);
    }else{
      return json_encode($arr);
    }
  }

  public function video_filter($sid){
    $arr = array();
    $query = $this->db->query("SELECT p.*, c.catalog FROM product p, catalog c
      WHERE p.status = 1 AND p.catalog_id = c.catalog_id AND p.catalog_id = 2 AND p.sub_catalog_id = $sid
      ORDER BY p.product_id DESC");
    if($query->num_rows() > 0){
      foreach ($query->result() as $val){
         array_push($arr,
         array(
           "product_id"=>$val->product_id,
           "product_name"=>$val->product_name,
           "pimg"=>PRODUCT_IMG_PATH.$val->pimg,
           "catalog"=>$val->catalog,
           "price"=>$val->price
         )
       );
      }
      return json_encode($arr);
    }else{
      return json_encode($arr);
    }
  }

  public function music_filter($sid){
    $arr = array();
    $query = $this->db->query("SELECT p.*, c.catalog FROM product p, catalog c
      WHERE p.status = 1 AND p.catalog_id = c.catalog_id AND p.catalog_id = 5 AND p.sub_catalog_id = $sid
      ORDER BY p.product_id DESC");
    if($query->num_rows() > 0){
      foreach ($query->result() as $val){
         array_push($arr,
         array(
           "product_id"=>$val->product_id,
           "product_name"=>$val->product_name,
           "pimg"=>PRODUCT_IMG_PATH.$val->pimg,
           "catalog"=>$val->catalog,
           "price"=>$val->price
         )
       );
      }
      return json_encode($arr);
    }else{
      return json_encode($arr);
    }
  }

  public function transactionNo(){
    $chars = "0123456789";
    return substr(str_shuffle($chars), 0, 16);
  }

  public function gamesServices($country, $adsNetwork){
    $txnNo = $this->transactionNo();
    $txnid = array('txnid' => $txnNo);
    $this->session->set_userdata('txnNo',$txnid);
    $query = $this->db->query("INSERT INTO tracking(country, adsNetwork, txnId, service)
    VALUES('$country','$adsNetwork','$txnNo', 'games')");
  }

}
?>
