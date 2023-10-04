<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Conta a Pagar</title>
</head>
<body>
    <h1>Editar Conta a Pagar</h1>
    
    <?php if ($conta): ?>
        <form method="POST">
            <label for="nova_data_pagar">Nova Data de Pagamento:</label>
            <input type="date" name="nova_data_pagar" id="nova_data_pagar" value="<?= $conta['data_pagar']; ?>">
            
            <label for="novo_valor">Novo Valor (R$):</label>
            <input type="text" name="novo_valor" id="novo_valor" value="<?= $conta['valor']; ?>">
            
            <input type="submit" value="Salvar Alterações">
        </form>
    <?php else: ?>
        <p>A conta não foi encontrada ou não existe.</p>
    <?php endif; ?>
</body>
</html>