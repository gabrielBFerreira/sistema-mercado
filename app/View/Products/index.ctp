<h1>Produtos</h1>
<p><a href = '<?=$this->Html->url(['action'=>'form'])?>'>Adicionar produto</a></p>
<table>
    <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($products as $product):?>
        <tr>
            <td><?=$product['Product']['id']?></td>
            <td>
                <a href = '<?=$this->Html->url(["action"=>"form", "id" => $product['Product']['id']])?>'><?=$product['Product']['nome']?></a>
            </td>
            <td>
                <form action = '/produtos/excluir/<?=$product['Product']['id']?>' method = 'post'>
                    <input type = "submit" value = "Excluir">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
