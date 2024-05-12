<?php

$conn = new mysqli('localhost','root',"","ah_info_system") or die(mysqli_error($conn));

$update=false;
$id=0;
$name='';
$title='';
$department='';
$hire_date = '';
$daily_rate = '';
$schedule = '';
$file='';

 function getsafevalue($conn,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($conn,$str);
	}
}
 

 if(isset($_POST['submit'])){
    
	$name = $_POST['name'];
	$title = $_POST['title'];
	$department = $_POST['department'];
	$hire_date	=$_POST['hire_date'];
    $daily_rate	=$_POST['daily_rate'];
    $schedule = $_POST['schedule'];

	
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"])); 
	 


	 $conn->query ("INSERT INTO employee_profile (name,title,department,hire_date, daily_rate, schedule,image)
	 VALUES('$name','$title','$department','$hire_date','$daily_rate','$schedule','$file')") or 
	 die($conn-> error);	
	 
	 header("Location: view_data.php");
	die;
	 	
 }

	 
  if(isset($_GET['delete'])){
	$id = $_GET['delete'];
	 $conn->query("DELETE from employee_profile WHERE id=$id")or die($conn->error());
	 
		header("Location: index.php");
		die;
  }
  	 
  if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update=true;
	$result= $conn->query("SELECT * FROM employee_profile WHERE id=$id")or die($conn->error());
	 
	if (mysqli_num_rows($result) == 1){
	$row = $result->fetch_array();
	
	$name = $row['name'];
	$title = $row['title']; 
	$department = $row['department']; 
	$hire_date	=$row['hire_date'];
	$daily_rate=$row['daily_rate'];
	$schedule = $row['schedule'];
    $file = ''; 
 }
  }
  
  if(isset($_POST['update'])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$title = $_POST['title'];
	$department = $_POST['department'];  
	$hire_date   =$_POST['hire_date'];
	$daily_rate =$_POST['daily_rate'];
	$schedule   = $_POST['schedule'];
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

	 $conn->query ("UPDATE employee_profile SET name='$name',title='$title',department='$department',hire_date='$hire_date', daily_rate='$daily_rate',schedule='$schedule',image='$file' WHERE id='$id'") 
	 or die($conn-> error);
	 
	 header('location: index.php');
	die;
	 	
 }

?> 
