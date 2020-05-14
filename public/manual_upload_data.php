<?php 
  $conn = mysqli_connect("localhost","logjanec_airlab","baG[sy0AkK7r","logjanec_airlab");
    $dir = 'datos';
  	$files = scandir($dir, 0);
  		
  			for($i = 2; $i < count($files); $i++){
          $file_name = $files[$i];
          $file_date = explode('.', $file_name);
          $file_date = $file_date[0];
        
        delete_record($conn,$file_date);
        insert_record($conn,$file_name,$file_date);
        move_file($file_name);
        header("Location: manual-upload?act=1");
        }
			

function delete_record($conn,$file_date){
        
        $sql_del="delete from upload_datas where date='".$file_date."'";                
        $query=mysqli_query($conn,$sql_del) or die(mysqli_error($conn));
} 

function move_file($file_name){
        
        $source_file = $_SERVER['DOCUMENT_ROOT'].'/airlab/public/datos/'.$file_name;
        $destination_path = 'trash/';
        rename($source_file, $destination_path . pathinfo($source_file, PATHINFO_BASENAME));
        } 

function insert_record($conn,$file_name,$file_date){
      
      
      $dirv = $_SERVER['DOCUMENT_ROOT'].'/airlab/public/datos/';
      

			$data = file_get_contents($dirv.$file_name);
			$lines = explode(chr(13), $data);
			
      $j=0;

			foreach ($lines as $line) { 
	
					$j++;
				if($j==1 || $j==2) continue;

				 $val2 = explode(' ', $line); 

         if($val2[1]=="") continue;
                  
        $sql="insert into upload_datas set 

                              date='".$file_date."',
                              time='".$val2[0]."',
         											pm10='".$val2[1]."',
         											pm25='".$val2[2]."',
         											tsp='".$val2[3]."',			
         											so2='".$val2[4]."',
         											ppb='".$val2[5]."',
         											ppm='".$val2[6]."',
         											no='".$val2[7]."',
         											no2='".$val2[8]."',
         											nox='".$val2[9]."',
         											dv='".$val2[10]."',
         											vv='".$val2[11]."',
         											hr='".$val2[12]."',
         											temp='".$val2[13]."',
         											pb='".$val2[14]."',
         											rs='".$val2[15]."',
         											rain='".$val2[16]."',
         											humedad='".$val2[17]."',
         											temp2='".$val2[18]."'";
                 $query=mysqli_query($conn,$sql) or die(mysqli_error($conn));

      }
  }
?>
