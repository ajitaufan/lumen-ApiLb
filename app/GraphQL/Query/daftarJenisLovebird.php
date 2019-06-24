<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Model\JenisLovebird;

class daftarJenisLovebird extends Query
{
    protected $attributes = [
        'name' => 'daftarJenisLovebird',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('jenis_lovebird'));

    }

    public function args()
    {
        return [
            
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        return JenisLovebird::all();
        
    }
}
