<?php
    class ProductsApiController extends AppController
    {
        public $uses = ['Product'];
        public function beforeFilter()
        {
            $this->layout = false;
            $this->autoRender = false;
        }
        public function index()
        {
            $response=['status'=>'failed','message'=>'Falha em processar requisição'];
            $result=$this->Product->find('all');
            if(empty($result))
                $response['message']='Nenhum dado correspondente encontrado';
            else
                $response=['status'=>'success','data'=>$result];
            return $this->responseAsJSON($response);
        }
        public function add()
        {
            $data = $this->request->input('json_decode',true);
            if(empty($data))
                $response=['status'=>'failed','message'=>'Favor enviar dados'];            
            else{
                if($this->Product->save($data))
                    $response=['status'=>'success','message'=>'Produto criado com sucesso'];
            }           
            return $this->responseAsJSON($response);
        }
        public function view($id=false)
        {
            $id=$this->request->params['id'];
            $response=['status'=>'failed','message'=>'Falha em processar requisição'];
            $result=$this->Product->findById($id);
            if(empty($result))
                $response['message']='Nenhum dado correspondente encontrado';
            else
                $response=['status'=>'success','data'=>$result];
            return $this->responseAsJSON($response);
        }
        public function edit($id=false)
        {
            $id=$this->request->params['id'];
            $data=$this->request->input('json_decode',true);
            if(empty($data))
                $response=['status'=>'failed','message'=>'Favor enviar dados'];
            else{
                if(empty($data['id']))
                    $response['message']="Favor informar ID do produto";
                else{
                    if($this->Product->save($data))
                        $response=['status'=>'success','message'=>'Produto atualizado com sucesso'];
                }
            }
            return $this->responseAsJSON($response);
        }
        public function delete($id=false)
        {
            $id=$this->request->params['id'];
            if($this->Product->delete($id,true))
                $response=['status'=>'success','message'=>'Produto excluído com sucesso'];
            else
                $response=['status'=>'failed','message'=>'Não foi possível excluir o produto'];
            return $this->responseAsJSON($response);
        }
    }
?>