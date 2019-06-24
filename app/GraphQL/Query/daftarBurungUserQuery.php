<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Model\Lovebird;
use App\Model\JenisLovebird;

class daftarBurungUserQuery extends Query
{
    protected $attributes = [
        'name' => 'daftarBurungUserQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('burung'));

    }

    public function args()
    {
        return [
            'id_user' => ['name' => 'id_user', 'type' => Type::Int()],
            'id_burung' => ['name' => 'id_burung', 'type' => Type::Int()],
            'id_jburung' => ['name' => 'id_jburung', 'type' => Type::Int()],

        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
       if (isset($args['id_user']) && isset($args['id_jburung']) ){
           $jenis=JenisLovebird::where('id','=',$args['id_jburung'])->first();
 
        return Lovebird::where('id_user' , $args['id_user'])->where('idjenis_lovebird','=',$jenis->id)->get();
       
       
       } else if (isset($args['id_user'])) {
            return Lovebird::where('id_user' , $args['id_user'])->get();
       
        }else if(isset($args['id_burung'])){
            return Lovebird::where('id' , $args['id_burung'])->get();
            
        }
    }
}
