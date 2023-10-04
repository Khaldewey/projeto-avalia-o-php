<?php
require_once '../config/database.php'; // Certifique-se de incluir sua configuração de banco de dados
require_once '../models/ContaPagar.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $idContaPagar = $_GET["id"];
    
    // Aqui, você deve implementar a lógica para calcular desconto ou acréscimo
    // com base na data de pagamento e no ID da conta.
    
    // Exemplo simplificado:
    $contaPagar = new ContaPagar($pdo);
    $conta = $contaPagar->buscarContaPorId($idContaPagar);
    
    if ($conta) {
        $dataPagamento = strtotime($conta['data_pagar']); // Converter para timestamp
        $hoje = strtotime(date('Y-m-d')); // Timestamp de hoje
        
        // Calcular desconto ou acréscimo com base nas regras
        if ($hoje < $dataPagamento) {
            // Pagar antes da data de pagamento, aplicar desconto de 5%
            $valorComDesconto = $conta['valor'] * 0.95;
        } elseif ($hoje > $dataPagamento) {
            // Pagar após a data de pagamento, aplicar acréscimo de 10%
            $valorComDesconto = $conta['valor'] * 1.10;
        } else {
            // Pagar no dia do pagamento, não há desconto ou acréscimo
            $valorComDesconto = $conta['valor'];
        }
        
        // Atualize o status da conta como paga e o valor com desconto/acréscimo no banco de dados
        $contaPagar->setId($idContaPagar);
        $contaPagar->setPago(true);
        $contaPagar->setValor($valorComDesconto);
        $contaPagar->atualizarConta();
        
        // Redirecione para a página de listagem de contas
        header("Location: http://localhost/test-titan/index.php?action1=visualizar");
        exit();
    }
}

// Se algo der errado, redirecione para a página principal
header("Location: index.php");
exit();
