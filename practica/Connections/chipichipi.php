<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_chipichipi = "localhost";
$database_chipichipi = "personeria";
$username_chipichipi = "root";
$password_chipichipi = "";
$chipichipi = mysql_pconnect($hostname_chipichipi, $username_chipichipi, $password_chipichipi) or trigger_error(mysql_error(),E_USER_ERROR); 
?>