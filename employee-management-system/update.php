<?php 
require_once("include/db.php");
$searchQueryParam = $_GET["id"];

if(isset($_POST["Submit"])){
   
    $ename=$_POST["ename"];
    $dept=$_POST["dept"];
    $ssn=$_POST["ssn"];
    $sal=$_POST["sal"];
    $add=$_POST["homeAddress"];
    $connectDB;
    $sql = "UPDATE emp_record SET ename='$ename' , dept='$dept' , ssn='$ssn' , homeaddress='$add'
    where id='$searchQueryParam'"; 
    $Execute=$connectDB->query($sql);
    if($Execute){
       
        echo ' <script>window.open("view.php?id=Record Updated Successfully","_self")</script> ';
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
    <?php 
    $connectDB;
    $sql = "SELECT * FROM emp_record where id='$searchQueryParam'";
    $stmt=$connectDB->query($sql);
    while($DataRows = $stmt->fetch()){
        $id=$DataRows["id"];
        $ename=$DataRows["ename"];
        $dept=$DataRows["dept"];
        $ssn=$DataRows["ssn"];
        $salary=$DataRows["salary"];
        $homeaddress=$DataRows["homeaddress"];
        
    }
    ?>
   <header>
    <div class="heading">
        <h1 >EMPLOYEE INFO PAGE</h1>
    </div>
   <div class="">
        <form action="update.php?id=<?php echo $searchQueryParam; ?>" method="post" class="form">
            <fieldset>
                <span class="field-info" >Employee Name:</span>
                <br>
                <input type="text" name="ename" value="<?php echo $ename; ?>" autocomplete="off">
                <br>
                <span class="field-info">Department:</span>
                <br>
                <input type="text" name="dept" value="<?php echo $dept; ?>" autocomplete="off">
                <br>
                <span class="field-info">Unique Security Number:</span>
                <br>
                <input type="text" name="ssn" value="<?php echo $ssn; ?>" autocomplete="off">
                <br>
                <span class="field-info">Salary:</span>
                <br>
                <input type="text" name="sal" value="<?php echo $salary; ?>" autocomplete="off">
                <br>
                <span class="field-info">Home Address:</span>
                <br>
                <textarea name="homeAddress" id="" cols="80" rows="9" value="homeaddress"></textarea>
                <br>
                <input type="submit" name = "Submit" value="submit " class="btn">
            </fieldset>
            
        </form>
    </div>
    
   </header>
   
</body>
</html>