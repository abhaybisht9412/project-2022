<?php 
require_once("include/db.php");
if(isset($_POST["Submit"])){
    if(!empty($_POST["ename"] && !empty($_POST["ssn"]))){
    $ename=$_POST["ename"];
    $dept=$_POST["dept"];
    $ssn=$_POST["ssn"];
    $sal=$_POST["sal"];
    $add=$_POST["homeAddress"];
    $connectDB;
    $sql = "INSERT INTO emp_record(ename,dept,ssn,salary,homeaddress)values(:enamE,:depT,:ssN,:salarY,:homeaddresS)";
    $stmt=$connectDB->prepare($sql);
    $stmt->bindValue(':enamE',$ename);
    $stmt->bindValue(':depT',$dept);
    $stmt->bindValue(':ssN',$ssn);
    $stmt->bindValue(':salarY',$sal);
    $stmt->bindValue(':homeaddresS',$add);
    $Execute = $stmt -> execute();
    if($Execute){
        echo  '<span class="alertBox">Data Added Successfully</span>';
     }
    }else{
        echo '<span class="alertBox">Name and security number necessary!!!</span> '; 
    }
    	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="include/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&display=swap" rel="stylesheet">
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>
<body>
   <header>
    <div class="heading">
        <h1 >EMPLOYEE INFO PAGE</h1>
    </div>
   <div class="">
        <form action="insert_into_database.php" method="post" class="form">
            <fieldset>
                <span class="field-info" >Employee Name:</span>
                <br>
                <input type="text" name="ename" value="" autocomplete="off">
                <br>
                <span class="field-info">Department:</span>
                <br>
                <input type="text" name="dept" value="" autocomplete="off">
                <br>
                <span class="field-info">Unique Security Number:</span>
                <br>
                <input type="text" name="ssn" value="" autocomplete="off">
                <br>
                <span class="field-info">Salary:</span>
                <br>
                <input type="text" name="sal" value="" autocomplete="off">
                <br>
                <span class="field-info">Home Address:</span>
                <br>
                <textarea name="homeAddress" id="" cols="80" rows="9"></textarea>
                <br>
                <input type="submit" name = "Submit" value="submit " class="btn">
            </fieldset>
            
        </form>
    </div>
    
   </header>
   
</body>
</html>