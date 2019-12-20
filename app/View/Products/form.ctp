<h1>Adicionar Produto</h1>
<form action='<?=$this->Html->url(["action"=>"form"])?>' method='post'>
    <input type = "hidden" name = "id" value = "<?=!empty($product) ? $product['Product']['id'] : ''?>">
    <label for="nome">Nome</label>
    <input type = "text" name = "nome" value = "<?=!empty($product) ? $product['Product']['nome'] : ''?>">
    <label for="descricao">Descrição</label>
    <textarea name = "descricao" rows = "10"><?=!empty($product) ? $product['Product']['descricao'] : ''?></textarea>
    <label for="preco">Preço (R$)</label>
    <input type="number" name = "preco" min="0" step="0.01" value = "<?=!empty($product) ? $product['Product']['preco'] : '0.01'?>">
    <label for="product_type_id">Tipo</label>
    <select name="product_type_id">
        <?php foreach ($product_types as $product_type):?>
        <?php if($product['Product']['product_type_id'] == $product_type['ProductType']['id']):?>
            <option value = "<?= $product_type['ProductType']['id']?>" selected>
            <?=$product_type['ProductType']['nome']?></option>
        <?php else:?>
            <option value = "<?=$product_type['ProductType']['id']?>">
            <?=$product_type['ProductType']['nome']?></option>
        <?php endif;?>    
        <?php endforeach ?>
    </select>
    <input type="submit" value = "Salvar">
</form>