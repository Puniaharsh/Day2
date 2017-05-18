<!DOCTYPE html >
<html lang = "en" >
<head >
  <meta charset = "UTF-8" >
  <title >Contacts</title >
</head >
<body >
    <h1>My Contacts</h1>
<?php

//Step 1 - Connect to the database
     $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200361570', 'gc200361570', '58cbFxWAZr');

//Step 2 - Create a sql command
$sql = "SELECT * FROM contacts";
    //Step-3 prepare the command to prevent SQL injection attacks
$cmd = $conn->prepare($sql);

// Step-4 execute the SQL command
$cmd->execute();

//Step 5- store the results
$contacts = $cmd->fetchAll();
//Step 6 - remove the DB connection
$conn=null;
//Step 7 - loop over the results and display them to the screen

echo '<table><tr><th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  </tr>';
foreach($contacts as $contact)
{
 echo '<tr><td>'.$contact['firstName'].'</td>
<td>'.$contact['lastName'].'</td>
<td>'.$contact['email'].'</td></tr>';
}
?>
</body >
</html >