<?php
    class SalesController extends AppController
    {
        public $uses = ['ClientsHasProduct','Client','Product'];
        public function index()
        {
            $this->set('sales',$this->ClientsHasProduct->find('all'));
        }
        public function form()
        {
            $this->set('products',$this->Product->find('all'));
            $this->set('clients',$this->Client->find('all'));
            if(!$this->request->is('post'))
                return;
            $valor_item_qtd=($this->request->data['preco']*$this->request->data['quantidade']);
            $valor_imposto_item=($this->request->data['preco']*($this->request->data['perc_imposto']/100));
            $valor_imposto_final=($valor_imposto_item*$this->request->data['quantidade']);
            $valor_compra_final=$valor_item_qtd+$valor_imposto_final; 
            $this->ClientsHasProduct->create();
            $this->ClientsHasProduct->set('valor_item_qtd',$valor_item_qtd);
            $this->ClientsHasProduct->set('valor_imposto_item',$valor_imposto_item);
            $this->ClientsHasProduct->set('valor_imposto_final',$valor_imposto_final);
            $this->ClientsHasProduct->set('valor_compra_final',$valor_compra_final);
            if($this->ClientsHasProduct->save($this->request->data)){
                $this->Flash->success(__('Venda cadastrada com sucesso'));
                return $this->redirect(['action'=>'index']);
            }
            $this->Flash->error(__('Erro: impossível cadastrar venda'));
        }
    }
?>