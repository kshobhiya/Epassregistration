<?php
 $con = mysqli_connect("localhost","root","","country state city");
 if($_POST["did"]){
  $id=$_POST["did"];

  if($id == 0){
 		echo "<option>--Select City--</option>";
  }else{
 	$sql="SELECT * FROM `cities` WHERE `District_id`='$id'";
        $result=mysqli_query($con,$sql); ?>
        <select name="destination city" id="destination city">
    	  <option>--Select City--</option>
    	  <?php
        while($row=mysqli_fetch_array($result)){
        echo "<option value=".$row["cities"].">".$row["cities"]."</option>";
        }
  }
 }
 ?>