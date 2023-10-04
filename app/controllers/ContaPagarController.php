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
