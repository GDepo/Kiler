<?php
try {
     $db = new PDO("mysql:host=localhost;dbname=kiler", "root", "");
     
} catch ( PDOException $e ){
     print $e->getMessage();

}
?>