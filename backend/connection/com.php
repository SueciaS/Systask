<?php 
$hostname = "localhost";
$dbname = 'systask';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "A conexao com o banco de dados foi estabelecida com sucesso";
} catch (PDOException $e) {
    echo "Erro:" . $e->getMessage();
}

?>