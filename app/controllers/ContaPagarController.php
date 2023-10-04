<?php

require_once './app/config/database.php';
require_once './app/models/EmpresaModel.php'; 
require_once './app/models/ContaPagar.php';

class ContaPagarController {

    private $pdo; 
    private $empresaModel;
    private $contaPagar; 
    

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->empresaModel = new EmpresaModel($this->pdo);
        $this->contaPagar = new ContaPagar($this->pdo);
    } 

    public function buscarDadosContas(){
       
        $dadosContasPagar = $this->contaPagar->buscarDadosContasPagar(); 

        $empresaNomes = [];
    
    // Busque os nomes das empresas de uma só vez
        foreach ($dadosContasPagar as $conta) {
            $id_empresa = $conta['id_empresa'];
            if (!isset($empresaNomes[$id_empresa])) {
                $nomeEmpresa = $this->empresaModel->buscarNomeEmpresaPorId($id_empresa);
                $empresaNomes[$id_empresa] = $nomeEmpresa;
            }
        }
    
        
        require_once './app/views/pagamentos.php';
    } 


   public function renderizarTabelaFiltrada() {
    // Recupere os parâmetros de filtro da solicitação GET
    $empresa = $_GET['empresa'] ?? '';
    $operador = $_GET['operador'] ?? '';
    $valor = $_GET['valor'] ?? '';
    $data_pagar = $_GET['data_pagar'] ?? '';

    // Construa a consulta SQL com base nos filtros
    $sql = "SELECT * FROM tbl_conta_pagar WHERE 1=1";

    if (!empty($empresa)) {
        // Adicione o filtro por nome da empresa
        $sql .= " AND id_empresa = ?";
    }

    if (!empty($valor) && is_numeric($valor)) {
        // Adicione o filtro por valor a pagar com base no operador selecionado
        if ($operador == 'maior') {
            $sql .= " AND valor > ?";
        } elseif ($operador == 'menor') {
            $sql .= " AND valor < ?";
        } elseif ($operador == 'igual') {
            $sql .= " AND valor = ?";
        }
    }

    if (!empty($data_pagar)) {
        // Adicione o filtro por data de pagamento
        $sql .= " AND data_pagar = ?";
    }

    // Prepare a consulta SQL
    $stmt = $this->pdo->prepare($sql);

    // Associe os valores dos filtros aos parâmetros da consulta
    $params = [];
    if (!empty($empresa)) {
        $params[] = $empresa;
    }
    if (!empty($valor) && is_numeric($valor)) {
        $params[] = $valor;
    }
    if (!empty($data_pagar)) {
        $params[] = $data_pagar;
    }

    // Execute a consulta SQL com base nos filtros
    $stmt->execute($params);

    // Recupere os resultados da consulta
    $dadosContasFiltradas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Renderize a tabela com os resultados filtrados
    foreach ($dadosContasFiltradas as $conta) {
        // Renderize as linhas da tabela aqui...
    }
}  
    


    public function adicionarContaPagar() {
        $empresas = $this->empresaModel->listarEmpresas(); 

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $id_empresa = $_POST["id_empresa"];
            $data_pagar = $_POST["data_pagar"];
            $valor = $_POST["valor"];

            

            
            $this->contaPagar->setIdEmpresa($id_empresa);
            $this->contaPagar->setDataPagar($data_pagar);
            $this->contaPagar->setValor($valor);

            
            $this->contaPagar->adicionarConta($this->pdo);

            header("Location: index.php");
            exit();
        }

      
        require_once './app/views/add-conta-pagar.php';
    }
}
?>
