<?php
require ('sidemenu.php');
require_once 'f_brands.php'; 

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=getsafevalue($mysqli,$_GET['type']);
	if($type=='status'){
		$operation=getsafevalue($mysqli,$_GET['operation']);
		$id=getsafevalue($mysqli,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update brands set status='$status' where id='$id'";
		mysqli_query($mysqli,$update_status_sql);
	}
}
?>
<br>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" >

<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
background: rgb(185,208,218);
background: linear-gradient(90deg, rgba(185,208,218,1) 13%, rgba(16,64,85,1) 100%);
   
}

a {
  color: black;
}
#brands {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
 
}

#brands td, #brands th {
  border: 1px solid #ddd;
  padding: 8px;
 
}

#brands tr:nth-child(even){background-color: #f2f2f2;}

#brands tr:hover {background-color: #ddd;}

#brands th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #9cb6cc;
  color: white;

}
</style>


<?php

$mysqli = new mysqli('localhost','root',"","stock2") or die(mysqli_error($mysqli));
$sql="SELECT * from brands";
$result=$mysqli->query($sql);
//pre_r($result); 
?>
<center>
<div class="card shadow mb-4" style="max-width:800px;">
<div class="card-header py-3">
	
 <div class="table">
  <h4 class="box-title">BRANDS </h4>
<a href="addbrands.php" class="btn btn-dark">ADD BRANDS</a>
             <br><br>
			<table id="brands" class="table-primary">
			  <thead>
			   <tr>
				<th>#</th>
				 <th>Brand Name</th>
                <th>Action</th>
				</tr>
				</thead>
				
				
		<?php
   
			while($row = $result->fetch_assoc()): ?>
				<tr>
		
				<td><?php echo $row["id"]; ?></td>
				<td><?php echo $row["brandname"]; ?></td>
			
			
				<td>
				<?php
				
				if($row['status']==1){
								echo "<a href='?type=status&operation=deactive&id=".$row['id']."' class='btn btn-success'>Active</a>&nbsp;";
								}else{
									echo "<a href='?type=status&operation=active&id=".$row['id']."' class='btn btn-warning'>Deactive</a></span>&nbsp;";
								}
					
				?>
				
				<a href="addbrands.php?edit=<?php echo $row['id']; ?>"
					class="btn btn-info"> Edit </a>
				
				<a href="f_brands.php?delete=<?php echo $row['id']; ?>"