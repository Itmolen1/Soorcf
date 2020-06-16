<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

include('phpqrcode/qrlib.php');


class Amc_model extends CI_Model
{
    function amc_listing_count($searchText = '')
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('tbl_amc as BaseTbl');
        //$this->db->join('tbl_vendor as Vendor', 'Vendor.vendor_id = BaseTbl.amc_venodr_id','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.amc_party_name  LIKE '%".$searchText."%'
                            OR  BaseTbl.amc_party_mobile  LIKE '%".$searchText."%'
                            OR  BaseTbl.amc_party_email  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $query = $this->db->get();        
        return $query->num_rows();
    }

    function amc_listing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('tbl_amc as BaseTbl');
        //$this->db->join('tbl_vendor as Vendor', 'Vendor.vendor_id = BaseTbl.amc_venodr_id','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.amc_party_name  LIKE '%".$searchText."%'
                            OR  BaseTbl.amc_party_mobile  LIKE '%".$searchText."%'
                            OR  BaseTbl.amc_party_email  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        //$this->db->where('BaseTbl.roleId !=', 1);
        $this->db->order_by('BaseTbl.amc_id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function get_amc_content()
    {   
        $this->db->select('amc_content');     
        $query=$this->db->get('tbl_amc_content');
        return $query->row_array();
    }

    function get_vendor_list()
    {
        $query = $this->db->get('tbl_vendor');
        $result = $query->result_array();        
        return $result;
    }

    function get_property_list()
    {
        $this->db->where('isDeleted',0);
        $query = $this->db->get('prorty_type');
        $result = $query->result_array();        
        return $result;
    }

    function get_unit_list()
    {
        $query = $this->db->get('tbl_item_unit');
        $result = $query->result_array();        
        return $result;
    }

    function get_amc_no()
    {
        $this->db->order_by('amc_id', 'DESC');
        $query = $this->db->get('tbl_amc', 1 );
        $result=$query->row_array();
        if(empty($result))
        {
            return 'AMC-'.str_pad(0+1,4,'0',STR_PAD_LEFT);
        }
        else
        {
            return 'AMC-'.str_pad($result['amc_id']+1, 4, '0', STR_PAD_LEFT);
        }
    }

    function add_new_amc($val,$sid)
    {
        $data=array(
        'amc_no'=>$val['amc_no'],
        'amc_party_name'=>$val['amc_party_name'],
        'amc_party_mobile'=>$val['amc_party_mobile'],
        'amc_party_email'=>$val['amc_party_email'],
        'amc_party_trn'=>$val['amc_party_trn'],
        'amc_property_no'=>$val['amc_property_no'],
        'amc_property_address'=>$val['amc_property_address'],
        'amc_amount'=>$val['amc_amount'],
        'amc_discount'=>$val['amc_discount'],
        'amc_start_date'=>$val['amc_start_date'],
        'amc_end_date'=>$val['amc_end_date'],
        'amc_grand_total'=>$val['amc_grand_total'],
        'amc_image'=>$val['amc_image'],
        'isDeleted'=>0,
        'created_at'=>date('Y-m-d H:i:s'),
        'updated_at'=>date('Y-m-d H:i:s'),
        'amc_session_id'=>$sid
       );
        $this->db->insert('tbl_amc', $data); 
        $lid=$this->db->insert_id();
        //echo $this->db->last_query();die;
        return $lid;
    }

    function amc_add_payment_record($val)
    {
        $data=array(
        'po_payment_record_po_id'=>$val['po_payment_record_po_id'],
        'po_payment_record_date'=>$val['po_payment_record_date'],
        'po_payment_record_invoice_no'=>$val['amc_bill_no'],
        'po_payment_record_payment_no'=>$val['po_payment_record_payment_no'],
        'po_payment_record_type'=>$val['po_payment_record_type'],
        'po_payment_record_cheque_no'=>$val['po_payment_record_cheque_no'],
        'po_payment_record_bank'=>$val['po_payment_record_bank'],
        'po_payment_record_total_amt'=>$val['po_payment_record_total_amt'],
        'po_payment_record_paid_amt'=>$val['po_payment_record_paid_amt'],
        'po_payment_record_due_amt'=>$val['po_payment_record_due_amt'],
        'po_payment_record_note'=>$val['po_payment_record_note'],
        'po_payment_record_created_at'=>date('Y-m-d H:i:s'),
        'po_payment_record_updated_at'=>date('Y-m-d H:i:s')
       );
        $this->db->insert('tbl_po_payment_record', $data); 
        //$lid=$this->db->insert_id();

        $this->db->set('amc_due_amt',($val['amc_due_amt']-$val['po_payment_record_due_amt']));
        $this->db->set('amc_paid_amt',($val['po_payment_record_paid_amt']+$val['po_payment_record_due_amt']));
        $this->db->where('amc_id',$val['po_payment_record_po_id']); 
        $lid=$this->db->update('tbl_amc');
        //echo $this->db->last_query();die;
        return TRUE;
    }

    function update_amc($val)
    {
        $this->db->set('amc_image',$val['amc_image']);
        $this->db->set('amc_party_name',$val['amc_party_name']);
        $this->db->set('amc_party_mobile',$val['amc_party_mobile']);
        $this->db->set('amc_party_email',$val['amc_party_email']);
        $this->db->set('amc_party_trn',$val['amc_party_trn']);
        $this->db->set('amc_property_no',$val['amc_property_no']);
        $this->db->set('amc_property_address',$val['amc_property_address']);
        $this->db->set('amc_amount',$val['amc_amount']);
        $this->db->set('amc_discount',$val['amc_discount']);
        $this->db->set('amc_start_date',$val['amc_start_date']);
        $this->db->set('amc_end_date',$val['amc_end_date']);
        $this->db->set('updated_at',date('Y-m-d H:i:s'));
        $this->db->set('amc_grand_total',$val['amc_grand_total']);
        //$this->db->set('amc_image',$val['amc_image']);
        $this->db->where('amc_id',$val['amc_id']); 
        $lid=$this->db->update('tbl_amc');
        //echo $this->db->last_query();die;
        return $lid;
    }

    function insert_session_to_boi($records,$acmid)
    {
        if(!empty($records))
        {
            for($i=0;$i<count($records);$i++)
            {
                $value=array(
                    'amc_id'=>$acmid,
                    'amc_pt_id'=>$records[$i]['amc_pt_id_session'],
                    'amc_boi_detail'=>$records[$i]['amc_boi_detail_session'],
                    'amc_boi_qty'=>$records[$i]['amc_boi_qty_session'],
                    'amc_boi_ac_qty'=>$records[$i]['amc_boi_ac_qty_session'],
                    'amc_session_id'=>$records[$i]['amc_session_id'],
                    'amc_boi_created_at'=>$records[$i]['amc_boi_created_at'],
                    'amc_boi_updated_at'=>$records[$i]['amc_boi_updated_at']
                );
                $this->db->insert('tbl_amc_boi', $value);
                $this->db->where('amc_session_id', $records[$i]['amc_session_id']);
                $this->db->delete('tbl_amc_boi_session'); 
            }
        }
    }

    function add_amc_boi_session($val)
    {
        $data=array(
        'amc_pt_id_session'=>$val['amc_pt_id_session'],
        'amc_session_id'=>$this->session->userdata['amc_item']['amc_session_id'],
        'amc_boi_detail_session'=>$val['amc_boi_detail_session'],
        'amc_boi_qty_session'=>$val['amc_boi_qty_session'],
        'amc_boi_ac_qty_session'=>$val['amc_boi_ac_qty_session'],
        'amc_boi_created_at'=>date('Y-m-d H:i:s'),
        'amc_boi_updated_at'=>date('Y-m-d H:i:s')
       );
        $this->db->insert('tbl_amc_boi_session', $data); 
        $lid=$this->db->insert_id();
        

        $this->db->select('amc_session_id');
        $this->db->from('tbl_amc_boi_session');
        $this->db->where('amc_boi_session_id',$lid);
        $query = $this->db->get();
        return $query->row_array();
    }

    function delete_amc_boi_session($id)
    {
        $this->db->where('amc_boi_session_id',$id); 
        $lid=$this->db->delete('tbl_amc_boi_session');
        return TRUE;
    }

    function get_amc_seesion_id_by_session_id($record_num)
    {
        $this->db->select('amc_session_id');
        $query=$this->db->get_where('tbl_amc_boi_session',array('amc_boi_session_id'=>$record_num));
        //echo $this->db->last_query();die;
        $session_id=$query->row_array();
        return $session_id['amc_session_id'];
    }

    function get_remaining($session_id)
    {
        $query=$this->db->get_where('tbl_po_boi_session',array('po_boi_po_id_session'=>$session_id));
        return $query->result_array();        
    }

    function get_property_by_session_id($amc_session_id)
    {
        $this->db->select('BaseTbl.*,p.*');
        $this->db->from('tbl_amc_boi_session as BaseTbl');
        $this->db->join('prorty_type as p', 'p.pt_id = BaseTbl.amc_pt_id_session','left');
        $this->db->where('BaseTbl.amc_session_id',$amc_session_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_by_session_id($sid)
    {
        $this->db->where('amc_session_id',$sid);
        $query=$this->db->get('tbl_amc_boi_session');
        $result=$query->result_array();
        return $result;
    }

    function get_all_boi_by_poid($record_num)
    {
        $this->db->where('amc_id',$record_num);
        $query=$this->db->get('tbl_amc_boi');
        $result=$query->result_array();
        return $result;
    }

    function inset_boi_to_session($records)
    {
        if(!empty($records))
        {
            for($i=0;$i<count($records);$i++)
            {
                $value=array(
                    'amc_id'=>$records[$i]['amc_id'],
                    'amc_pt_id_session'=>$records[$i]['amc_pt_id'],
                    'amc_boi_detail_session'=>$records[$i]['amc_boi_detail'],
                    'amc_boi_qty_session'=>$records[$i]['amc_boi_qty'],
                    'amc_boi_ac_qty_session'=>$records[$i]['amc_boi_ac_qty'],
                    'amc_session_id'=>$records[$i]['amc_session_id'],
                    'amc_id'=>$records[$i]['amc_id'],
                    'amc_boi_created_at'=>$records[$i]['amc_boi_created_at'],
                    'amc_boi_updated_at'=>$records[$i]['amc_boi_updated_at']
                );
                $this->db->insert('tbl_amc_boi_session', $value);
                $this->db->where('amc_id', $records[$i]['amc_id']);
                $this->db->delete('tbl_amc_boi'); 
            }
        }
    }

    function get_po_by_id($poid)
    {
        $this->db->where('amc_id',$poid);
        $query=$this->db->get('tbl_amc');
        $result=$query->row_array();
        return $result;
    }

    function get_po_pdf_data($poid)
    {
        $this->db->select('BaseTbl.*,vendor.*');
        $this->db->from('tbl_amc as BaseTbl');
        $this->db->join('tbl_vendor as vendor', 'vendor.vendor_id = BaseTbl.amc_venodr_id','left');
        //$this->db->join('tbl_item_unit as Unit', 'Unit.item_unit_id = BaseTbl.item_unit_id_session','left');
        $this->db->where('BaseTbl.amc_id',$poid);
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        return $query->row_array();
    }

    function get_all_boi_by_poid_pdf($poid)
    {
        $this->db->select('BaseTbl.*,item.*,Unit.*');
        $this->db->from('tbl_po_boi as BaseTbl');
        $this->db->join('tbl_item_master as item', 'item.item_master_id = BaseTbl.item_master_id','left');
        $this->db->join('tbl_item_unit as Unit', 'Unit.item_unit_id = BaseTbl.item_unit_id','left');
        $this->db->where('BaseTbl.po_boi_po_id',$poid);
        $query = $this->db->get();
        return $query->result_array();
    }

    function delete_amc($id)
    {
        /*1.set deleted child record in po item table*/
        // $this->db->set('isDeleted',1);
        // $this->db->where('po_boi_po_id',$id); 
        // $this->db->update('tbl_po_boi');
        /*2.set po parent to deleted*/
        $this->db->set('isDeleted',1);
        $this->db->where('amc_id',$id); 
        $lid=$this->db->update('tbl_amc');
        return $this->db->affected_rows();
    }

    function amc_get_payment_record_details($poid)
    {
        $this->db->select('BaseTbl.*,vendor.*');
        $this->db->from('tbl_amc as BaseTbl');
        $this->db->join('tbl_vendor as vendor', 'vendor.vendor_id = BaseTbl.amc_venodr_id','left');
        $this->db->where('BaseTbl.amc_id',$poid);
        $query = $this->db->get();
        return $query->row_array();
    }

    function genereate_qr($amc_id)
    {
        $this->db->select('amc_boi_id,amc_boi_ac_qty,amc_session_id,amc_id');
        $this->db->where('amc_id',$amc_id);
        $query=$this->db->get('tbl_amc_boi');
        $rows=$query->result_array();
        //echo "<pre>";print_r($rows);die;
        for($i=0;$i<count($rows);$i++)
        {
            for($j=0;$j<$rows[$i]['amc_boi_ac_qty'];$j++)
            {
                $qrhash=md5(uniqid('wfamc'.time()));
                $fileName = $qrhash.'.png';
                $dir='assets/amc/';
                $dburl=ADMIN_PATH.$dir.$fileName;
                QRcode::png($qrhash, FCPATH.$dir.$fileName);
                //echo $qrhash;die;
                $value=array(
                'amc_boi_id'=>$rows[$i]['amc_boi_id'],
                'amc_session_id'=>$rows[$i]['amc_session_id'],
                'amc_qr_hash'=>$qrhash,
                'amc_qr_url'=>$dburl,
                'created_at'=>date('Y-m-d H:i:s')
                );
                $this->db->insert('tbl_amc_ac_qr', $value);
            }            
        }
        $this->db->set('qr_status',1);
        $this->db->where('amc_id',$amc_id);
        $this->db->update('tbl_amc');
        return 1;
    }

    function get_all_qr_data($amc_id)
    {
        $this->db->select('amc_boi_id');
        $this->db->where('amc_id',$amc_id);
        $query=$this->db->get('tbl_amc_boi');
        $rows=$query->result_array();
        //echo "<pre>";print_r($rows);die;
        
        $ids=array_column($rows, 'amc_boi_id');
        $this->db->where_in('amc_boi_id',$ids);
        $q=$this->db->get('tbl_amc_ac_qr');
        $rec=$q->result_array();
        return $rec;
        //echo "<pre>";print_r($rec);die;
    }
}