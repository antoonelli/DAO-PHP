<?php 

require_once('config.php');



$sql = new Sql();

$comandoSql = 'SELECT * FROM login';

$login = $sql->select($comandoSql);



echo '<pre><br>';
echo json_encode($login).'<br>';
echo '</pre>';


















 ?>