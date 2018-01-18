<?php
error_reporting(0);
class Admin_model extends CI_Model {
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function authenticate_user($email,$password){
    $pass = md5($password);
    $query = $this->db->query("SELECT * FROM users WHERE email='$email' AND password = '$pass' AND status = 1");
    if($query->num_rows() > 0 ){
      $uid = $query->row()->users_id;
      $query1 = $this->db->query("UPDATE users SET update_timestamp = now() WHERE users_id = $uid");
        $user = array(
          'users_id'  => $query->row()->users_id,
          'email'=> $email,
          'name' => $query->row()->name,
          'mobile'=>$query->row()->mobile,
          'role'=>$query->row()->role,
          'logged_in' => TRUE
        );
        $this->session->set_userdata('user',$user);
        return SUCCESS;
    }else{
      return AUTHENTICATION_FAILED;
    }
  }

  public function forgot_password($email){
    $this->load->model('common_model');
    $query = $this->db->query("SELECT * FROM users WHERE email='$email' AND status = 1 LIMIT 0,1");
    if($query->num_rows() > 0){
      $name = $query->row()->name;
      $password = $this->randomPassword();
      $pass = MD5($password);
      $query1 = $this->db->query("UPDATE users set password='$pass' WHERE email='$email' AND status = 1");
      if($query1 > 0){
        $message = "Dear ".$name.",\r\n";
        $message = $message."Your password has been reset for account : ".$email."\r\n";
        $message = $message."New Password : ".$password."\r\n";
        $message = $message."Thank You \r\n Hotjobz";

        $msg = $this->common_model->send_email($email, EMAIL_FROM_MAIL_SEND, RESET_PASSWORD, $message, EMAIL_FROM_MAIL_SEND_NAME);
        if($msg == SUCCESS){
          return RESET_PASSWORD_SUCCESS;
        }else{
          return WRONG;
        }
      }

    }else{
      return INVALID_ACCOUNT;
    }
  }

  // generate random string
  public function randomPassword() {
      $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*";
      $password = substr(str_shuffle($chars), 0, 8);
      return $password;
  }

  public function reset_password($password){
    $uid = $this->session->userdata['user']['users_id'];
    $password = MD5($password);
    $query = $this->db->query("UPDATE users SET password = '$password' WHERE users_id = '$uid'");
    if($query > 0){
      return SUCCESS;
    }else{
      return ERROR;
    }
  }

  // generate random sku
  public function randomSku() {
      $chars = "0123456789";
      $sku = substr(str_shuffle($chars), 0, 6);
      return $sku;
  }

