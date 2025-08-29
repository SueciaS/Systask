<?php

include("../../connection/com.php");

if (empty($_REQUEST['NAME']) || empty($_REQUEST['EMAIL']) || empty($_REQUEST['PASSWORD']) || empty($_REQUEST['LEVEL'])) {

    $dados = array(
        "type" => "error",
        "message" => "Existe(m) campo(s) obrigatorio(s) que nao foram preenchido(s)"
    );
    exit();
}

else {
    try{
        $sql = "INSERT INTO USER (NAME, EMAIL, PASSWORD, LEVEL) VALUES (?, ?, ?, ?)";
        $stmt = $conn ->prepare($sql); //statement, valida sql
        $stmt ->execute([
            $_REQUEST['NAME'],
            $_REQUEST['EMAIL'],
            $_REQUEST['PASSWORD'],
            $_REQUEST['LEVEL']
        ]);

        $dados = array(
        "type" => "success",
        "message" => "Registro salvo com suceeso!"
        );

    } catch (PDOException $e) {
        $dados = array(
            "type" => "error",
            "message" => "Erro ao salvar registro: " . $e->getMessage()
        );
    }
}

$conn = null;
echo json_encode($dados);