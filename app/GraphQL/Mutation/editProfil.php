<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Model\User;

class editProfil extends Mutation
{
    protected $attributes = [
        'name' => 'editProfil',
        'description' => 'A mutation'
    ];

    public function type()
    {      
          return (GraphQL::type('user'));

    }

    public function args()
    {
        return [
            'id'		=> 	[
                'name' 	=> 'id', 		
                'type' 	=> Type::int(),
            ],
            'id_breeder'		=> 	[
                'name' 	=> 'id_breeder', 		
                'type' 	=> Type::string(),
            ],
            'nama'		=> 	[
                'name' 	=> 'nama', 		
                'type' 	=> Type::string(),
            ],
            'noktp'		=> 	[
                'name' 	=> 'noktp', 		
                'type' 	=> Type::string(),
            ],
            'notelp'		=> 	[
                'name' 	=> 'notelp', 		
                'type' 	=> Type::string(),
            ],
            'alamat'		=> 	[
                'name' 	=> 'alamat', 		
                'type' 	=> Type::string(),
            ],
            'tanggal_lahir'		=> 	[
                'name' 	=> 'tanggal_lahir', 		
                'type' 	=> Type::string(),
            ],
            'password'		=> 	[
                'name' 	=> 'password', 		
                'type' 	=> Type::string(),
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $Account = User::where('id',$args['id'])->first();
        $args['nama']? $Account->nama = $args['nama']: '';
        $args['notelp']? $Account->no_telepon = $args['notelp']: '';
        $args['password']? $Account->password = $args['password']: '';
        $args['id_breeder']? $Account->id_breeder = $args['id_breeder']: '';
        $args['noktp']? $Account->noktp = $args['noktp']: '';
        $args['alamat']? $Account->alamat = $args['alamat']: '';
        $args['tanggal_lahir']? $Account->tanggal_lahir = $args['tanggal_lahir']: '';
        $Account->save();
        return $Account;
    }
}
