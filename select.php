<?php

require_once ("./conexao.php");

$id = isset($_POST['id']) ? $_POST['id'] : NULL;

$sql = ("select * from tbestudo where id_estudo = :id");

$stmt = Db::init()->prepare($sql);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$stmt->execute();
$stmt = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($stmt);

