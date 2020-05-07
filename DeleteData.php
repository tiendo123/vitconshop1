<!DOCTYPE html>
<html>
<body>

<h1>DELETE DATA TO DATABASE</h1>

<?php

echo "Delete database!";
?>
<ul>
    <form name="DeleteData" action="DeleteData.php" method="POST" >
<li>PhoneID:</li><li><input type="text" name="phoneid" /></li>
<li><button type="submit" value="Submit">Delete</button></li>
<?php


if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=1234;dbname=mydb', 'postgres', '123456');
}  else {
     
   $db = parse_url(getenv("DATABASE_URL"));
   $pdo = new PDO("pgsql:" . sprintf(
        "host=Admincnt;port=1234;user=tiendo123;password=tiendo123;dbname=qw1e12asd12aasd",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
   ));
}  

$sql = "DELETE FROM Phone WHERE phoneid = '$_POST[phoneid]'";
$stmt = $pdo->prepare($sql);

if(is_null ($_POST[phoneid])== FALSE)  {    
    if($stmt->execute() == TRUE){
        echo "Record updated successfully.";
    } else {
        echo "Error updating record. ";
    }}
?>
</body>
</html>
