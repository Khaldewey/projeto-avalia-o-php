<div class="title-files">Filtro de Pagamentos</div>
<table style= "margin-left: 30%;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Empresa</th>
            <th>Data de Pagamento</th>
            <th>Valor (R$)</th>
            
        </tr>
    </thead>
    <tbody>
        
        <?php foreach ($dadosContasFiltrados as $conta): ?>
            
            <tr>
                <td><?= $conta['id_conta_pagar']; ?></td>
                <td><?= $empresaNomes[$conta['id_empresa']]; ?></td>
                <td><?= $conta['data_pagar']; ?></td>
                <td>R$ <?= number_format($conta['valor'], 2, ',', '.'); ?></td>
                
            </tr>
        <?php endforeach; ?>
    </tbody> 
</table>