  public function catalog_list(){
    $query = $this->db->query("SELECT * FROM catalog WHERE status=1 ORDER BY catalog");
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return array();
    }
	}

  public function add_catalog($catalog){
    $query = $this->db->query("SELECT * FROM catalog WHERE catalog='$catalog' AND status=1 ");
    if($query->num_rows() > 0){
      return ALREADY_EXIST;
    }else{
        $query = $this->db->query("INSERT INTO catalog(catalog) VALUES('$catalog')");
        if($query > 0){
          return SUCCESS;
        }else{
          return ERROR;
        }
    }
  }

  public function delete_catalog($catalog_id){
    $query = $this->db->query("UPDATE catalog SET status = 0 WHERE catalog_id = $catalog_id");
    if($query){
      return SUCCESS;
    }else{
      return ERROR;
    }
  }

  public function catalog_combo(){
    $query = $this->db->query("SELECT * FROM catalog WHERE status=1");
    if($query->num_rows() > 0){
      foreach ($query->result() as $val){
         $arr[$val->catalog_id] = $val->catalog;
       }
      return $data['navarr'] = $arr;
    }else{
      return $data['navarr'] = array();
    }
  }

  public function sub_catalog_combo(){
    $query = $this->db->query("SELECT * FROM sub_catalog WHERE status=1");
    if($query->num_rows() > 0){
      foreach ($query->result() as $val){
         $arr[$val->sub_catalog_id] = $val->sub_catalog;
       }
      return $data['navarr'] = $arr;
    }else{
      return $data['navarr'] = array();
    }
  }

  public function sub_catalog_list(){
    $query = $this->db->query("SELECT s.*, c.catalog FROM sub_catalog s, catalog c WHERE s.status=1 and
      s.catalog_id = c.catalog_id ORDER BY c.catalog");
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return array();
    }
  }

  public function add_sub_catalog($sub_catalog,$catalog_id, $sub_catalog_arabic){
    $query = $this->db->query("SELECT * FROM sub_catalog WHERE sub_catalog='$sub_catalog' AND catalog_id = $catalog_id
      AND status=1 ");
    if($query->num_rows() > 0){
      return ALREADY_EXIST;
    }else{
        $query = $this->db->query("INSERT INTO sub_catalog(catalog_id, sub_catalog, sub_catalog_arabic)
        VALUES('$catalog_id', '$sub_catalog','$sub_catalog_arabic')");
        if($query > 0){
          return SUCCESS;
        }else{
          return ERROR;
        }
    }
  }

  public function delete_sub_catalog($sub_catalog_id){
    $query = $this->db->query("UPDATE sub_catalog SET status = 0 WHERE sub_catalog_id = $sub_catalog_id");
    if($query){
      return SUCCESS;
    }else{
      return ERROR;
    }
  }

  public function get_sub_catalog($cid){
    $arr = array();
    $query = $this->db->query("SELECT sub_catalog_id, sub_catalog
      FROM sub_catalog WHERE status=1 AND catalog_id = $cid ORDER BY sub_catalog ");
    if($query->num_rows() > 0){
      foreach ($query->result() as $val){
         array_push($arr,
         array(
           "sub_catalog_id"=>$val->sub_catalog_id,
           "sub_catalog"=>$val->sub_catalog
         )
       );
      }
      return json_encode($arr);
    }else{
      return json_encode($arr);
    }
	}

  public function save_product($catalog_id, $sub_catalog_id, $product_name, $price, $pimg_name, $pimg_tmp,
  $himg, $htemp, $pic_day, $deal_day, $region){
    $pimg_name = mt_rand().$pimg_name;
    if($himg != ""){
      $query = $this->db->query("INSERT INTO product(product_name, catalog_id, sub_catalog_id, price, pimg, other,
        pic_day, deal_day, region)
      VALUES('$product_name', '$catalog_id', '$sub_catalog_id', '$price', '$pimg_name', '$himg', '$pic_day', '$deal_day', '$region')");
      move_uploaded_file($htemp, PRODUCT_IMG_PATH.$himg);
    }else{
      $query = $this->db->query("INSERT INTO product(product_name, catalog_id, sub_catalog_id, price, pimg, pic_day, deal_day, region)
      VALUES('$product_name', '$catalog_id', '$sub_catalog_id', '$price', '$pimg_name', '$pic_day', '$deal_day', '$region')");
    }
    if($query > 0){
      move_uploaded_file($pimg_tmp, PRODUCT_IMG_PATH.$pimg_name);
      return SUCCESS;
    }else{
      return ERROR;
    }
  }

  public function product_list(){
    $query = $this->db->query("SELECT p.*, c.catalog, s.sub_catalog FROM product p, catalog c, sub_catalog s
      WHERE p.status = 1 AND p.catalog_id = c.catalog_id AND p.sub_catalog_id = s.sub_catalog_id ORDER BY p.product_id DESC");
      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return array();
      }
  }

  public function delete_all_product(){
    $query = $this->db->query("UPDATE product SET status = 0");
    if($query > 0){
      return SUCCESS;
    }else{
      return ERROR;
    }
  }

  public function delete_product($product_id){
    $query = $this->db->query("UPDATE product SET status = 0 WHERE product_id = $product_id");
    if($query > 0){
      $query = $this->db->query("SELECT pimg,other FROM product WHERE product_id = $product_id");
      $pimg_name = $query->row()->pimg;
      $other = $query->row()->other;
      if($other !="" && $other != null){
        unlink(PRODUCT_IMG_PATH.$other);
      }
      unlink(PRODUCT_IMG_PATH.$pimg_name);
      return SUCCESS;
    }else{
      return ERROR;
    }
  }

  public function product_detail($product_id){
    $query = $this->db->query("SELECT p.*, c.catalog, s.sub_catalog FROM product p, catalog c, sub_catalog s
      WHERE p.status = 1 AND p.catalog_id = c.catalog_id AND p.sub_catalog_id = s.sub_catalog_id
      AND p.product_id = $product_id");
      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return array();
      }
  }

  public function update_product($product_id, $product_name, $catalog_id, $sub_catalog_id, $price, $pimg_name, $pimg_tmp,
  $himg, $htemp, $pic_day, $deal_day, $region){
    if($pimg_name != "" && $himg != ""){
      $query = $this->db->query("SELECT pimg, other FROM product WHERE product_id = $product_id");
      $pimg = $query->row()->pimg;
      $other = $query->row()->other;
      if($pimg !="" && $pimg != NULL){
        unlink(PRODUCT_IMG_PATH.$pimg);
      }
      if($other !="" && $other != NULL){
        unlink(PRODUCT_IMG_PATH.$other);
      }
      $query = $this->db->query("UPDATE product SET product_name = '$product_name', catalog_id = '$catalog_id',
        sub_catalog_id = '$sub_catalog_id', price = '$price', pimg = '$pimg_name', other = '$himg',
        pic_day = '$pic_day', deal_day = '$deal_day', region = '$region' WHERE product_id = $product_id");
      move_uploaded_file($htemp, PRODUCT_IMG_PATH.$himg);
      move_uploaded_file($pimg_tmp, PRODUCT_IMG_PATH.$pimg_name);
    }

    if($pimg_name != "" && $himg == ""){
      $query = $this->db->query("SELECT pimg FROM product WHERE product_id = $product_id");
      $pimg = $query->row()->pimg;
      if($pimg !="" && $pimg != NULL){
        unlink(PRODUCT_IMG_PATH.$pimg);
      }
      $query = $this->db->query("UPDATE product SET product_name = '$product_name', catalog_id = '$catalog_id',
        sub_catalog_id = '$sub_catalog_id', price = '$price', pimg = '$pimg_name',
        pic_day = '$pic_day', deal_day = '$deal_day', region = '$region' WHERE product_id = $product_id");
      move_uploaded_file($pimg_tmp, PRODUCT_IMG_PATH.$pimg_name);
    }

    if($pimg_name == "" && $himg != ""){
      $query = $this->db->query("SELECT other FROM product WHERE product_id = $product_id");
      $other = $query->row()->other;
      if($other !="" && $other != NULL){
        unlink(PRODUCT_IMG_PATH.$other);
      }
      $query = $this->db->query("UPDATE product SET product_name = '$product_name', catalog_id = '$catalog_id',
        sub_catalog_id = '$sub_catalog_id', price = '$price', other = '$himg',
        pic_day = '$pic_day', deal_day = '$deal_day', region = '$region' WHERE product_id = $product_id");
      move_uploaded_file($htemp, PRODUCT_IMG_PATH.$himg);
    }

    if($query > 0){
      return SUCCESS;
    }else{
      return ERROR;
    }
  }

  public function animations(){
    $query = $this->db->query("SELECT p.*, s.sub_catalog FROM product p, sub_catalog s
      WHERE p.status = 1 AND p.sub_catalog_id = s.sub_catalog_id AND p.catalog_id = 3 ORDER BY p.product_id DESC");
      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return array();
      }
  }

  public function delete_all_animation(){
    $query = $this->db->query("UPDATE product SET status = 0 WHERE catalog_id = 3");
    if($query > 0){
      return SUCCESS;
    }else{
      return ERROR;
    }
  }

  public function images(){
    $query = $this->db->query("SELECT p.*, s.sub_catalog FROM product p, sub_catalog s
      WHERE p.status = 1 AND p.sub_catalog_id = s.sub_catalog_id AND p.catalog_id = 1 ORDER BY p.product_id DESC");
      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return array();
      }
  }

  public function delete_all_images(){
    $query = $this->db->query("UPDATE product SET status = 0 WHERE catalog_id = 1");
    if($query > 0){
      return SUCCESS;
    }else{
      return ERROR;
    }
  }

  public function videos(){
    $query = $this->db->query("SELECT p.*, s.sub_catalog FROM product p, sub_catalog s
      WHERE p.status = 1 AND p.sub_catalog_id = s.sub_catalog_id AND p.catalog_id = 2 ORDER BY p.product_id DESC");
      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return array();
      }
  }

  public function delete_all_videos(){
    $query = $this->db->query("UPDATE product SET status = 0 WHERE catalog_id = 2");
    if($query > 0){
      return SUCCESS;
    }else{
      return ERROR;
    }
  }

  public function games(){
    $query = $this->db->query("SELECT p.*, s.sub_catalog FROM product p, sub_catalog s
      WHERE p.status = 1 AND p.sub_catalog_id = s.sub_catalog_id AND p.catalog_id = 4 ORDER BY p.product_id DESC");
      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return array();
      }
  }

  public function delete_all_games(){
    $query = $this->db->query("UPDATE product SET status = 0 WHERE catalog_id = 4");
    if($query > 0){
      return SUCCESS;
    }else{
      return ERROR;
    }
  }

  public function music(){
    $query = $this->db->query("SELECT p.*, s.sub_catalog FROM product p, sub_catalog s
      WHERE p.status = 1 AND p.sub_catalog_id = s.sub_catalog_id AND p.catalog_id = 5 ORDER BY p.product_id DESC");
      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return array();
      }
  }

  public function delete_all_music(){
    $query = $this->db->query("UPDATE product SET status = 0 WHERE catalog_id = 5");
    if($query > 0){
      return SUCCESS;
    }else{
      return ERROR;
    }
  }

  public function pic_of_the_day(){
    $query = $this->db->query("SELECT p.*, c.catalog, s.sub_catalog FROM product p, catalog c, sub_catalog s
      WHERE p.status = 1 AND p.catalog_id = c.catalog_id AND p.sub_catalog_id = s.sub_catalog_id AND pic_day = 'on'
      ORDER BY p.product_id DESC");
      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return array();
      }
  }

  public function delete_all_pic_of_the_day(){
    $query = $this->db->query("UPDATE product SET status = 0 WHERE pic_day = 'on'");
    if($query > 0){
      return SUCCESS;
    }else{
      return ERROR;
    }
  }

  public function remove_all_pic_of_the_day(){
    $query = $this->db->query("UPDATE product SET pic_day = '' WHERE pic_day = 'on' ");
    if($query > 0){
      return SUCCESS;
    }else{
      return ERROR;
    }
  }

  public function remove_pic_of_the_day($product_id){
    $query = $this->db->query("UPDATE product SET pic_day = '' WHERE product_id = $product_id ");
    if($query > 0){
      return SUCCESS;
    }else{
      return ERROR;
    }
  }

  public function deal_of_the_day(){
    $query = $this->db->query("SELECT p.*, c.catalog, s.sub_catalog FROM product p, catalog c, sub_catalog s
      WHERE p.status = 1 AND p.catalog_id = c.catalog_id AND p.sub_catalog_id = s.sub_catalog_id AND deal_day = 'on'
      ORDER BY p.product_id DESC");
      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return array();
      }
  }

  public function delete_all_deal_of_the_day(){
    $query = $this->db->query("UPDATE product SET status = 0 WHERE deal_day = 'on'");
    if($query > 0){
      return SUCCESS;
    }else{
      return ERROR;
    }
  }

  public function remove_all_deal_of_the_day(){
    $query = $this->db->query("UPDATE product SET deal_day = '' WHERE deal_day = 'on' ");
    if($query > 0){
      return SUCCESS;
    }else{
      return ERROR;
    }
  }

  public function remove_deal_of_the_day($product_id){
    $query = $this->db->query("UPDATE product SET deal_day = '' WHERE product_id = $product_id ");
    if($query > 0){
      return SUCCESS;
    }else{
      return ERROR;
    }
  }

  public function upload_file($fname, $ftemp){
    $this->load->database();
    $msg = "Data uploaded, successfully.";
    if($fname != ""){
      move_uploaded_file($ftemp,FILE_PATH.$fname);
    }
    ini_set('auto_detect_line_endings', true);
    $file = fopen(FILE_PATH.$fname, "r");
    $titles =  fgetcsv($file);

    $this->db->trans_begin();
    while (!feof($file)) {
      $data = fgetcsv($file);
       $values = "";
      for($i=0;$i<count($data);$i++){
        $values = $values."'$data[$i]'".",";
        $fdata[$titles[$i]] = $data[$i];
      }
      if($fdata['Catalog Id'] == ""){
        break;
      }else{
        $values = substr($values, 0, strlen($values) - 1);
        $sql = "INSERT INTO product(catalog_id, sub_catalog_id, product_name, price, pimg, other, pic_day, deal_day, region) VALUES($values)";
          $query = $this->db->query($sql);
          if($query <= 0){
            $this->db->trans_rollback();
            $msg = "File uploading error, due to wrong data.";
            break;
          }
      }
        $values = "";
    }
    $this->db->trans_commit();
    fclose($file);
    unlink(FILE_PATH.$fname);
    return $msg;
  }

}
?>
