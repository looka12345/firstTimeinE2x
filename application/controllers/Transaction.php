<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

    public function index(){
		

    }
     public function convertToxml()
    {
    
       $property_id = $this->uri->segment('3');
     
       $url="http://localhost/testing/index.php/Transaction/convertToxml/$property_id?";
       $currentURL = current_url(); 
       $params   = $_SERVER['QUERY_STRING']; 
      
        $fullURL = $currentURL . '?' . $params; 

        if($url==$fullURL)
        {
            $property_id = $this->uri->segment('3');
            $array=[];
            if (ctype_digit($property_id)) {
             
            if(!empty($property_id))
            {
      
             // $c=$this->db->query("SELECT *,hotel_transactions.transaction_id,package.package_id FROM `hotel_transactions` INNER JOIN package ON package.package_id=hotel_transactions.transaction_id ")->row_array();
             
              $res=$this->db->query("SELECT roomdata.RoomID,roomdata.Name,roomdata.Description,roomdata.Capacity,roomdata.PhotoURL FROM propertydata INNER JOIN roomdata ON roomdata.propertyid=propertydata.propertyid WHERE propertydata.propertyid=$property_id;")->result_array();
              $check=$this->db->query("SELECT propertyid  FROM `propertydata` ")->result();
           
              foreach($check as $value)
              {
               $array[] = $value->propertyid;
              }
            }else{
              // echo 'please enter input';
            }
          } else {
            //   echo "Something's not right";
          }
           
             
            
      
            
            
            
            
           if(in_array($property_id,  $array))
           {
            $sxe = new SimpleXMLElement('<Transaction/>');
          
              
            $PropertyDataSet=$sxe->addChild('PropertyDataSet');
            $PropertyDataSet->addAttribute('timestamp',"202X-XX-XXT00:00:00-0X:00"  );
            $PropertyDataSet->addAttribute('Language','en');
            $PropertyDataSet->addAttribute('id',123456);
            $PropertyDataSet->addAttribute('partner','partner_key');
            $PropertyDataSet->addChild('Property',$property_id);
      
             
             foreach($res as $key => $value ){
              $RoomData=$PropertyDataSet->addChild('RoomData');
             $RoomID=$RoomData->addChild('RoomID',$value['RoomID']);
              $Name=$RoomData->addChild('Name');
              $NameNode=$Name->addChild('Text');
              $NameNode->addAttribute('Text',$value['Name']);
             $Description=$RoomData->addChild('Description',);
             $Description=$Description->addChild('Text');
             $Description->addAttribute('Text',$value['Description']);
             $Description->addAttribute('Language','en');
            
             $Capacity=$RoomData->addChild('Capacity',$value['Capacity']);
             $PhotoURL=$RoomData->addChild('PhotoURL');
             $Caption=$PhotoURL->addChild('Caption');
             $Caption=$Caption->addChild('Text');
             $Caption->addAttribute('Text',$value['Description']);
             $Caption->addAttribute('Language','en');
             $URL=$PhotoURL->addChild('URL',$value['PhotoURL']);
            }
             $PackageData=$PropertyDataSet->addChild('PackageData');
             $PackageID=$PackageData->addChild('PackageID','PackageID');
             $Name=$PackageData->addChild('Name','Name');
             $Name->addAttribute('Text','Text');
             $Description2=$PackageData->addChild('Description','Description');
             $Description2->addAttribute('text','text');
             $p=$PackageData->addChild('Refundable');
             $p->addAttribute('Available', 'available="true" refundable_until_days="2" refundable_until_time="12:00"');
             echo "<xmp>".$sxe->asXML()."</xmp>";
                  
          }
          else {
      
              echo "please valid input ";
          }
                
             
        }
        else{
            echo "Something went Wrong ";
        }

    

		}
  public function token()
	{
    $Uuid = array(
      'time_low'  => 0,
      'time_mid'  => 0,
      'time_hi'  => 0,
      'clock_seq_hi' => 0,
      'clock_seq_low' => 0,
      'node'   => array()
     );
		return $Uuid->uuid1()->toString();
	}
    
	}





?>