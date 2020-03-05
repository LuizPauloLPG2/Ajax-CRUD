<?php

require_once("./conexao.php");

$id = isset($_POST["id"]) ? $_POST["id"] : NULL;

$sql = ("delete from tbestudo where id_estudo = :id");
$stmt = Db::init()->prepare($sql);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);

$r = null;

if ($stmt->execute()) {
    $r = "true";
} else {
    $r = "false";
}

echo json_encode($r);
