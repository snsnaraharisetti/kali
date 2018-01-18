<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// error_reporting(0);
class Dashboard extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
		$this->load->model('admin_model');
  }
	public function index()
	{
		$data['msgs'] = array("msg"=>"none");
		$this->load->view('dashboard/index',$data);
	}

	public function login(){
		$msg = $this->admin_model->authenticate_user($this->input->post('email'),$this->input->post('password'));
    if($msg == SUCCESS){
				$this->load->view('dashboard/home');
    }else{
			$data['msgs'] = array("msg"=>$msg);
	    $this->load->view('dashboard/index',$data);
    }
	}

  public function logout(){
    $this->session->unset_userdata('user');
		$data['msgs'] = array("msg"=>"none");
    $this->load->view('dashboard/index',$data);
	}

	public function forgot_password(){
		$msg = $this->admin_model->forgot_password($this->input->post('email'));
		$data['msgs'] = array("msg"=>$msg);
		$this->load->view('dashboard/index',$data);
	}

	public function forgot(){
		$this->load->view('dashboard/forgot_password');
	}

	public function changePassword(){
		$this->load->view('dashboard/change_password');
	}

	public function reset_password(){
		echo $this->admin_model->reset_password($this->input->post('pass'));
	}

	public function home(){
		$this->load->view('dashboard/home');
	}

	public function catalog(){
		$data['clist'] = $this->admin_model->catalog_list();
		$data['msgs'] = array("msg"=>"none");
		$this->load->view('dashboard/catalog',$data);
	}

  public function add_catalog(){
		echo $this->admin_model->add_catalog($this->input->post('catalog'));
	}

	public function delete_catalog($catalog_id){
		$msg = $this->admin_model->delete_catalog($catalog_id);
		$data['clist'] = $this->admin_model->catalog_list();
		$data['msgs'] = array("msg"=>$msg);
		$this->load->view('dashboard/catalog',$data);
	}

	public function sub_catalog(){
		$data['clist'] = $this->admin_model->sub_catalog_list();
		$data['catalog_combo'] = $this->admin_model->catalog_combo();
		$data['msgs'] = array("msg"=>"none");
		$this->load->view('dashboard/sub_catalog',$data);
	}

  public function add_sub_catalog(){
		echo $this->admin_model->add_sub_catalog($this->input->post('sub_catalog'), $this->input->post('catalog_id'),
		$this->input->post('sub_catalog_arabic'));
	}

	public function delete_sub_catalog($sub_catalog_id){
		$msg = $this->admin_model->delete_sub_catalog($sub_catalog_id);
		$data['clist'] = $this->admin_model->sub_catalog_list();
		$data['catalog_combo'] = $this->admin_model->catalog_combo();
		$data['msgs'] = array("msg"=>$msg);
		$this->load->view('dashboard/sub_catalog',$data);
	}

	public function get_sub_catalog(){
		echo $this->admin_model->get_sub_catalog($this->input->get('cid'));
	}

	public function add_product(){
		$data['catalog_combo'] = $this->admin_model->catalog_combo();
		$data['msgs'] = array("msg"=>"none");
		$this->load->view('dashboard/add_product',$data);
	}

	public function save_product(){
		$himg  = ""; $htemp = "";
		if($_FILES['other']['name'] !="" && $_FILES['other']['name'] != NULL){
			$himg = mt_rand() . $_FILES['other']['name'];
			$htemp = $_FILES['other']['tmp_name'];
		}
		$data['catalog_combo'] = $this->admin_model->catalog_combo();
		$msg = $this->admin_model->save_product($this->input->post('catalog_id'), $this->input->post('sub_catalog_id'),
		$this->input->post('product_name'), $this->input->post('price'), $_FILES['pimg']['name'], $_FILES['pimg']['tmp_name'],
		$himg, $htemp, $this->input->post('pic_day'), $this->input->post('deal_day'), $this->input->post('region'));
		$data['msgs'] = array("msg"=>$msg);
		$this->load->view('dashboard/add_product',$data);
	}


	public function product_list(){
		$data['msgs'] = array('msg'=>'none');
		$data['plist'] = $this->admin_model->product_list();
		$this->load->view('dashboard/product_list',$data);
	}

	public function delete_all_product(){
		$msg = $this->admin_model->delete_all_product();
		$data['msgs'] = array('msg'=>$msg);
		$data['plist'] = $this->admin_model->product_list();
		$this->load->view('dashboard/product_list',$data);
	}

	public function delete_product($product_id){
		$msg = $this->admin_model->delete_product($product_id);
		$data['msgs'] = array('msg'=>$msg);
		$data['plist'] = $this->admin_model->product_list();
		$this->load->view('dashboard/product_list',$data);
	}

	public function product_detail($product_id){
		$data['msgs'] = array('msg'=>'none');
		$data['catalog_combo'] = $this->admin_model->catalog_combo();
		$data['sub_catalog_combo'] = $this->admin_model->sub_catalog_combo();
		$data['plist'] = $this->admin_model->product_detail($product_id);
		$this->load->view('dashboard/product_detail',$data);
	}

	public function update_product(){
		$himg  = ""; $htemp = ""; $pimg_name = ""; $ptemp = "";
		if($_FILES['other']['name'] !="" && $_FILES['other']['name'] != NULL){
			$himg = mt_rand() . $_FILES['other']['name'];
			$htemp = $_FILES['other']['tmp_name'];
		}
		if($_FILES['pimg']['name'] !="" && $_FILES['pimg']['name'] != NULL){
			$pimg_name = mt_rand() . $_FILES['pimg']['name'];
			$ptemp = $_FILES['pimg']['tmp_name'];
		}
		$msg = $this->admin_model->update_product($this->input->post('product_id'), $this->input->post('product_name'),
		$this->input->post('catalog_id'), $this->input->post('sub_catalog_id'), $this->input->post('price'),
		$pimg_name, $ptemp, $himg, $htemp, $this->input->post('pic_day'), $this->input->post('deal_day'), $this->input->post('region'));
		$data['msgs'] = array('msg'=>$msg);
		$data['catalog_combo'] = $this->admin_model->catalog_combo();
		$data['sub_catalog_combo'] = $this->admin_model->sub_catalog_combo();
		$data['plist'] = $this->admin_model->product_detail($this->input->post('product_id'));
		$this->load->view('dashboard/product_detail',$data);
	}

	public function animations(){
		$data['msgs'] = array('msg'=>'none');
		$data['plist'] = $this->admin_model->animations();
		$this->load->view('dashboard/animations_list',$data);
	}

	public function delete_all_animation(){
		$msg = $this->admin_model->delete_all_animation();
		$data['msgs'] = array('msg'=>$msg);
		$data['plist'] = $this->admin_model->animations();
		$this->load->view('dashboard/animations_list',$data);
	}

	public function delete_animation_product($product_id){
		$msg = $this->admin_model->delete_product($product_id);
		$data['msgs'] = array('msg'=>$msg);
		$data['plist'] = $this->admin_model->animations();
		$this->load->view('dashboard/animations_list',$data);
	}

	public function images(){
		$data['msgs'] = array('msg'=>'none');
		$data['plist'] = $this->admin_model->images();
		$this->load->view('dashboard/images_list',$data);
	}

	public function delete_all_images(){
		$msg = $this->admin_model->delete_all_images();
		$data['msgs'] = array('msg'=>$msg);
		$data['plist'] = $this->admin_model->images();
		$this->load->view('dashboard/images_list',$data);
	}

	public function delete_image_product($product_id){
		$msg = $this->admin_model->delete_product($product_id);
		$data['msgs'] = array('msg'=>$msg);
		$data['plist'] = $this->admin_model->images();
		$this->load->view('dashboard/images_list',$data);
	}

	public function videos(){
		$data['msgs'] = array('msg'=>'none');
		$data['plist'] = $this->admin_model->videos();
		$this->load->view('dashboard/videos_list',$data);
	}

	public function delete_all_videos(){
		$msg = $this->admin_model->delete_all_videos();
		$data['msgs'] = array('msg'=>$msg);
		$data['plist'] = $this->admin_model->videos();
		$this->load->view('dashboard/videos_list',$data);
	}

	public function delete_video_product($product_id){
		$msg = $this->admin_model->delete_product($product_id);
		$data['msgs'] = array('msg'=>$msg);
		$data['plist'] = $this->admin_model->videos();
		$this->load->view('dashboard/videos_list',$data);
	}

	public function games(){
		$data['msgs'] = array('msg'=>'none');
		$data['plist'] = $this->admin_model->games();
		$this->load->view('dashboard/games_list',$data);
	}

	public function delete_all_games(){
		$msg = $this->admin_model->delete_all_games();
		$data['msgs'] = array('msg'=>$msg);
		$data['plist'] = $this->admin_model->games();
		$this->load->view('dashboard/games_list',$data);
	}

	public function delete_game_product($product_id){
		$msg = $this->admin_model->delete_product($product_id);
		$data['msgs'] = array('msg'=>$msg);
		$data['plist'] = $this->admin_model->games();
		$this->load->view('dashboard/games_list',$data);
	}

	public function music(){
		$data['msgs'] = array('msg'=>'none');
		$data['plist'] = $this->admin_model->music();
		$this->load->view('dashboard/music_list',$data);
	}

	public function delete_all_music(){
		$msg = $this->admin_model->delete_all_music();
		$data['msgs'] = array('msg'=>$msg);
		$data['plist'] = $this->admin_model->music();
		$this->load->view('dashboard/music_list',$data);
	}

	public function delete_music_product($product_id){
		$msg = $this->admin_model->delete_product($product_id);
		$data['msgs'] = array('msg'=>$msg);
		$data['plist'] = $this->admin_model->music();
		$this->load->view('dashboard/music_list',$data);
	}

	public function pic_of_the_day(){
		$data['msgs'] = array('msg'=>'none');
		$data['plist'] = $this->admin_model->pic_of_the_day();
		$this->load->view('dashboard/pic_of_the_day_list',$data);
	}

	public function remove_all_pic_of_the_day(){
		$msg = $this->admin_model->remove_all_pic_of_the_day();
		$data['msgs'] = array('msg'=>$msg);
		$data['plist'] = $this->admin_model->pic_of_the_day();
		$this->load->view('dashboard/pic_of_the_day_list',$data);
	}

	public function remove_pic_of_the_day($product_id){
		$msg = $this->admin_model->remove_pic_of_the_day($product_id);
		$data['msgs'] = array('msg'=>$msg);
		$data['plist'] = $this->admin_model->pic_of_the_day();
		$this->load->view('dashboard/pic_of_the_day_list',$data);
	}

	public function delete_all_pic_of_the_day(){
		$msg = $this->admin_model->delete_all_pic_of_the_day();
		$data['msgs'] = array('msg'=>$msg);
		$data['plist'] = $this->admin_model->pic_of_the_day();
		$this->load->view('dashboard/pic_of_the_day_list',$data);
	}

	public function delete_pic_of_the_day($product_id){
		$msg = $this->admin_model->delete_product($product_id);
		$data['msgs'] = array('msg'=>$msg);
		$data['plist'] = $this->admin_model->pic_of_the_day();
		$this->load->view('dashboard/pic_of_the_day_list',$data);
	}

	public function deal_of_the_day(){
		$data['msgs'] = array('msg'=>'none');
		$data['plist'] = $this->admin_model->deal_of_the_day();
		$this->load->view('dashboard/deal_of_the_day_list',$data);
	}

	public function remove_all_deal_of_the_day(){
		$msg = $this->admin_model->remove_all_deal_of_the_day();
		$data['msgs'] = array('msg'=>$msg);
		$data['plist'] = $this->admin_model->deal_of_the_day();
		$this->load->view('dashboard/deal_of_the_day_list',$data);
	}

	public function remove_deal_of_the_day($product_id){
		$msg = $this->admin_model->remove_deal_of_the_day($product_id);
		$data['msgs'] = array('msg'=>$msg);
		$data['plist'] = $this->admin_model->deal_of_the_day();
		$this->load->view('dashboard/deal_of_the_day_list',$data);
	}

	public function delete_all_deal_of_the_day(){
		$msg = $this->admin_model->delete_all_deal_of_the_day();
		$data['msgs'] = array('msg'=>$msg);
		$data['plist'] = $this->admin_model->deal_of_the_day();
		$this->load->view('dashboard/deal_of_the_day_list',$data);
	}

	public function delete_deal_of_the_day($product_id){
		$msg = $this->admin_model->delete_product($product_id);
		$data['msgs'] = array('msg'=>$msg);
		$data['plist'] = $this->admin_model->deal_of_the_day();
		$this->load->view('dashboard/deal_of_the_day_list',$data);
	}

	public function bulk_upload(){
		$data["msgs"] = array("msg"=>"none");
		$this->load->view('dashboard/bulk_upload',$data);
	}

	public function upload_file(){
		$this->load->model('admin_model');
		$fname  = "";
		$ftemp = "";
		if($_FILES['fname']['name'] !="" && $_FILES['fname']['name'] != NULL){
			$fname = $_FILES['fname']['name'];
			$ftemp = $_FILES['fname']['tmp_name'];
		}

		$msg = $this->admin_model->upload_file($fname, $ftemp);
		$data['msgs'] = array("msg"=>$msg);
		$this->load->view('dashboard/bulk_upload',$data);
	}

}
?>
