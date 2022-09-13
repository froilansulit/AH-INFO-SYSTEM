<?php 

include '../vendor/autoload.php';
include '../connect.php';

$month = date('F');
$year = date('Y');

$res=mysqli_query($conn,"select * from tugboat_record where month='$month' AND year='$year'");
if(mysqli_num_rows($res)>0){
    $number = 1;
    $html='<style>
    h1 {
        text-align: center;
    }
    table{
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        text-align: center;
      }
      
      table td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
      }
      
       table tr:nth-child(even){background-color: #f2f2f2;}
      
       table tr:hover {background-color: #ddd;}
      
       table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
      }
    </style><h1>Tugboat Renting Records '.date('F').' '.date('Y').'</h1><table class="table">';
		$html.='<tr><td>ID</td><td>Name</td><td>Date of Rent</td><td>Date of Return</td></tr>';
		while($row=mysqli_fetch_assoc($res)){
            
			$html.='<tr><td>'.$number.'</td><td>'.$row['name'].'</td><td>'.$row['dateofRent'].'</td><td>'.$row['dateofReturn'].'</td></tr>';
            $number++;
		}
	$html.='</table>';
}else{
	$html="Data not found";
}
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file= 'Tugboat_Renting_'.date('F').'_'.date('Y').'.pdf';
$mpdf->output($file,'D');
//D
//I
//F
//S
header('location: ../tugboat_renting/');
?>