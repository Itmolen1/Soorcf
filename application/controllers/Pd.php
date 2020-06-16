<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pd extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('global_model');
    }

	public function index()
	{

		$last = $this->uri->total_segments();
        $record_num = $this->uri->segment($last-1);
        if(is_numeric($record_num))
        {
        	$pd=$this->global_model->get_product_detail_by_id($record_num);
        	if(!empty($pd))
        	{
        		$data['product']=$pd;
				//echo "<pre>";print_r($data['product']);die;
				$this->load->view('inc/header',$data);
				$this->load->view('product_detail_view',$data);
				$this->load->view('inc/footer',$data);
        	}
        	else
        	{
        		redirect('404_override');
        	}
        }
        else
        {
        	redirect('404_override');
        }
        $row=$this->global_model->get_service_id($record_num);


		// $data['services']=$this->global_model->get_service_list();
		// $data['slider']=$this->global_model->get_slider_list();
		// $this->load->view('inc/header');
		// $this->load->view('home',$data);
		// $this->load->view('inc/footer');
	}	

	public function View()
	{
		$last = $this->uri->total_segments();
        $record_num = $this->uri->segment($last);
        $row=$this->global_model->get_service_id($record_num);
        if(!empty($row))
        {
        	$data['service']=$row;
			$data['sub_services']=$this->global_model->get_sub_services($data['service']['service_id']);
			$this->load->view('inc/header');
			$this->load->view('service_detail_view',$data);
			$this->load->view('inc/footer');
        }
        else
        {
        	redirect('404_override');
        }   
	}

	public function privacy_policy()
	{
		$this->load->view('inc/header');
		$this->load->view('privacy_policy',null);
		$this->load->view('inc/footer');
	}
}
