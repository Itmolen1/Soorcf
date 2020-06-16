<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Amc extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('amc_model');
        $this->isLoggedIn();
        $this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
        $this->output->set_header('Cache-Control: no-cache, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');   
    }

    public function index()
    {
        $this->global['pageTitle'] = APP_NAME.' : AMC Listing';
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }

    function amc_listing()
    {   
        //echo "<pre>";print_r($this->session->userdata['amc_item']);die;
        $searchText = $this->security->xss_clean($this->input->post('searchText'));
        $data['searchText'] = $searchText;
        $this->load->library('pagination');
        $count = $this->amc_model->amc_listing_count($searchText);
		$returns = $this->paginationCompress("amc_listing/", $count, 10 );
        $data['amc'] = $this->amc_model->amc_listing($searchText, $returns["page"], $returns["segment"]);
        //echo "<pre>";print_r($data);die;
        $this->global['pageTitle'] = APP_NAME.' : AMC Listing';
        $this->loadViews("amc_list_view", $this->global, $data, NULL);        
    }  

    function add_new_amc()
    {
        if($this->input->post())
        {
            $value=$this->input->post();
            $value['amc_image']='N.A.';
            //echo "<pre>";print_r($value['amc_image']['error']);die;
            if(isset($_FILES) && $_FILES['amc_image']['error']==0)
            {
                /*image upload*/
                $dir='assets/amc/';
                $n=pathinfo($_FILES['amc_image']['name']);
                $ex=$n['extension'];
                $uid=uniqid('amc_');
                $tfile=$dir.$uid.'.'.$ex;
                $img=array();
                $imageFileType = strtolower(pathinfo($_FILES['amc_image']['name'],PATHINFO_EXTENSION));   
                if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg")
                {
                    if ( move_uploaded_file($_FILES['amc_image']['tmp_name'],$tfile))
                    {
                        $img['amc_image']=ADMIN_PATH.$tfile;
                        $value['amc_image']=$img['amc_image'];
                    }
                    else
                    {
                        $this->add_new_amc();
                    }
                }
                /*image upload*/
            }
            /*1.get all records from session table and add all the data in boi table */
            $sid=$this->session->userdata['amc_item']['amc_session_id'];
            $acmid = $this->amc_model->add_new_amc($value,$sid);
            $all_session=$this->amc_model->get_all_by_session_id($sid);
            $this->amc_model->insert_session_to_boi($all_session,$acmid);
            /*1.get all records from session table and add all the data in boi table */
            if(isset($this->session->userdata['amc_item']['amc_session_id']))
            {
            	$this->session->unset_userdata('amc_item');
            }
            redirect('amc_listing');
        }
        else
        {
        	if(isset($this->session->userdata['amc_item']['amc_session_id']))
            {
            	$this->session->unset_userdata('amc_item');
            }
            $data['action']='add_new_amc';
            //$data['vendor']=$this->amc_model->get_vendor_list();
            $data['property_type']=$this->amc_model->get_property_list();
            //$data['unit']=$this->amc_model->get_unit_list();
            $data['amc_no']=$this->amc_model->get_amc_no();
            //echo "<pre>";print_r($data);die;
            $logindata = array('amc_session_id'=>uniqid('amc_'));
            $this->session->set_userdata('amc_item',$logindata);
            $this->global['pageTitle'] = APP_NAME.' : Add New Purchase Order';
            $this->loadViews("add_new_amc_view", $this->global, $data, NULL);
        }
    }

    function add_amc_boi_session()
    {
        if($this->input->post())
        {
            $value=$this->input->post();
            $result=$this->amc_model->add_amc_boi_session($value);
            $rows=$this->get_result($result['amc_session_id']);
            echo json_encode($rows);
        }
    }

    function edit_amc_boi_session()
    {
    	if($this->input->post())
    	{
    		$value=$this->input->post();
    		$finalresult=$this->get_result($value['session_id']);
    		echo json_encode($finalresult);
    	}
    }

    function delete_amc_boi_session()
    {
        if($this->input->post())
        {
            $record_num=$this->input->post();
            $get_session=$this->amc_model->get_amc_seesion_id_by_session_id($record_num['data']);
            $result=$this->amc_model->delete_amc_boi_session($record_num['data']);
            $finalresult=$this->get_result($get_session);
            echo json_encode($finalresult);
        }        
    }    

    function get_result($amc_session_id)
    {
        $result=$this->amc_model->get_property_by_session_id($amc_session_id);
        $finalresult='';
        $grandtotal=0.0;
        $total_ac=0;
        for($i=0;$i<count($result);$i++)
        {
            $finalresult.='<tr><td>'.($i+1).'</td><td>'.$result[$i]['pt_name'].'</td><td>'.$result[$i]['amc_boi_detail_session'].'</td><td>'.$result[$i]['amc_boi_qty_session'].'</td><td>'.$result[$i]['amc_boi_ac_qty_session'].'<a href="JavaScript:void(0);" id="'.$result[$i]['amc_boi_session_id'].'" class="btn btn-sm btn-danger deleteServices" style="float: right" onclick="return delete_amc_boi_session('.$result[$i]['amc_boi_session_id'].')">Delete</a></td></tr>';
            $grandtotal+=$result[$i]['amc_boi_qty_session'];
            $total_ac+=$result[$i]['amc_boi_ac_qty_session'];
        }
        $send=array('finalresult'=>$finalresult,'grandtotal'=>$grandtotal,'toal_ac'=>$total_ac);
        return $send;
    }
    
    function edit_amc()
    {
        if($this->input->post())
        {
        	$value=$this->input->post();

             /*Image upload*/
            if(isset($_FILES) && $_FILES['amc_image']['name']!='')
            {
                $dir='assets/amc/';
                $n=pathinfo($_FILES['amc_image']['name']);
                $ex=$n['extension'];
                $uid=uniqid('amc_');
                $tfile=$dir.$uid.'.'.$ex;
                $img=array();
                $imageFileType = strtolower(pathinfo($tfile,PATHINFO_EXTENSION));   
                if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg")
                {
                    if ( move_uploaded_file($_FILES['amc_image']['tmp_name'],$tfile))
                    {
                        $img['amc_image']=ADMIN_PATH.$tfile;
                    }
                    else
                    {
                        redirect('amc_listing','refresh');
                    }
                }
                $value['amc_image']=$img['amc_image'];
                if(isset($value['amc_image_old']))
                {
                    $un=str_replace(FRONT_PATH,'',$value['amc_image_old']);
                    $u=unlink($_SERVER['DOCUMENT_ROOT'].'/'.$un);
                }
            }
            else
            {
                $value['amc_image']='N.A.';
            }
            /*Image upload*/
        	//move session values to boi
        	$sid=$this->session->userdata['amc_item']['amc_session_id'];
            $all_session=$this->amc_model->get_all_by_session_id($sid);
            $this->amc_model->insert_session_to_boi($all_session,$value['amc_id']);
            $result = $this->amc_model->update_amc($value);
            if(isset($this->session->userdata['amc_item']['amc_session_id']))
            {
            	$this->session->unset_userdata('amc_item');
            }
            redirect('amc_listing');
        }
        else
        {
            if(isset($this->session->userdata['amc_item']['amc_session_id']))
            {
            	$this->session->unset_userdata('amc_item');
            }
            $last = $this->uri->total_segments();
            $record_num = $this->uri->segment($last);
            if(is_numeric($record_num))
            {
                $data['amc'] = $this->amc_model->get_po_by_id($record_num);
            }
            $data['boi']=$this->amc_model->get_all_boi_by_poid($record_num);
            if(empty($data['boi']))
            {
            	$logindata = array('amc_session_id'=>$data['amc']['amc_session_id']);
            	$this->session->set_userdata('amc_item',$logindata);
            	$data['session_id']=$data['amc']['amc_session_id'];
            	/*move all boi records to session table*/
            	//$res=$this->amc_model->inset_boi_to_session($data['boi']);
            	//echo "<pre>sd";print_r($data);die;
            }
            else
            {
            	$logindata = array('amc_session_id'=>$data['boi'][0]['amc_session_id']);
                //echo "<pre>";print_r($logindata);die;
            	$this->session->set_userdata('amc_item',$logindata);
            	$data['session_id']=$data['boi'][0]['amc_session_id'];
            	/*move all boi records to session table*/
            	$res=$this->amc_model->inset_boi_to_session($data['boi']);
            	//echo "<pre>sd";print_r($data);die;
            }
            $data['action']='edit_amc';
            $data['property_type']=$this->amc_model->get_property_list();
            //echo "<pre>";print_r($data);die;
            $this->global['pageTitle'] = APP_NAME.' : Edit AMC';
            $this->loadViews("add_new_amc_view", $this->global, $data, NULL);
        }
    }

    function delete_amc()
    {
        $last = $this->uri->total_segments();
        $record_num = $this->uri->segment($last);
        $result = $this->amc_model->delete_amc($record_num);
        redirect('amc_listing','refresh');        
    }

    function vehicle_no_exists()
    {
        $vehicle_id = $this->input->post("vehicle_id");
        $vehicle_no = $this->input->post("vehicle_no");
        if(empty($vehicle_id)){
            $result = $this->vehicle_model->vehicle_no_exists($vehicle_no);
        } else {
            $result = $this->vehicle_model->vehicle_no_exists($vehicle_no, $vehicle_id);
        }
        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }
    
    function pageNotFound()
    {
        $this->global['pageTitle'] = APP_NAME.' : 404 - Page Not Found';
        $this->loadViews("404", $this->global, NULL, NULL);
    }

    function amc_get_payment_record_details()
    {
    	$value=$this->input->post();
    	$result=$this->amc_model->amc_get_payment_record_details($value['data']);
    	echo json_encode($result);
    }

    function amc_add_payment_record()
    {
    	$value=$this->input->post();
    	$this->amc_model->amc_add_payment_record($value);
    	redirect('amc_listing','refresh');
    	//echo json_encode($value);
    }

    function amc_email()
    {
        $value=$this->input->post();
        $data = $this->amc_model->get_po_pdf_data($value['data']);
        //recipient
        if(isset($data['vendor_email']))
        {
            $to=$data['vendor_email'];
        }
        else
        {
            $to = 'info@wahidfix.com';
        }
        //echo $to;die;

        //sender
        $from = 'info@wahidfix.com';
        $fromName = 'Wahidfix';

        //email subject
        $subject = 'Purchase Order Email with Attachment by Wahidfix'; 

        //attachment file path
        $file="nothing here";
        $file_pointer = FCPATH.'assets/po_pdf/'.$value['data'].'.pdf';
        //echo $file_pointer;die;
        if (file_exists($file_pointer))  
        { 
            $file = $file_pointer;
        } 
        else 
        { 
        	$_POST['data']=$value['data'];
        	$this->amc_pdf($_POST['data']);
        	if (file_exists($file_pointer))  
	        { 
	            $file = $file_pointer;
	        } 
            //echo "The file $file_pointer does not exists"; 
        } 
        //echo $file;die;
        //email body content
        $htmlContent = '<h1>Purchase Order Email with Attachment by Wahidfix</h1>
            <p>This email has sent from Wahidfix with attachment.</p>';

        //header for sender info
        $headers = "From: $fromName"." <".$from.">";

        //boundary 
        $semi_rand = md5(time()); 
        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

        //headers for attachment 
        $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

        //multipart boundary 
        $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
        "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 

        //preparing attachment
        if(!empty($file) > 0){
            if(is_file($file)){
                $message .= "--{$mime_boundary}\n";
                $fp =    @fopen($file,"rb");
                $data =  @fread($fp,filesize($file));

                @fclose($fp);
                $data = chunk_split(base64_encode($data));
                $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" . 
                "Content-Description: ".basename($file)."\n" .
                "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" . 
                "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
            }
        }
        $message .= "--{$mime_boundary}--";
        $returnpath = "-f" . $from;

        //send email
        $mail = @mail($to, $subject, $message, $headers, $returnpath); 

        //email sending status
        echo $mail?"<h1>Mail sent.</h1>":"<h1>Mail sending failed.</h1>";
    }

    function amc_get_qr()
    {
        $value=$this->input->post();
        $result=$this->amc_model->genereate_qr($value['data']);
        echo json_encode(array('data'=>1));
    }

    public function amc_get_pdf()
	{
		$value=$this->input->post();
		$amcid=$value['data'];
		$data=$this->amc_model->get_po_by_id($amcid);
        $data['amc_content']=$this->amc_model->get_amc_content();
        //echo "<pre>";print_r($data);die;
		$boi=$this->amc_model->get_all_boi_by_poid($amcid);

		require_once(FCPATH.'application/libraries/TCPDF-master/tcpdf.php');
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }
        $pdf->AddPage();
        $pdf->SetFillColor(255,255,0);
        $pdf->SetXY(25,7);
        $pdf->SetFont('times', '', 12);
        $pdf->MultiCell(95, 5, 'Wahidfix General Services LLC.', 0, 'R', 0, 2, '', '', true, 0);

        $pdf->SetFont('times', '', 8);

        $pdf->SetXY(24,12);
        $pdf->MultiCell(95, 5, 'M13, Plot 100', 0, 'C', 0, 2, '', '', true, 0);

        //$from='From : '.date('d-m-Y', strtotime($input['start_date']));
        $pdf->SetXY(30,16);
        $pdf->MultiCell(97, 5, 'Mussafah Abu Dhabi,UAE', 0, 'C', 0, 2, '', '', true, 0);
        //$pdf->MultiCell(70, 5, $from, 0, 'R', 0, 2, '', '', true, 0);

        //$to='To : '.date('d-m-Y', strtotime($input['end_date']));
        $pdf->SetXY(62,20);
        $pdf->MultiCell(98, 5, 'Email : info@awfueltrading.com', 0, 'L', 0, 2, '', '', true, 0);
        //$pdf->MultiCell(37, 5, $to, 0, 'R', 0, 2, '', '', true, 0);

        $pdf->SetXY(62,24);
        $pdf->MultiCell(95, 5, 'Phone :+971-25550870', 0, 'L', 0, 2, '', '', true, 0);
        //$pdf->MultiCell(40, 5, $str, 0, 'R', 0, 2, '', '', true, 0);

        $pdf->SetXY(62,28);
        $pdf->MultiCell(95, 5, 'Fax : 025550871', 0, 'L', 0, 2, '', '', true, 0);
        //$pdf->MultiCell(40, 5, 'Status : '.$status, 0, 'R', 0, 2, '', '', true, 0);

        $pdf->SetXY(62,32);
        $pdf->MultiCell(95, 5, 'TRN : 100330389600003', 0, 'L', 0, 2, '', '', true, 0);

        $pdf->Image('assets/images/logo.jpg', 15, 5, 30, 30, 'JPG', 'http://www.wahidfix.com', '', true, 150, '', false, false, 0, false, false, false);
        $pdf->SetXY(15,37);
        
		$pdf->Ln(6);

		$pdf->SetFont('times', '', 15);
        $html='<u><b>ANNUAL MAINTENANCE CONTRACT</b></u>';      
        $pdf->writeHTMLCell(0, 0, '', '', $html,0, 1, 0, true, 'C', true);
        $pdf->SetFont('times', '', 14);
        $pdf->writeHTMLCell(0, 0, '', '','Date : '.date('d-m-Y'),0, 1, 0, true, 'R', true);
        $pdf->SetFont('times', '', 12);
    	$pdf->writeHTMLCell(0, 0, '', '','To : '.$data['amc_party_name'],0, 1, 0, true, 'L', true);
        $pdf->writeHTMLCell(0, 0, '', '','Address : '.$data['amc_property_address'],0, 1, 0, true, 'L', true);
    	$html=' Sub : Comprehensive annual maintenance contract for Air-conditioners installed at property No.'.$data['amc_property_no'].' on Date '.date('d-m-Y');
    	$pdf->writeHTMLCell(0, 0, '', '',$html,0, 1, 0, true, 'L', true);
    	$pdf->Ln(6);

        $pdf->SetFont('times', 'B', 16);
        $html = '<table border="1" cellpadding="5">
            <tr>
                <th align="center" width="50">Sr. No</th>
                <th align="center" width="300">Property Detial</th>
                <th align="center" width="150">Nos/Qty</th>
                <th align="center" width="150">No. AC</th>
            </tr>';
        $pdf->SetFont('times', '', 10);
        $subtotal=0;
        $actotal=0;
  		for($i=0;$i<count($boi);$i++)
  		{
        	$html .='<tr>
                <td align="center" width="50">'.($i+1).'</td>
                <td align="center" width="300">'.$boi[$i]['amc_boi_detail'].'</td>
                <td align="center" width="150">'.$boi[$i]['amc_boi_qty'].'</td>
                <td align="center" width="150">'.$boi[$i]['amc_boi_ac_qty'].'</td>
            </tr>';
            $subtotal+=$boi[$i]['amc_boi_qty'];
            $actotal+=$boi[$i]['amc_boi_ac_qty'];
        }
        $html.= '
            <tr>
            	<td></td>
            	<td align="right">Total</td>
                <td align="center" style="border: 1px solid black;">'.number_format($subtotal,2,'.','').'</td>
                <td align="center" style="border: 1px solid black;">'.number_format($actotal,2,'.','').'</td>
            </tr>';
  		
        $html.='</table>';
        $pdf->writeHTML($html, true, false, true, false, '');

        $html=' This contract starts on Date :- '.date('d-m-Y',strtotime($data['amc_start_date'])).' and Ends on Date :- '.date('d-m-Y',strtotime($data['amc_end_date']));
    	$pdf->writeHTMLCell(0, 0, '', '',$html,0, 1, 0, true, 'L', true);

    	$html=' This maintenance contract consist of :';
    	$html.=$data['amc_content']['amc_content'];
    	$pdf->writeHTMLCell(0, 0, '', '',$html,0, 1, 0, true, 'L', true);

    	
        $amt=$data['amc_amount'];
        if($data['amc_discount']!=0)
        {
            $disc_amt=$data['amc_amount']*$data['amc_discount']/100;
            $amt=$data['amc_amount']-$disc_amt;
            $pdf->SetFont('times', 'B', 11);
            $html='Disount('.$data['amc_discount'].'%)- AED. '.$disc_amt;
            $pdf->writeHTMLCell(0, 0, '', '',$html,0, 1, 0, true, 'L', true);
        }
        $pdf->SetFont('times', 'B', 15);
    	$html='Total for the maintenance contract..... AED. '.$amt.' / year';
    	$pdf->writeHTMLCell(0, 0, '', '',$html,0, 1, 0, true, 'L', true);

        $pdf->lastPage();
        $filelocation = FCPATH.'assets/amc';  
        $fileNL = $filelocation.'/'.'amc_pdf_'.$amcid.'.pdf';
        $pdf->Output($fileNL, 'F'); 
        $var=base_url().'/assets/amc/'.'amc_pdf_'.$amcid.'.pdf';
        echo json_encode(stripcslashes($var));
	}

    public function amc_get_qr_pdf()
    {
        require_once(FCPATH.'application/libraries/TCPDF-master/tcpdf.php');
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $value=$this->input->post();
        $data=$this->amc_model->get_all_qr_data($value['data']);
        //echo "<pre>";print_r($data);die;
        
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Wahid Fix');
        $pdf->SetHeaderData('http://wahidfix.com/assets/images/logos/logo.png', PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE , PDF_HEADER_STRING);
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        //$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }
        $pdf->AddPage();
		$pdf->SetFont('times', '', 20);
        $x=5;$y=5;
        for($i=0;$i<count($data);$i++)
        {   
            $pdf->SetXY($x,$y);
            $img='assets/amc/'.$data[$i]['amc_qr_hash'].'.png';
            $pdf->Image($img, $x,$y, 50, 50, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
            unset($img);
            if($x<=150)
            {
                $x+=50;
            }
            else if($x>=150)
            {
                $x=5;$y+=50;
            }
            if($y>=250)
            {
                $x=5;$y=5;
                $pdf->lastPage();
                $pdf->AddPage();
            }
        }          
        $filelocation = FCPATH.'//assets//amc';  
        $fileNL = $filelocation.'//'.$value['data'].'.pdf';
        $pdf->Output($fileNL, 'F'); 
        $var=base_url().'/assets/amc/'.$value['data'].'.pdf';
        echo json_encode(stripcslashes($var));
    }

    public function po_export_exl()
    {
    	$last = $this->uri->total_segments();
		$record_num = $this->uri->segment($last);
    	$data = $this->amc_model->get_po_pdf_data($record_num);
    	//echo "<pre>";print_r($data);die;
    	
    	  // file name for download
    	//namespace Chirp;
		  $filename = "website_data_" . date('Ymd') . ".xls";

		  header("Content-Disposition: attachment; filename=\"$filename\"");
		  header("Content-Type: application/vnd.ms-excel");
		  echo implode("\t", array_keys($data)) . "\n";
		  echo implode("\t", array_values($data)) . "\n";
		  //$flag = false;
		  /*foreach($data as $row) {
		  	echo "<pre>";print_r($data);die;
		    if(!$flag) {
		      // display field/column names as first row
		      echo implode("\t", array_keys($row)) . "\n";
		      $flag = true;
		    }
		    array_walk($row, __NAMESPACE__ . '\cleanData');
		    echo implode("\t", array_values($row)) . "\n";
		  }*/
		  //exit;
    }

    function cleanData(&$str)
    {
    	$str = preg_replace("/\t/", "\\t", $str);
    	$str = preg_replace("/\r?\n/", "\\n", $str);
    	if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }
}
?>