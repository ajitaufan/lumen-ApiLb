<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class wishlist extends BaseType
{
    protected $attributes = [
        'name' => 'wishlist',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id'		=> 	[
                'name' 	=> 'id', 		
                'type' 	=> Type::int(),
            ],
          
            'id_user' => [
                'args' => [
                    'id' => [
                        'type'        => Type::int(),
                        'description' => 'id user',
                    ],
                ],
                'type' => (GraphQL::type('user')),
                
                'resolve' => function ($root, $args) {
                   

                    return $root->wishlist;
                }
            ],
            'id_burung' => [
                'args' => [
                    'id' => [
                        'type'        => Type::int(),
                        'description' => 'id_burung',
                    ],
                ],
                'type' => (GraphQL::type('burung')),
                
                'resolve' => function ($root, $args) {
                

                    return $root->wishlistb;
                }
            ],
        ];
    }
}
