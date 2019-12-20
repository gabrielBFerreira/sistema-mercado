<h1>Cadastrar Venda</h1>
<form action='<?=$this->Html->url(["action"=>"form"])?>' method='post'>
    <label for="client_id">Cliente</label>
    <select name="client_id">
        <?php foreach ($clients as $client):?>
            <option value = "<?=$client['Client']['id']?>">
            <?=$client['Client']['nome']?></option>
        <?php endforeach ?>
    </select>
    <label for="product_id">Produto</label>
    <select name="product_id">
        <?php foreach ($products as $product):?>
            <option value = "<?=$product['Product']['id']?>">
            <?=$product['Product']['nome']?></option>
            <input type = "hidden" name = "preco" value = "<?=$product['Product']['preco']?>">
            <input type = "hidden" name = "perc_imposto" value = "<?=$product['ProductType']['perc_imposto']?>">
        <?php endforeach ?>
    </select>
    <label for="quantidade">Quantidade</label>
    <input type="number" name="quantidade" min="1" step="1" value = "1">
    <input type="submit" value = "Salvar">
</form>