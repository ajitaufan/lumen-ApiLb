<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class user extends BaseType
{
    protected $attributes = [
        'name' => 'user',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id'		=> 	[
                'name' 	=> 'id', 		
                'type' 	=> Type::int(),
                'rules' => ['required', 'integer'],
            ], 
            'username'		=> 	[
                'name' 	=> 'username', 		
                'type' 	=> Type::string(),
                'rules' => ['required', 'string'],
            ], 
            
             
            'no_telepon'		=> 	[
                'name' 	=> 'no_telepon', 		
                'type' 	=> Type::string(),
                'rules' => ['required', 'string'],
            ], 
            
            'nama'		=> 	[
                'name' 	=> 'nama', 		
                'type' 	=> Type::string(),
                'rules' => ['required', 'string'],
            ], 
           
           
            'isAdmin'		=> 	[
                'name' 	=> 'isAdmin', 		
                'type' 	=> Type::boolean(),
               
            ], 
            'status'		=> 	[
                'name' 	=> 'status', 		
                'type' 	=> Type::boolean(),
               
            ], 
          
        ];
    }
}

