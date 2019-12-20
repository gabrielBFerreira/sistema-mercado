<?php
    class ProductsController extends AppController
    {
        public $uses = ['Product', 'ProductType'];
        public function index()
        {
            $this->set('products',$this->Product->find('all'));
        }
        public function form($id = false)
        {            
            $this->set('product_types',$this->ProductType->find('all'));
            if(!isset($this->request->params['id']) && !$this->request->data)
                return;
            $id = !empty($this->request->data) ? $this->request->data['id'] : $this->request->params['id'];
            $product = $this->Product->findById($id);
            $this->set('product',$product);
            if(!$this->request->is(['post','put']))
                return;
            $this->Product->id = $id;
            if($this->Product->save($this->request->data)){
                $this->Flash->success(__('Produto '.$this->request->data['nome'].' cadastrado'));
                return $this->redirect(['action'=>'index']);
            }
            $this->Flash->error(__('Erro: não foi possível cadastrar o produto'));
        }
        public function delete($id)
        {
            $id = $this->request->params['id'];
            if($this->Product->delete($id))
                $this->Flash->success(__('Produto excluído'));
            else
                $this->Flash->error(__('Erro: não foi possível excluir o produto'));
            return $this->redirect(['action'=>'index']);
        }
        public function types()
        {
            $this->set('product_types',$this->ProductType->find('all'));
        }   
        public function formType($id=false)
        {
            if(!isset($this->request->params['id']) && !$this->request->data)
                return;
            $id = !empty($this->request->data) ? $this->request->data['id'] : $this->request->params['id'];
            $product_type=$this->ProductType->findById($id);
            $this->set('product_type',$product_type);
            if(!$this->request->is(['post','put']))
                return;
            $this->ProductType->id=$id;
            if($this->ProductType->save($this->request->data)){
                $this->Flash->success(__('Tipo '.$this->request->data['nome'].' cadastrado'));
                return $this->redirect(['action'=>'types']);
            }
            $this->Flash->error(__('Erro: não foi possível cadastrar o tipo'));
        }
        public function deleteType($id)
        {
            $id=$this->request->params['id'];
            if($this->ProductType->delete($id))
                $this->Flash->success(__('Tipo excluído'));
            else
                $this->Flash->error(__('Erro: não foi possível excluir o tipo'));
            return $this->redirect(['action'=>'types']);
        }
    }
?>