<?php
    class ClientsHasProduct extends AppModel
    {
        public $belongsTo = [
                'Product' => [
                    'className' => 'Product',
                    'foreignKey' => 'product_id'
                ],
                'Client' => [
                    'className' => 'Client',
                    'foreignKey' => 'client_id'
                ]
            ];
    }
?>