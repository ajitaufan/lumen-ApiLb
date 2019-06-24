<?php

namespace App\GraphQL\Mutation;


use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use Illuminate\Support\Facades\DB;
use App\Model\User;
class registerUser extends Mutation
{
    protected $attributes = [
        'name' => 'registerUser',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return (GraphQL::type('user'));
    }

    public function args()
    {
        return [
            'username'		=> 	[
                'name' 	=> 'username', 		
                'type' 	=> Type::string(),
                'rules' => ['required', 'string'],
            ], 
            'password'		=> 	[
                'name' 	=> 'password', 		
                'type' 	=> Type::string(),
                'rules' => ['required', 'string'],
            ],
            
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        DB::beginTransaction();
        $Account = new user;
        $Account->username       = $args['username'];
        $Account->password       = $args['password'];
        // $Account->name           = $args['name'];
        // $Account->email          = $args['email'];
        // $Account->phone          = $args['phone'];
        // $Account->city           = $args['city'];
        // $Account->province       = $args['province'];
        // $Account->address        = $args['address'];
        // $Account->isAdmin        = $args['isAdmin'];
        $Account->save();
    
        // $Tourist = new Tourist;
        // $Tourist->nik            = $args['nik'];
        // $Tourist->id_account     = $Account->id;
        // $Tourist->save();
    
        DB::commit();
        return $Account;
        // }    
    }
}
