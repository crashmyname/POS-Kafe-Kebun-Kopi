<?php
try{
$db = new PDO('mysql:host=localhost;dbname=dbkafekebunkopi','root','');}
catch(PDOException $e)
{
print ("Tidak bisa terhubung ke server. Silahkan hubungi administrator.\n");
print ("getMessage(): ". $e->getMessage(). "\n");
exit;
}

date_default_timezone_set('Asia/Jakarta');
 error_reporting (E_ALL ^ (E_NOTICE | E_WARNING));

?>