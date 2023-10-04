<?php 
	// Recupere os dados do formulário

 ?>

<form action="index.php?action=adicionar" method="POST">
    <!-- Campo para selecionar a empresa -->
    <label for="id_empresa">Empresa:</label>
    <select name="id_empresa" id="id_empresa">
        <?php foreach ($empresas as $empresa): ?>
        	<option value="<?= $empresa['id_empresa']; ?>"><?= $empresa['nome']; ?></option>
    	<?php endforeach; ?>
    </select> 

     <!-- Campo para a data de pagamento -->
        <label for="data_pagar">Data de Pagamento:</label>
        <input type="date" name="data_pagar" id="data_pagar" required>

        <!-- Campo para o valor a ser pago -->
        <label for="valor">Valor a ser Pago (R$):</label>
        <input type="number" name="valor" id="valor" step="0.01" required>

        <!-- Botão para inserir a conta a pagar -->
        <input type="submit" value="Inserir/Editar">
</form> 



