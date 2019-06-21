<?php
global $baseConnection; 
$baseConnection = new mysqli("localhost", "root", "", "Project");
if ($baseConnection->connect_errno) {
    exit();
}
?>