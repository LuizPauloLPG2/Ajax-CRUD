<?php

require_once("./conexao.php");
$id = $_REQUEST["id"];
$sql = ("delete from tbestudo where id_estudo = :id");
$stmt = Db::_conexao()->prepare($sql);
$stmt->bindValue(":id", $id);
$stmt->execute();

$retorno = $stmt;

if ($retorno) {
    echo "true";
} else {
    echo "false";
}

return $retorno;

echo json_encode($retorno);
