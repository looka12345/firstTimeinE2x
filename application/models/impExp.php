<?php 

class impExp extends CI_Model{

    function propertyData($propertyid){
    
        
       if(!empty($propertyid))
        {
            $res=$this->db->query("SELECT propertydata.propertyid,detailsd.name,detailsd.address,detailsd.phone,detailsd.country,detailsd.latitude,detailsd.longitude FROM propertydata INNER JOIN detailsd ON detailsd.propertyid=propertydata.propertyid WHERE propertydata.propertyid=$propertyid;")->result_array();
            return $res;
       }
       else{
        $res=$this->db->query("SELECT propertydata.propertyid,detailsd.name,detailsd.address,detailsd.phone,detailsd.country,detailsd.latitude,detailsd.longitude FROM propertydata INNER JOIN detailsd ON detailsd.propertyid=propertydata.propertyid WHERE propertydata.propertyid")->result_array();
        return $res;
       }
        
       


}

}



?>