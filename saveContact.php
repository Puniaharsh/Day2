<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Save Contact</title>
</head>
<body>
<h1>Saving contact...</h1>
<?php
$firstName = $_POST['firstName'];
echo 'First Name:' . $firstName.'<br/>';

$lastName = $_POST['lastName'];
echo 'Last Name:' . $lastName. '<br/>';

$email = $_POST['email'];
echo 'Email:' . $email. '<br/>';
// connect to the DB
// step-1 connect to db
//$conn = new PDO('mysql:host=localHost;dbname=php', 'root', '');
$conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200361570', 'gc200361570', '58cbFxWAZr');

// step-2  create a SQL command
$sql = "INSERT INTO contacts (firstName,lastName, email)
  VALUES (:firstName, :lastName, :email)";
//Step-3 prepare the command to prevent SQL injection attacks
$cmd = $conn->prepare($sql);
$cmd->bindParam(':firstName', $firstName, PDO::PARAM_STR, 30);
$cmd->bindParam(':lastName', $lastName, PDO::PARAM_STR, 30);
$cmd->bindParam(':email', $email, PDO::PARAM_STR, 120);
// Step-4 execute the SQL command
$cmd->execute();
// step-5 close the connection to DB
$conn=null;
// step-6 redirect to new page



?>
</body>
</html>






