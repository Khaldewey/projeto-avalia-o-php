<?php 
	

 ?>
<div class="title-files">Adicionar Pagamento</div>
<form action="index.php?action=adicionar" method="POST" class="form-padrao">
    
    <label for="id_empresa">Empresa:</label>
    <select name="id_empresa" id="id_empresa">
        <?php foreach ($empresas as $empresa): ?>
        	<option value="<?= $empresa['id_empresa']; ?>"><?= $empresa['nome']; ?></option>
    	<?php endforeach; ?>
    </select> 

     
        <label for="data_pagar">Data de Pagamento:</label>
        <input type="date" name="data_pagar" id="data_pagar" required>

       
        <label for="valor">Valor a ser Pago (R$):</label>
        <input type="number" name="valor" id="valor" step="0.01" required>

        
        <input type="submit" value="Inserir/Editar" class="btn-submit" style="margin-top: 1.8rem;">
</form> 



