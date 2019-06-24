<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Model\Wishlist;

class wishlistUser extends Query
{
    protected $attributes = [
        'name' => 'wishlistUser',
        'description' => 'A query'
    ];

    public function type()
    {
        return type::listOf(GraphQL::type('wishlist'));
    }

    public function args()
    {
        return [
            'id_user'		=> 	[
                'name' 	=> 'id_user', 		
                'type' 	=> Type::int(),
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $Wishlist =  Wishlist::where('id_user','=',$args['id_user'])->get();
             return $Wishlist;
    }
}
