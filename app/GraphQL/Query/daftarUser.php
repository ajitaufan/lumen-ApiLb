<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Model\User;
class daftarUser extends Query
{
    protected $attributes = [
        'name' => 'daftarUser',
        'description' => 'A query'
    ];

    public function type()
    {
        return  Type::ListOf(GraphQL::type('user'));
    }

    public function args()
    {
        return [
             'id_user' => ['name' => 'id_user', 'type' => Type::Int()],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        
        if (isset($args['id_user'])) {
            return User::where('id' , $args['id_user'])->get();
         } else{
        return User::all();
       }
    }
}
