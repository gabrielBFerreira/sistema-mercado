<h1>Adicionar Tipo de produto</h1>
<form action='<?=$this->Html->url(["action"=>"formType"])?>' method='post'>
    <input type = "hidden" name = "id" value = "<?=!empty($product_type) ? $product_type['ProductType']['id'] : ''?>">
    <label for="nome">Nome</label>
    <input type = "text" name = "nome" value = "<?=!empty($product_type) ? $product_type['ProductType']['nome'] : ''?>">
    <label for="descricao">Descrição</label>
    <textarea name = "descricao" rows = "10"><?=!empty($product_type) ? $product_type['ProductType']['descricao'] : ''?></textarea>
    <label for="preco">Percentual de imposto</label>
    <input type="number" name = "perc_imposto" min="0" step="0.01" value = "<?=!empty($product_type) ? $product_type['ProductType']['perc_imposto'] : '0.01'?>">
    <input type="submit" value = "Salvar">
</form>