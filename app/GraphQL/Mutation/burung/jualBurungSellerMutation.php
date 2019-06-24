<?php

namespace App\GraphQL\Mutation\burung;


use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Model\Lovebird;

class jualBurungSellerMutation extends Mutation
{
    protected $attributes = [
        'name' => 'jualBurungSellerMutation',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return (GraphQL::type('burung'));
    }

    public function args()
    {
        return [
            'id'		=> 	[
                'name' 	=> 'id', 		
                'type' 	=> Type::int(),
            ], 
            'harga'		=> 	[
                'name' 	=> 'harga', 		
                'type' 	=> Type::int(),
            ], 
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $lovebird = Lovebird::where('id', $args['id'])->first();
        $lovebird->status = 1;
        $lovebird->dijual = 1;
       $lovebird->harga = $args['harga'];
     
        $lovebird->save();
        return $lovebird;
    }
}
