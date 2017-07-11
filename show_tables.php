<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>niti_aayog\search</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/bootstrap/fonts/font-awesome.min.css">
</head>

<body>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand navbar-link" href="https://www.niti.gov.in"><img src="assets/img/logo.jpg" id="logo"><strong>Data Portal</strong></a>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active" role="presentation"><a href="homepage.html">Home </a></li>
                    <li role="presentation"><a href="search.html">Search </a></li>
                    <li role="presentation"><a href="compare.html">Compare </a></li>
			<li role="presentation"><a href="map.html">Map</a></li>
			<li role="presentation"><a href="download.html">Download</a></li>
                </ul>
            </div>
        </div>
    </nav>
	<script>
function msg() {
    alert("Hello world!");
}
</script>
"


<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pwd = '';
$db = $_POST['database'];
if (!mysql_connect($db_host, $db_user, $db_pwd))
    die("Can't connect to database");
if (!mysql_select_db($db))
    die("Can't select database");
$result = mysql_query("SHOW TABLES ");
if (!$result) {
    die("Query to show fields from table failed");
} 
$fields_num = mysql_num_fields($result);
echo "<table border='1' color=blue><tr>";
for($i=0; $i<$fields_num; $i++)
{
    $field = mysql_fetch_field($result);
    echo "<td>{$field->name}</td>";
}
echo "</tr>\n";
while($row = mysql_fetch_row($result))
{
    echo "<tr>";
     foreach($row as $cell)
        echo "<td>$cell</td>";
    
	echo "</tr>\n";
}
mysql_free_result($result);
?>
</body>


</html>
