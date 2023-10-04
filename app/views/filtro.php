

<form method="GET" action="index.php?action2=filtrar" class="form-padrao">
    <input type="hidden" name="action2" value="filtrar">
    
    <label for="empresa">Empresa:</label>
    <input type="text" name="empresa" id="empresa">
    
    <label for="operador">Operador:</label>
    <select name="operador" id="operador">
        <option value="maior">Maior que</option>
        <option value="menor">Menor que</option>
        <option value="igual">Igual a</option>
    </select>

    <label for="valor">Valor:</label>
    <input type="text" name="valor" id="valor">
    <div class="d-flex">
        <div class="data-pagamento">
            <label for="data_pagar">Data de Pagamento:</label>
            <input type="date" name="data_pagar" id="data_pagar">
        </div>
        
        <div class="submit-filtro">
            <input type="submit" value="Filtrar" class="btn-submit">
        </div>
    </div>    
</form>
<?php


