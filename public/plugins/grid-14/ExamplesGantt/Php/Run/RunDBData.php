<?php
// ! Support file only, run Basic.html instead !
// This file is used as both Data_Url and Upload_Url
// Generates data for TreeGrid when no data received or saves received changes to database
// Single file, without using TreeGridFramework.php

// --- Database switching ---

// Uses PHP-TXT-DB-API textual database; uses database in directory ../Database
define("API_HOME_DIR" ,"../php-txt-db-api/"); // Sets path to PHP TXT DB database script 
require_once("../Framework/IncDbTxt.php"); $db = new Database("../Database");

// Uncomment this line to use SQLite3 database; uses database in file ../Database.db
//require_once("../Framework/IncDbSQLite3.php"); $db = new Database("../Database.db");

// Uncomment this line to use MS Access database via ODBC; uses database in file ../Database.mdb
//require_once("../Framework/IncDbOdbc.php"); $db = new Database("DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=".dirname(__FILE__)."/../Database.mdb");
// Note, for some ODBC drivers you may need to convert all strings from / to UTF8 encoding like: mb_convert_encoding($string,'UTF-8','Windows-1252');

// Uncomment this line to use MS Access database via MS ADO; uses database in file ../Database.mdb
//require_once("../Framework/IncDbAdo.php"); $db = new Database("DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=".dirname(__FILE__)."/../Database.mdb");

// Uncomment this line to use MySQL database; it uses database table created by provided MySqlUTF8.sql script
//require_once("../Framework/IncDbMySQL.php"); $db = new Database("TreeGridTest","root","your root password");
// Before use, run the /Examples/Php/MySqlUTF8.sql script in your MySql database engine. 
// MySQL must be in UTF8 encoding to store the characters correctly!
// The SQL script can be run on database by: mysql.exe -uroot -p < MySqlUTF8.sql. 
// Update paths or copy MySqlUTF8.sql to the MySQL /bin directory and run it here.

// --- response initialization ---
header("Content-Type: text/xml; charset=utf-8"); 
header("Cache-Control: max-age=1; must-revalidate");

// --------------------------------------------------------------------------
$rows = $db->Query("SELECT * FROM Run"); $rows = $rows->GetRows();
echo "<Grid><Body><B>";
foreach($rows as $row){
   echo "<I id='" . $row["id"] . "'" 
         . " T='" . htmlspecialchars($row["T"],ENT_QUOTES) . "'"
         . " S='" . $row["S"] . "'"
         . " R='" . htmlspecialchars($row["R"],ENT_QUOTES) . "'"
         . "/>\n";
   }
echo "</B></Body></Grid>";

// --------------------------------------------------------------------------
?>