<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('impExp');
	}
	
	public function index(){
        $property_id = $this->uri->segment('2');
		$data = array();
		$data['propertyData'] = $this->impExp->propertyData($property_id);
		$this->load->view('Export',$data);
	}
    public function impExpCSV(){
	     $property_id = $this->uri->segment('2');
	     $propertyData = $this->impExp->propertyData($property_id);
		 if(empty($propertyData))
		 {
			echo '<script>alert("Record Does Not Exists")</script>';
		 }
		 else{
			$filename = 'propertyData_'.date('Ymd').'.csv';
	        header("Content-Description: File Transfer");
		    header("Content-Disposition: attachment; filename=$filename");
		    header("Content-Type: application/csv; "); 
			$file = fopen('php://output', 'w');
	        $header = array("propertyid","Name","address","country","phone","latitude","longitude");
			fputcsv($file, $header);
            foreach ($propertyData as $key=>$line){
			$todo=array(
				'propertyid'=>$line['propertyid'],
				'Name'=>$line['name'],
				'address'=>$line['address'],
				'country'=>$line['country'],
				'phone'=>$line['phone'],
				'latitude'=>$line['latitude'],
				'longitude'=>$line['longitude'],
				);
			 fputcsv($file,$todo);
			}
	
			fclose($file);
			exit;
		}
		
       dneind
		
		
	}
}
