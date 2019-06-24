<?php

namespace App\GraphQL\Mutation\burung;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Model\Lovebird;
class editBurungMutation extends Mutation
{
    protected $attributes = [
        'name' => 'editBurungMutation',
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
         
            'deskripsi'		=> 	[
                'name' 	=> 'deskripsi', 		
                'type' 	=> Type::string(),
            ], 
            'status'		=> 	[
                'name' 	=> 'status', 		
                'type' 	=> Type::int(),
            ], 
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $lovebird = Lovebird::where('id', $args['id'])->first();
        
        $args['deskripsi']? $lovebird->deskripsi = $args['deskripsi']: '';

        if($args['status']=="private"){
            $lovebird->status = 0;
         }else{
            $lovebird->status = 1;

         }
       
        $lovebird->save();
        return $lovebird;
    }
}
