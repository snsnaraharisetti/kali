<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wap extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
		$this->load->model('public_model');
  }

  public function index()
	{
    $data['picday'] = $this->public_model->get_pic_of_the_day();
    $data['dealday'] = $this->public_model->get_deal_of_the_day();
    $this->load->view('index',$data);
  }

  public function home()
  {
    $data['picday'] = $this->public_model->get_pic_of_the_day();
    $data['dealday'] = $this->public_model->get_deal_of_the_day();
    $this->load->view('index',$data);
  }

	public function about_us()
	{
    $this->load->view('aboutus');
  }

  public function contact_us()
	{
    $this->load->view('contactus');
  }

  public function send_enquiry()
	{
		$this->load->model('public_model');
		$ip = $this->input->ip_address();
		$name = $this->input->post('name');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$subject = $this->input->post('subject');
		$imsg = $this->input->post('message');

		if(trim($name) == '' || $name == NULL){
      echo "Please enter name";
    }else if(trim($email) == '' || $email == NULL){
      echo "Please enter email";
    }else if(trim($phone) == '' || $phone == NULL){
      echo "Please enter phone number";
    }else if(trim($subject) == '' || $subject == NULL){
      echo "Please enter subject";
    }else if(trim($imsg) == '' || $imsg == NULL){
      echo "Please enter message";
    }else{
		$msg = $this->public_model->send_enquiry($name, $email, $phone, $subject, $imsg, $ip);
		$msg = $this->public_model->send_enquiry_ack($this->input->post('name'), $this->input->post('email'));
		echo $msg;
		}
	}

  public function disclaimer()
	{
    $this->load->view('disclaimer');
  }

  public function images()
	{
    $data['sub_catalog'] = $this->public_model->sub_catalog_combo(1);
    $data['plist'] = $this->public_model->images();
    $this->load->view('images',$data);
  }

  public function videos()
	{
    $data['sub_catalog'] = $this->public_model->sub_catalog_combo(2);
    $data['plist'] = $this->public_model->videos();
    $this->load->view('videos',$data);
  }

  public function animations()
	{
    $data['sub_catalog'] = $this->public_model->sub_catalog_combo(3);
    $data['plist'] = $this->public_model->animations();
    $this->load->view('animations',$data);
  }

  public function games()
	{
    $data['sub_catalog'] = $this->public_model->sub_catalog_combo(4);
    $data['plist'] = $this->public_model->games();
    $this->load->view('games',$data);
  }

  public function music()
	{
    $data['sub_catalog'] = $this->public_model->sub_catalog_combo(5);
    $data['plist'] = $this->public_model->music();
    $this->load->view('music',$data);
  }

  public function pic_of_the_day()
	{
    $data['plist'] = $this->public_model->get_pic_of_the_day();
    $this->load->view('pic_of_the_day',$data);
  }

  public function deal_of_the_day()
	{
    $data['plist'] = $this->public_model->get_deal_of_the_day();
    $this->load->view('deal_of_the_day',$data);
  }

  public function subscription()
	{
    $this->load->view('subscription');
  }

  public function lang_switch(){
    $this->session->set_userdata('lang', $this->input->post('lang'));
  }

  public function image_filter(){
    echo $this->public_model->image_filter($this->input->post('sid'));
  }

  public function animation_filter(){
    echo $this->public_model->animation_filter($this->input->post('sid'));
  }

  public function games_filter(){
    echo $this->public_model->games_filter($this->input->post('sid'));
  }

  public function video_filter(){
    echo $this->public_model->video_filter($this->input->post('sid'));
  }

  public function music_filter(){
    echo $this->public_model->music_filter($this->input->post('sid'));
  }

}

?>
