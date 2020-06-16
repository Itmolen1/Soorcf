<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Property_type_model extends CI_Model
{
    function property_typeListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.pt_id, BaseTbl.pt_name, BaseTbl.pt_created_at');
        $this->db->from('prorty_type as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.pt_name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    
    function property_typeListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.pt_id, BaseTbl.pt_name, BaseTbl.pt_created_at');
        $this->db->from('prorty_type as BaseTbl');
        if(!empty($searchText)) {
           $likeCriteria = "(BaseTbl.pt_name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->order_by('BaseTbl.pt_id', 'DESC');
        $this->db->limit($page, $segment);
        $this->db->where('BaseTbl.isDeleted', 0);
        $query = $this->db->get();        
        $result = $query->result();        
        return $result;
    }
    
    function add_new_property_type($servicesInfo)
    {
        $this->db->trans_start();
        $this->db->insert('prorty_type', $servicesInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    
    function get_property_type_info($id)
    {
        $this->db->select('BaseTbl.pt_id, BaseTbl.pt_name, BaseTbl.pt_created_at, BaseTbl.isDeleted');
        $this->db->from('prorty_type as BaseTbl');
        $this->db->where('BaseTbl.pt_id', $id);
        $this->db->where('BaseTbl.isDeleted',0);
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
    
    function edit_property_type($val)
    {
        $this->db->set('pt_name',$val['pt_name']);
        $this->db->where('pt_id', $val['pt_id']);
        $this->db->update('prorty_type');
        return TRUE;
    }
    
    function delete_property_type($id)
    {
        $this->db->set('isDeleted',1);
        $this->db->where('pt_id', $id);
        $this->db->update('prorty_type');
        return $this->db->affected_rows();
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