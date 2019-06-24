<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Model\Wishlist;

class addWishlist extends Mutation
{
    protected $attributes = [
        'name' => 'addWishlist',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return (GraphQL::type('wishlist'));
    }

    public function args()
    {
        return [
            'id_user'		=> 	[
                'name' 	=> 'id_user', 		
                'type' 	=> Type::int(),
            ],
            'id_burung'		=> 	[
                'name' 	=> 'id_burung', 		
                'type' 	=> Type::int(),
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $Wishlist = new Wishlist();
        $Wishlist->id_user=$args['id_user'];
        $Wishlist->id_burung=$args['id_burung'];

        $Wishlist->save();
        return $Wishlist;
        
    }
}
