<?php
//Connect MSSQL
$serverName = 'sqlserver';
$userName = 'sa';
$userPassword = 'Admin@12345';
$dbName = 'test';
 
try{
	$conn = new PDO("sqlsrv:server=$serverName ; Database = $dbName", $userName, $userPassword);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e){
	die(print_r($e->getMessage()));
}
 
$query = " SELECT * FROM demo 
ORDER BY a DESC
OFFSET 0 ROWS
FETCH NEXT 100 ROWS ONLY ";
$getRes = $conn->prepare($query);
$getRes->execute();
 
while($row = $getRes->fetch( PDO::FETCH_ASSOC ))
{
echo $row['a']."<br />";
echo $row['b']."<br />";
}