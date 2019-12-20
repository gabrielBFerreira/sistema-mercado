<h1>Vendas</h1>
<p><a href = '<?=$this->Html->url(['action'=>'form'])?>'>Cadastrar venda</a></p>
<table>
    <tr>
        <th>Código</th>
        <th>Cliente</th>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Valor de item sobre qtd.</th>
        <th>Valor de imposto (individual)</th>
        <th>Valor final (impostos)</th>
        <th>Valor final (total)</th>
        <th>Realizada em</th>
    </tr>
    <?php foreach ($sales as $sale):?>
        <tr>
            <td><?=$sale['ClientsHasProduct']['id']?></td>
            <td><?=$sale['Client']['nome']?></td>
            <td><?=$sale['Product']['nome']?></td>
            <td><?=$sale['ClientsHasProduct']['quantidade']?></td>
            <td><?=$this->Number->currency($sale['ClientsHasProduct']['valor_item_qtd'], 'EUR',['before'=>'R$'])?></td> 
            <td><?=$this->Number->currency($sale['ClientsHasProduct']['valor_imposto_item'], 'EUR',['before'=>'R$'])?></td> 
            <td><?=$this->Number->currency($sale['ClientsHasProduct']['valor_imposto_final'], 'EUR',['before'=>'R$'])?></td> 
            <td><?=$this->Number->currency($sale['ClientsHasProduct']['valor_compra_final'], 'EUR',['before'=>'R$'])?></td> 
            <td><?=$this->Time->format($sale['ClientsHasProduct']['created'], '%d/%m/%y, %H:%M:%S')?></td>
        </tr>
    <?php endforeach; ?>
</table>
