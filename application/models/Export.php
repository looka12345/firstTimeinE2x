<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Export extends CI_Model
{

    function propertyData()
    {

        $response = array();

        // Select record
        $this->db->select('propertyid, name');
        $q = $this->db->get('propertydata');
        $response = $q->result_array();

        return $response;
    }
//     public function employeeList($property_id) {
// 		// $this->db->select(array('id', 'name', 'skills', 'address', 'designation', 'age'));
// 		// $this->db->from('emp');
// 		// $this->db->limit(10);  
// 		// $query = $this->db->get();
//         $res=$this->db->query("SELECT roomdata.RoomID,roomdata.Name,roomdata.Description,roomdata.Capacity,roomdata.PhotoURL FROM propertydata INNER JOIN roomdata ON roomdata.propertyid=propertydata.propertyid WHERE propertydata.propertyid=$property_id;")->result_array();
//           return $res; 
// 	// 	// return $query->result_array();
//     //     $this->db->select('roomdata.RoomID,roomdata.Name,roomdata.Description,roomdata.Capacity,roomdata.PhotoURL');
//     // $this->db->from('propertydata');

//     // $this->db->select()
//     //     ->from('roomdata')
//     //     ->where('roomdata', $projectId)
//     //     ->where('user_id', $user_id)
//     //     ->join('users', 'comment.user_id_from =userid')
//     //     ->order_by("comment.id", "asc");
//     // return $this->db->get()->result_array();
// 	}

}