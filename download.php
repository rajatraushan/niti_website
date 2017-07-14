
<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pwd = '';
$database = $_POST["dbname"];
$table = $_POST["tablename"];
if (!mysql_connect($db_host, $db_user, $db_pwd))
    die("Can't connect to database");

if (!mysql_select_db($database))
    die("Can't select database");

// sending query
$result = mysql_query("SELECT * FROM {$table} ");
if (!$result) {
    die("Query to show fields from table failed");
} 


$result1 = mysql_query("select * from $table into outfile '/var/lib/mysql-files/$table.csv' fields terminated by ',' ");
	
    $file = "/var/lib/mysql-files/$table.csv";
    if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;}
?>

