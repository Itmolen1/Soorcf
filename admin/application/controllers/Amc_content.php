<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Amc_content extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('amc_content_model');
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
  
    function amc_content_listing()
    {
        $searchText = $this->security->xss_clean($this->input->post('searchText'));
        $data['searchText'] = $searchText;
        $this->load->library('pagination');
        $count = $this->amc_content_model->amc_contentListingCount($searchText);
        //echo "<pre>";print_r($count);die;
		$returns = $this->paginationCompress ( "amc_content_listing/", $count, 10 );
		//echo "<pre>";print_r($returns);die;
        $data['servicesRecords'] = $this->amc_content_model->amc_contentListing($searchText, $returns["page"], $returns["segment"]);
        $this->global['pageTitle'] = APP_NAME.' : Sub services Listing';
        $this->loadViews("amc_content_list_view", $this->global, $data, NULL);
    }
   
    function add_new_amc_content()
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
                $amc_content_name=$this->security->xss_clean($this->input->post('amc_content_name'));
               	$vals = array('amc_content_name'=>$amc_content_name,'amc_content_created_at'=>date('Y-m-d H:i:s'),'amc_content_updated_at'=>date('Y-m-d H:i:s'));
                //echo "<pre>";print_r($vals);die;
                $result = $this->amc_content_model->add_new_amc_content($vals);
                redirect('amc_content_listing');
            }
            else
            {

	            $this->load->model('amc_content_model');
	            $data['action']='add_new_amc_content';
	            $this->global['pageTitle'] =APP_NAME. ' : Add New Item Unit';
	            $this->loadViews("add_new_amc_content", $this->global, $data, NULL);
	        }
        }
    }

    function edit_amc_content()
    {
            if($this->input->post())
            {
                $value=$this->input->post();
                //echo "<pre>";print_r($value);die;
                $result = $this->amc_content_model->edit_amc_content($value);
                redirect('amc_content_listing');
            }
            else
            {
                $last = $this->uri->total_segments();
                $id = $this->uri->segment($last);
                $data['list'] = $this->amc_content_model->get_amc_content_info($id);
                $data['action']='edit_amc_content';
                $this->global['pageTitle'] = APP_NAME.' : Edit Item Unit';
                //echo "<pre>";print_r($data);die;
                $this->loadViews("add_new_amc_content", $this->global, $data, NULL);
            }           
    }    
    
    function delete_amc_content()
    {
            $last = $this->uri->total_segments();
            $record_num = $this->uri->segment($last);
            $result = $this->amc_content_model->delete_amc_content($record_num);
            redirect('amc_content_listing');
    }    
 
    function pageNotFound()
    {
        $this->global['pageTitle'] = APP_NAME.' : 404 - Page Not Found';
        $this->loadViews("404", $this->global, NULL, NULL);
    }   
}
?>