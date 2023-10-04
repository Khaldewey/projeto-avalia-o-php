<?php
require_once './app/Config/database.php';
require_once './app/controllers/ContaPagarController.php';

$controller = new ContaPagarController($pdo);

$action = $_GET['action'] ?? 'listar'; // Altere de $_GET para $_POST

switch ($action) {
    case 'adicionar':
        $controller->adicionarContaPagar();
        break;
    // Outros casos aqui
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teste Israel Alves - Titan Software</title> 
    
</head>
<body>

<form method="GET" action="index.php">
    <input type="hidden" name="action" value="adicionar"> 
    <input type="submit" value="Adicionar Conta a Pagar">
</form>

</body>
</html>
