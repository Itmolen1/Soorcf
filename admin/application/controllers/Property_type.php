<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Property_type extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('property_type_model');
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
  
    function property_type_listing()
    {
        $searchText = $this->security->xss_clean($this->input->post('searchText'));
        $data['searchText'] = $searchText;
        $this->load->library('pagination');
        $count = $this->property_type_model->property_typeListingCount($searchText);
		$returns = $this->paginationCompress ( "property_type_listing/", $count, 10 );
		//echo "<pre>";print_r($returns);die;
        $data['servicesRecords'] = $this->property_type_model->property_typeListing($searchText, $returns["page"], $returns["segment"]);
        $this->global['pageTitle'] = APP_NAME.' : Property Type Listing';
        $this->loadViews("property_type_list_view", $this->global, $data, NULL);        
    }
   
    function add_new_property_type()
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
                $pt_name=$this->security->xss_clean($this->input->post('pt_name'));
               	$vals = array('pt_name'=>$pt_name,'pt_created_at'=>date('Y-m-d H:i:s'));
                $result = $this->property_type_model->add_new_property_type($vals);
                redirect('property_type_listing');
            }
            else
            {
	            $this->load->model('property_type_model');
	            $data['action']='add_new_property_type';
	            $this->global['pageTitle'] =APP_NAME. ' : Add New Property Type';
	            $this->loadViews("add_new_property_view", $this->global, $data, NULL);
	        }
        }
    }

    function edit_property_type()
    {
            if($this->input->post())
            {
                $value=$this->input->post();
                $result = $this->property_type_model->edit_property_type($value);
                redirect('property_type_listing');
            }
            else
            {
                $last = $this->uri->total_segments();
                $id = $this->uri->segment($last);
                $data['list'] = $this->property_type_model->get_property_type_info($id);
                $data['action']='edit_property_type';
                $this->global['pageTitle'] = APP_NAME.' : Edit Property Type';
                $this->loadViews("add_new_property_view", $this->global, $data, NULL);
            }           
    }    
    
    function delete_property_type()
    {
            $last = $this->uri->total_segments();
            $record_num = $this->uri->segment($last);
            $result = $this->property_type_model->delete_property_type($record_num);
            redirect('property_type_listing');
    }    
 
    function pageNotFound()
    {
        $this->global['pageTitle'] = APP_NAME.' : 404 - Page Not Found';
        $this->loadViews("404", $this->global, NULL, NULL);
    }   
}
?>