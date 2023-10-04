<?php
require_once './app/Config/database.php';
require_once './app/controllers/ContaPagarController.php';

$controller = new ContaPagarController($pdo);

$action = $_GET['action'] ?? 'listar'; 

if ($action === 'adicionar') {
    $controller->adicionarContaPagar();
} 

$action1 = $_GET['action1'] ?? 'listar';

if ($action1 === 'visualizar') {
    $controller->buscarDadosContas();
}

$action2 = $_GET['action2'] ?? 'listar';

if ($action2 === 'filtrar') {
    $dadosContasFiltrados = $controller->renderizarTabelaFiltrada();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Teste Israel Alves - Titan Software</title> 

    <style>
        body{
            background: #efedee;
            font-family: 'Arial', sans-serif;
        }
        h2{
            font-size: 3rem;                        
            text-align: center;
            margin-top: 10rem;
        }
        .d-flex{
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }
        .btn-adicionar-pagamento{
            padding: 1rem 2rem;
            background: #26c2f1; 
            border-radius: 2rem;
            color: #fff;
            font-weight: 700;
            border: none;
            margin-left: 3rem;
            font-size: 1.1rem
        }
        .btn-visualizar-pagamento{
            padding: 1rem 2rem;
            background: #2bd130; 
            border-radius: 2rem;
            color: #fff;
            font-weight: 700;
            border: none;
            margin-left: 3rem;
            font-size: 1.1rem
        }
        .btn-filtro{
            padding: 1rem 2rem;
            background: #ffa500; 
            border-radius: 2rem;
            color: #fff;
            font-weight: 700;
            border: none;
            margin-left: 3rem;
            font-size: 1.1rem
        }
        .form-padrao{
            position: relative;
            margin: 4rem 8rem;            
            text-align: center;            
        }
        .form-padrao label{
            color: #878484; 
            margin: 0rem 1rem; 
            font-weight: 700;
            font-size: 0.9rem;          
        }
        .form-padrao input, .form-padrao select {
            background: #fff;
            border-radius: 1rem;
            height: 2.5rem;            
            border: none;
            margin: -0.6rem 1rem 0rem 1rem;
            padding-left: 1rem; 
        }
        .form-padrao .btn-submit{
            background: #e7340b;
            border-radius: 1rem;
            color: #fff;
            font-weight: 700;
            text-align: center;
            width: 12rem;            
        }
        .form-padrao .submit-filtro, .form-padrao .data-pagamento{
            width: 30rem;            
            margin-top: 1.8rem;
        }
        .title-files{
            font-size: 1.6rem;                        
            text-align: center;
            color: #918f8f;
            margin-top: 4rem;
        }
        table{
            margin: 4rem 12rem;            
            text-align: center;
            background: #fff;
        }
        thead{
            background: #c7c7c7;
            font-size: 0.9rem;                                  
        }
        th{
            padding: 0.6rem 1rem;
            text-align: center;           
        }
        td{
           padding: 2rem; 
        }
        .btn-editar, .btn-excluir, .btn-pago {
            border-radius: 1rem;
            padding: 0.5rem 1rem;
            border: none;
            color: #fff; 
            background: #6200ff;
            text-decoration: none;
        }
    </style>
</head>
<body>

<h2> Avaliação de Pagamentos</h2>
<div class="d-flex">    
    <form method="GET" action="index.php">
        <input type="hidden" name="action" value="adicionar"> 
        <input type="submit" value="Adicionar Conta a Pagar" class="btn-adicionar-pagamento"> 
    </form> 

    <form method="GET" action1="index.php">
        <input type="hidden" name="action1" value="visualizar"> 
        <input type="submit" value="Visualizar Pagamentos" class="btn-visualizar-pagamento"> 
    </form> 

    <form method="GET" action2="index.php">
        <input type="hidden" name="action2" value="filtrar"> 
        <input type="submit" value="Filtro" class="btn-filtro"> 
    </form>
</div>

</body>
</html>
