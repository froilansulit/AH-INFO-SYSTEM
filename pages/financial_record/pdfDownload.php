<?php 

include '../vendor/autoload.php';
include '../connect.php';

// echo "hello";   

$month = date('F');
$year = date('Y');

// $sql = "select * from financial_record where month_date='$month' AND year_date='$year'"; // select all the data in DB

$res=mysqli_query($conn,"select * from financial_record where month_date='$month' AND year_date='$year'");
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
    </style><h1>Financial Month of '.date('Y').'</h1><table class="table">';
		$html.='<tr><td>ID</td><td>Remarks</td><td>Date</td><td>Purpose</td></tr>';
		while($row=mysqli_fetch_assoc($res)){
            
			$html.='<tr><td>'.$number.'</td><td>'.$row['cname'].'</td><td>'.$row['date_set'].'</td><td>'.$row['purpose'].'</td></tr>';
            $number++;
		}
	$html.='</table>';
}else{
	$html="Data not found";
}
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file= 'Financial_'.date('F').'_'.date('Y').'.pdf';
$mpdf->output($file,'D');
//D
//I
//F
//S

?>