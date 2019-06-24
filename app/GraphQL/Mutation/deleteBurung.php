<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Model\Lovebird;

class deleteBurung extends Mutation
{
    protected $attributes = [
        'name' => 'deleteBurung',
        'description' => 'A mutation'
    ];

    public function type()
    {
        
        return (GraphQL::type('burung'));
    }

    public function args()
    {
        return [
            'id_burung'		=> 	[
                'name' 	=> 'id_burung', 		
                'type' 	=> Type::int(),
            ], 
            
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $delete= Lovebird::where('id',$args['id_burung'])->first();
        $delete->delete();
        return $delete;
    }
}
