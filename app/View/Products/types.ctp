<h1>Tipos de produto</h1>
<p><a href = '<?=$this->Html->url(['action'=>'formType'])?>'>Adicionar tipo de produto</a></p>
<table>
    <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($product_types as $product_type):?>
        <tr>
            <td><?=$product_type['ProductType']['id']?></td>
            <td>
                <a href = '<?=$this->Html->url(["action"=>"formType", "id" => $product_type['ProductType']['id']])?>'><?=$product_type['ProductType']['nome']?></a>
            </td>
            <td>
                <form action = '/produtos/tipos/excluir/<?=$product_type['ProductType']['id']?>' method = 'post'>
                    <input type = "submit" value = "Excluir">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
