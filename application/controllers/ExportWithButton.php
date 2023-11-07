<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ExportWithButton extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    // load base_url 
    $this->load->helper('url');

    // Load Model 

  }

  public function index()
  {
    // get data $data = array();
    $property_id = 1;
    $data['propertyData'] = $this->db->query("SELECT roomdata.RoomID,roomdata.Name,roomdata.Description,roomdata.Capacity,roomdata.PhotoURL FROM propertydata INNER JOIN roomdata ON roomdata.propertyid=propertydata.propertyid WHERE propertydata.propertyid=$property_id;")->result_array();


    // load view 
    $this->load->view('ExportWithB', $data);
  }

  // Export data in CSV format 
  public function createexcel()
  {
    // file name 
    $property_id = 1;
    $filename = 'Hotel_users' . date('Ymd') . '.csv';
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$filename");
    header("Content-Type: application/csv; ");

    // get data 
    $usersData = $this->db->query("SELECT roomdata.RoomID,roomdata.Name,roomdata.Description,roomdata.Capacity,roomdata.PhotoURL FROM propertydata INNER JOIN roomdata ON roomdata.propertyid=propertydata.propertyid WHERE propertydata.propertyid=$property_id;")->result_array();


    // file creation 
    $file = fopen('php://output', 'w');

    $header = array("RoomID", "Name", "Capacity", "Description", "PhotoURL");
    fputcsv($file, $header);
    foreach ($usersData as $key => $line) {
      fputcsv($file, $line);
    }
    fclose($file);
    exit;
  }
}