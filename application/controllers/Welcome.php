<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function _consruct(){
        parent::_construct();
        $this->load->model('Hotel');
    }

    public function index() {
        $this->load->model('Hotel');
        $this->load->view('test.php');
       
      
        

    }

    public function url() {
        $this->load->model('Hotel');
        $data = $this->uri->segment('2');

        $data = str_replace(array('\'', '"',
            ',', ';', '<', '>', '&'), ' ', $data);

     

        preg_match_all("/([^,= ]+)=([^,= ]+)/", $data, $r);
        $result = array_combine($r[1], $r[2]);
        if (array_key_exists("propertid",$result))
         {
         $res=$result['propertid']?$result['propertid']:5;
         $check=$this->db->query("SELECT * FROM `bookfo` ")->result();
     
         foreach($check as $value)
         {
          $array[] = $value->propertid;
         }
     
          
          if(in_array($res, $array))
          {
          $check=$this->db->query("SELECT `domain` FROM `bookfo` WHERE propertid=$res")->row_array();
          
           foreach($check as $che)
          {
             
              if($res=$che)
              {
                  $loc = $che . base64_encode($result['propertid']);
      
                      header("Location: " . $loc);
              }
              else{
                   echo "Not Found Domain !";
              }
          }
        }else{
          echo "<p> <font color=red>Record Does Not Exists !</font> </p>";
        }
         }
        else
         {
            echo "<p> <font color=green>Key Does Not Exists !</font> </p>";
          }
        
        
       
        //xml data 
        $sxe = new SimpleXMLElement('<Transaction/>');
    
        
      $PropertyDataSet=$sxe->addChild('PropertyDataSet');
      $PropertyDataSet->addAttribute('timestamp',"202X-XX-XXT00:00:00-0X:00"  );
      $PropertyDataSet->addAttribute('Language','en');
      $PropertyDataSet->addAttribute('id',123456);
      $PropertyDataSet->addAttribute('partner','partner_key');
      $PropertyDataSet->addChild('Property',1);

       
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

}
