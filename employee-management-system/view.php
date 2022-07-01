<?php 
require_once("include/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View DB</title>
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
  <h2 class="animate__animated animate__bounce "><?php echo @$_GET["id"];?></h2>
 
 
  <!-- SEARCH BAR -->

<div class="search-bar">
  <fieldset>
    <form action="view.php" class="form" method="GET"></form>
    <input type="text" name="Search" value="" placeholder="Search by name and security number">
    <input type="submit" name="SearchButton" value="Search record">
  </fieldset>
</div>
<?php 
 if(isset($_GET["SearchButton"])){
  $connectDB;

  $Search = $_GET["Search"];
 
  $sql = "SELECT * FROM emp_record WHERE ename=:searcH OR ssn=:searcH";
  $stmt = $connectDB->prepare($sql);
  $stmt->bindValue(':searcH');
  $stmt->execute();

  while($DataRows = $stmt->fetch()){
    $id=$DataRows["id"];
    $ename=$DataRows["ename"];
    $dept=$DataRows["dept"];
    $ssn=$DataRows["ssn"];
    $sal=$DataRows["salary"];
    $homeaddress=$DataRows["homeaddress"];
    ?>
    <table>

    </table>
    <caption>Search Result</caption>
    <tr>
      <th>ID</th>
      <th>NAME</th>
      <th>DEPARTMENT</th>
      <th>SSN</th>
      <th>SALARY</th>
      <th>HOME ADDRESS</th>
      <th>SEARCH AGAIN</th>
    </tr>
    <tr>
      <td><?php echo $id; ?></td>
      <td><?php echo $ename; ?></td>
      <td><?php echo $dept; ?></td>
      <td><?php echo $ssn; ?></td>
      <td><?php echo $sal; ?></td>
      <td>$homeaddress</td>
      <td><a href="view.php"></a></td>
      
    </tr>
  <?php
  }//end of while loop

}//end of if loop of submit
?>
  
  <!-- END OF SEARCH BAR -->

  <!-- VIEW TABLE -->
  <br>
  <br>
    <table width="1000" border="5" align="center">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>DEPARTMENT</th>
            <th>SSN</th>
            <th>SALARY</th>
            <th>HOMEADDRESS</th>
            <th><a href="update.php?id=<?php echo $id ; ?>">UPDATE</a></th>
            <th><a href="delete.php?id=<?php echo $id ; ?>">DELETE</a></th>
            
        </tr>
    
   <?php 
   global $connectDB;
   $sql = "SELECT * FROM emp_record";
   $stmt = $connectDB->query($sql);
   while($DataRows=$stmt->fetch()){
    $id=$DataRows["id"];
    $ename=$DataRows["ename"];
    $dept=$DataRows["dept"];
    $ssn=$DataRows["ssn"];
    $salary=$DataRows["salary"];
    $homeaddress=$DataRows["homeaddress"];
    
   ?>
   <tr>
   <td ><?php echo $id; ?></td>
   <td ><?php echo $ename; ?></td>
   <td ><?php echo $dept; ?></td>
   <td ><?php echo $ssn; ?></td>
   <td ><?php echo $salary; ?></td>
   <td ><?php echo $homeaddress; ?></td>
   <td><a href="update.php?id=<?php echo $id ; ?>">UPDATE</a></th>
     <td><a href="delete.php?id=<?php echo $id ; ?>">DELETE</a></th>
   </tr>
  <?php } ?>
   </table>
  
   <!-- VIEW TABLE END  -->
   
   
</body>
</html>