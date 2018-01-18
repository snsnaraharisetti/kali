<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wapservices extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
		$this->load->model('public_model');
  }

  public function gamesServices(){
    $lable1 = $this->input->get('lable1');
    $label2 = $this->input->get('label2');
    $subscription_id = $this->input->get('subscription_id');
    $rebill_id = $this->input->get('rebill_id');
    $stream_id = $this->input->get('stream_id');
    $link_id = $this->input->get('link_id');
    $operator_id = $this->input->get('operator_id');
    $landing_id = $this->input->get('landing_id');
    $link_name = $this->input->get('link_name');
    $link_hash = $this->input->get('link_hash');
    $action_time = $this->input->get('action_time');
    $action_date = $this->input->get('action_date');
    $notice_time = $this->input->get('notice_time');
    $notice_date = $this->input->get('notice_date');
    $sum_rub = $this->input->get('sum_rub');
    $sum_eur = $this->input->get('sum_eur');
    $sum_usd = $this->input->get('sum_usd');
    $type = $this->input->get('type');
    $country = $this->input->get('country');
    $adn=$this->input->get('adn');
    $transaction_id=$this->input->get('transaction_id');
    echo "lable1=".$lable1."-lable2=".$lable2."-subscription_id=".$subscription_id."-country=".$country."-adn=".$adn.
    "-rebill_id=".$rebill_id."-stream_id=".$stream_id."-link_id=".$link_id."-operator_id=".$operator_id.
    "-landing_id=".$landing_id."-link_name=".$link_name."-link_hash=".$link_hash."-action_time=".$action_time.
    "-action_date=".$action_date."-notice_time=".$notice_time."-notice_date=".$notice_date."-sum_rub=".$sum_rub.
    "-sum_eur=".$sum_eur."-sum_usd=".$sum_usd."-type=".$type."-transaction_id=".$transaction_id;
    // $this->public_model->gamesServices($country, $adsNetwork);
    // $data['sub_catalog'] = $this->public_model->sub_catalog_combo(4);
    // $data['plist'] = $this->public_model->games();
    // $this->load->view('games',$data);

  }
}
?>
