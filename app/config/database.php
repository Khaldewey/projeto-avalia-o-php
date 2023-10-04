
<?php
// Configuração da conexão com o banco de dados
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'test_titan_db';

try {
    
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);

    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>
