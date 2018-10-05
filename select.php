<?php

require_once ("./conexao.php");
$id = $_REQUEST['id'];
$sql = ("select * from tbestudo where id_estudo = :id");
$stmt = Db::_conexao()->prepare($sql);
$stmt->bindValue(":id", $id);
$stmt->execute();
$stmt = $stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode($stmt);

