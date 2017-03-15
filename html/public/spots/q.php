<?php
$_conf['db_base'] = 'CSGOSPOTS';//БАЗА
$_conf['db_user'] = 'root';//ПОЛЬЗОВАТЕЛЬ
$_conf['db_pass'] = '1010a2020z3030';//Пароль
$_conf['db_host'] = 'localhost';
// Name of the file
$filename = 'b.sql';
// MySQL host
$mysql_host = $_conf['db_host'];
// MySQL username
$mysql_username = $_conf['db_user'];
// MySQL password
$mysql_password = $_conf['db_pass'];
// Database name
$mysql_database = $_conf['db_base'];

// Connect to MySQL server
mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
// Select database
mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());

// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

// Add this line to the current segment
$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
    // Perform the query
    mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
    // Reset temp variable to empty
    $templine = '';
}
}
 echo "Tables imported successfully";
?>