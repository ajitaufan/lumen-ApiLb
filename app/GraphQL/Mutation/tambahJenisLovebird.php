<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Model\JenisLovebird;

class tambahJenisLovebird extends Mutation
{
    protected $attributes = [
        'name' => 'tambahJenisLovebird',
        'description' => 'A mutation'
    ];

    public function type()
    {        
        return (GraphQL::type('jenis_lovebird'));

    }

    public function args()
    {
        return [
            'nama'		=> 	[
                'name' 	=> 'nama', 		
                'type' 	=> Type::string(),
            ], 
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $lovebird = new JenisLovebird();
        $lovebird->nama=$args['nama'];

        $lovebird->save();
        return $lovebird;
    }
}
