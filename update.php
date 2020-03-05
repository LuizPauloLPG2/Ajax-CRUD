<?php

require_once("./conexao.php");

$id = isset($_POST["id"]) ? $_POST["id"] : NULL;
$nome = isset($_POST["nome"]) $_POST["nome"] : NULL;
$desc = isset($_POST["descricao"]) ? $_POST["descricao"] : NULL;

$sql = ("update tbestudo set nome = upper(:nome), descricao = upper(:desc) where id_estudo = :id");

$stmt = Db::init()->prepare($sql);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$stmt->bindValue(":nome", $nome, PDO::PARAM_STR);
$stmt->bindValue(":desc", $desc, PDO::PARAM_STR);

$r = false;

if ($stmt->execute()) {
    $r = true;
}

echo json_encode($r);
