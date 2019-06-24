<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class jenis_lovebird extends BaseType
{
    protected $attributes = [
        'name' => 'jenis_lovebird',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id'		=> 	[
                'name' 	=> 'id', 		
                'type' 	=> Type::int(),
            ],
            'nama'		=> 	[
                'name' 	=> 'nama', 		
                'type' 	=> Type::string(),
            ], 
        ];
    }
}
