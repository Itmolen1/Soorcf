<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class amc_content_model extends CI_Model
{
    function amc_contentListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.amc_content_id, BaseTbl.amc_content');
        $this->db->from('tbl_amc_content as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.amc_content  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();        
        return $query->num_rows();
    }
    
    function amc_contentListing($searchText = '', $page, $segment)
    {
         $this->db->select('BaseTbl.amc_content_id, BaseTbl.amc_content');
        $this->db->from('tbl_amc_content as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.amc_content  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->order_by('BaseTbl.amc_content_id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    function add_new_amc_content($servicesInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_amc_content', $servicesInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    
    function get_amc_content_info($id)
    {
         $this->db->select('BaseTbl.amc_content_id, BaseTbl.amc_content');
        $this->db->from('tbl_amc_content as BaseTbl');
        $this->db->where('amc_content_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    function get_all_services()
    {
        $this->db->select('service_id, service_name, created_at, updated_at');
        $this->db->from('tbl_services');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function edit_amc_content($val)
    {
        $this->db->set('amc_content',$val['amc_content']);
        $this->db->where('amc_content_id', $val['amc_content_id']);
        $this->db->update('tbl_amc_content');
        return TRUE;
    }
    
    function delete_amc_content($id)
    {
        $this->db->set('isDeleted',1);
        $this->db->where('amc_content_id', $id);
        $this->db->update('tbl_amc_content');
        return $this->db->affected_rows();
    }

    function getservicesInfoById($servicesId)
    {
        $this->db->select('servicesId, name, email, mobile, roleId');
        $this->db->from('tbl_services');
        $this->db->where('isDeleted', 0);
        $this->db->where('tbl_amc_content', $servicesId);
        $query = $this->db->get();
        
        return $query->row();
    }

    function getservicesInfoWithRole($servicesId)
    {
        $this->db->select('BaseTbl.servicesId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.roleId, Roles.role');
        $this->db->from('tbl_services as BaseTbl');
        $this->db->join('tbl_roles as Roles','Roles.roleId = BaseTbl.roleId');
        $this->db->where('BaseTbl.servicesId', $servicesId);
        $this->db->where('BaseTbl.isDeleted', 0);
        $query = $this->db->get();
        
        return $query->row();
    }

}

  