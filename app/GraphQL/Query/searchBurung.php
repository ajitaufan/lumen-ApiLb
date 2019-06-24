<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Model\Lovebird;
use App\Model\JenisLovebird;

class searchBurung extends Query
{
    protected $attributes = [
        'name' => 'searchBurung',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('burung'));

    }

    public function args()
    {
        return [
            'key' => ['name' => 'key', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if(isset($args['key'])){
       
            $burung = Lovebird::where('nama', 'like', $args['key'].'%')->where('status','=','1')
                    ->orWhere('warna_mutasi', 'like', $args['key'].'%')->where('status','=','1')
->get();
            }
           
             return   $burung;
    }
}
