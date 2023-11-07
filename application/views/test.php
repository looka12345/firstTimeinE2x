<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php 
         $check=$this->db->query("select * from bookfo")->row_array();
         
    $data=array(
    'hpa'=>$check['hpa'],
    'propertid'=>$check['propertid'],
    'room'=>$check['room'],
    'checkin'=>$check['checkin'],
    'checkout'=>$check['checkout'],
    'pax'=>$check['pax'],
    'lang'=>$check['lang'],
    'bookingSource'=>$check['bookingSource'],
    'paid_source'=>$check['paid_source'],
    
);

$qs = http_build_query($data,'flags_');
echo $qs;



?>

<a href="<?php echo base_url('url/').$qs;?>">ID FIRST</a>




    </body>
</html>


