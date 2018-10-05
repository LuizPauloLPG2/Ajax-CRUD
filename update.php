<?php

require_once("./conexao.php");
$id = $_REQUEST["id"];
$nome = $_REQUEST["nome"];
$desc = $_REQUEST["descricao"];

$sql = ("update tbestudo set nome = upper(:nome), descricao = upper(:desc) where id_estudo = :id");
$stmt = Db::_conexao()->prepare($sql);
$stmt->bindValue(":id", $id);
$stmt->bindValue(":nome", $nome);
$stmt->bindValue(":desc", $desc);
$stmt->execute();

$retorno = $stmt;

if ($retorno) {
    echo "true";
} else {
    echo "false";
}

return $retorno;
echo json_encode($retorno);
