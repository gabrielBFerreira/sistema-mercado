<?php
    class Product extends AppModel
    {
        public $belongsTo = [
            'ProductType' => [
                'className' => 'ProductType',
                'foreignKey' => 'product_type_id'
            ]
        ];
    }
?>