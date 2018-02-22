<?php

class Buyer extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->library(array('form_validation','pagination'));
    $this->load->helper(array('form', 'url'));
    $this->load->model(array('M_member','M_product','M_pagination', 'M_product_category', 'M_product_sub_category','M_quotation_detail'));
  }

  function buyer_account_view(){
    $id_buyer = $this->session->userdata('id_buyer');
    $get_member = $this->M_member->get_member("",0,$id_buyer);
    $data['user'] = $get_member->result();
    $get_product_category = $this->M_product_category->get_product_category();
		$get_product_sub_category = $this->M_product_sub_category->get_product_sub_category_all();
		$data_nav['product_category'] = $get_product_category->result();
		$data_nav['product_sub_category'] = $get_product_sub_category->result();
    if ($this->session->userdata('id_buyer')) {
			$id_buyer = $this->session->userdata('id_buyer');
			$get_unread_qutation_detail = $this->M_quotation_detail->get_unread_qutation_detail("",$id_buyer);
			$data_nav['unread_quotation_detail'] = $get_unread_qutation_detail->result();
			$data_nav['unread_quotation_detail_num_rows'] = $get_unread_qutation_detail->num_rows();
		}
    $head_data['page_title'] = "Dinilaku";
		$this->load->view('template/front/head_front',$head_data);
		$this->load->view('template/front/navigation', $data_nav);
    $this->load->view('private/buyer_account/buyer_account',$data);
    $this->load->view('template/front/foot_front');
  }
  public function edit_buyer_account(){
    $id_buyer = $this->session->userdata('id_buyer');
    $data = array(
      'FirstName' => $this->input->post('first_name'),
      'LastName' => $this->input->post('last_name'),
      'CompanyName' => $this->input->post('company_name'),
      'CompanyAddress' => $this->input->post('company_address'),
      'City' => $this->input->post('city'),
      'ZipCode' => $this->input->post('zip_code'),
      'Location' => $this->input->post('location'),
      'Phone' => $this->input->post('phone')
    );
    // print_r($data);exit();
    $this->M_member->edit_member($data,$id_buyer);
    redirect('Buyer/buyer_account_view');
  }


}

?>
