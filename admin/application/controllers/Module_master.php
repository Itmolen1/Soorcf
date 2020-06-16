<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Module_master extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('module_master_model');
        $this->isLoggedIn();
        $this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
        $this->output->set_header('Cache-Control: no-cache, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');
    }    
  
    public function index()
    {
        $this->global['pageTitle'] = APP_NAME.': Dashboard';
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }    
  
    function module_master_listing()
    {                
        $searchText = $this->security->xss_clean($this->input->post('searchText'));
        $data['searchText'] = $searchText;
        $this->load->library('pagination');
        $count = $this->module_master_model->module_masterListingCount($searchText);
        //echo "<pre>";print_r($count);die;
		$returns = $this->paginationCompress ( "module_master_listing/", $count, 10 );
		//echo "<pre>";print_r($returns);die;
        $data['servicesRecords'] = $this->module_master_model->module_masterListing($searchText, $returns["page"], $returns["segment"]);
        $this->global['pageTitle'] = APP_NAME.' : Sub services Listing';
        $this->loadViews("module_master_list_view", $this->global, $data, NULL);
    }
   
    function add_new_module_master()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
        	if($this->input->post())
            {
                $value=$this->input->post();
                $module_name=$this->security->xss_clean($this->input->post('module_name'));
                $module_lable=$this->security->xss_clean($this->input->post('module_lable'));
               	$vals = array('module_name'=>$module_name,'module_lable'=>$module_lable);
                //echo "<pre>";print_r($vals);die;
                $result = $this->module_master_model->add_new_module_master($vals);
                redirect('module_master_listing');
            }
            else
            {
	            $this->load->model('module_master_model');
	            $data['action']='add_new_module_master';
	            $this->global['pageTitle'] =APP_NAME. ' : Add New Item Unit';
	            $this->loadViews("add_new_module_master", $this->global, $data, NULL);
	        }
        }
    }

    function edit_module_master()
    {
            if($this->input->post())
            {
                $value=$this->input->post();
                //echo "<pre>";print_r($value);die;
                $result = $this->module_master_model->edit_module_master($value);
                redirect('module_master_listing');
            }
            else
            {
                $last = $this->uri->total_segments();
                $id = $this->uri->segment($last);
                $data['list'] = $this->module_master_model->get_module_master_info($id);
                $data['action']='edit_module_master';
                $this->global['pageTitle'] = APP_NAME.' : Edit Item Unit';
                //echo "<pre>";print_r($data);die;
                $this->loadViews("add_new_module_master", $this->global, $data, NULL);
            }           
    }    
    
    function delete_module_master()
    {
            $last = $this->uri->total_segments();
            $record_num = $this->uri->segment($last);
            $result = $this->module_master_model->delete_module_master($record_num);
            redirect('module_master_listing');
    }    
 
    function pageNotFound()
    {
        $this->global['pageTitle'] = APP_NAME.' : 404 - Page Not Found';
        $this->loadViews("404", $this->global, NULL, NULL);
    }   
}
?>