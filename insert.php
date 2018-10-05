<?php

require_once("./conexao.php");
$nome = $_POST["nome_estudo"];
$desc = $_POST["desc_estudo"];
$sql = ("insert into tbestudo (nome, descricao) values (upper(:nome), upper(:desc))");

$stmt = Db::_conexao()->prepare($sql);
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
