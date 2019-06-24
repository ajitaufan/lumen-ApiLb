<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;
use Carbon\Carbon;

class burung extends BaseType
{
    protected $attributes = [
        'name' => 'burung',
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
            'kode_ring'		=> 	[
                'name' 	=> 'kode_ring', 		
                'type' 	=> Type::string(),
            ], 
                        
            'warna_mutasi'		=> 	[
                'name' 	=> 'warna_mutasi', 		
                'type' 	=> Type::string(),
            ], 
            
            'jenis_kelamin'		=> 	[
                'name' 	=> 'jenis_kelamin', 		
                'type' 	=> Type::string(),
            ], 
            'tanggal_lahir'		=> 	[
                'name' 	=> 'tanggal_lahir', 		
                'type' 	=> Type::string(),
               ],

            'harga'		=> 	[
                'name' 	=> 'harga', 		
                'type' 	=> Type::int(),
            ], 
           
            
            'dijual'		=> 	[
                'name' 	=> 'dijual', 		
                'type' 	=> Type::boolean(),
               
            ], 
            'status'		=> 	[
                'name' 	=> 'status', 		
                'type' 	=> Type::boolean(),
               
            ], 
            
            'deskripsi'		=> 	[
                'name' 	=> 'deskripsi', 		
                'type' 	=> Type::string(),
            ],
            'induk_jantan'		=> 	[
                'name' 	=> 'induk_jantan', 		
                'type' 	=> Type::string(),
            ],
            'induk_betina'		=> 	[
                'name' 	=> 'induk_betina', 		
                'type' 	=> Type::string(),
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
                    if (isset($args['id'])) {
                        return  $root->lovebird->where('id_user', $args['id']);
                    }

                    return $root->lovebird;
                }
            ],
            'jenis_lovebird' => [
                'args' => [
                    'id' => [
                        'type'        => Type::int(),
                        'description' => 'id jenis lovebird',
                    ],
                ],
                'type' => (GraphQL::type('jenis_lovebird')),
                
                'resolve' => function ($root, $args) {
                  

                    return $root->jenislovebird;
                }
            ],
            'image' => [
                'args' => [
                    'id_lovebird' => [
                        'type'        => Type::int(),
                        'description' => 'id image burung',
                    ],
                ],
                'type' => (GraphQL::type('image')),
                
                'resolve' => function ($root, $args) {
                    if (isset($args['id_lovebird'])) {
                        return  $root->image->where('id_lovebird', $args['id_lovebird']);
                    }

                    return $root->image;
                }
            ],
        ];
    }
}
