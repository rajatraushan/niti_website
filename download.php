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
if (!$result1) {
    echo "Already present" ;
	echo "<br>";
} 
else echo"Downloaded";







$fields_num = mysql_num_fields($result);

echo "<table border='1'><tr>";
// printing table headers
for($i=0; $i<$fields_num; $i++)
{
    $field = mysql_fetch_field($result);
    echo "<td>{$field->name}</td>";
}
echo "</tr>\n";
// printing table rows
while($row = mysql_fetch_row($result))
{
    echo "<tr>";

    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
     foreach($row as $cell)
        echo "<td>$cell</td>";

    echo "</tr>\n";
}
echo " ";

mysql_free_result($result);
?>
