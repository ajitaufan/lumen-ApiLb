<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class image extends BaseType
{
    protected $attributes = [
        'name' => 'image',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id'		=> 	[
                'name' 	=> 'id', 		
                'type' 	=> Type::int(),
            ],
            'image'		=> 	[
                'name' 	=> 'image', 		
                'type' 	=> Type::string(),
            ], 
            'id_lovebird'		=> 	[
                'name' 	=> 'id_lovebird', 		
                'type' 	=> Type::int(),
            ], 
        ];
    }
}
