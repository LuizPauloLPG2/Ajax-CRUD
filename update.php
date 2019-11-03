<?php

require_once("./conexao.php");

$id = $_POST["id"];
$nome = $_POST["nome"];
$desc = $_POST["descricao"];

$sql = ("update tbestudo set nome = upper(:nome), descricao = upper(:desc) where id_estudo = :id");

$stmt = Db::init()->prepare($sql);
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
