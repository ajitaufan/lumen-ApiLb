<?php

namespace App\GraphQL\Mutation\burung;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Model\Lovebird;
use App\Model\Image;

class tambahBurungMutation extends Mutation
{
    protected $attributes = [
        'name' => 'tambahBurungMutation',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return (GraphQL::type('burung'));
      
    }

    public function args()
    {
        return [
            'nama'		=> 	[
                'name' 	=> 'nama', 		
                'type' 	=> Type::string(),
            ], 
            'kode_ring'		=> 	[
                'name' 	=> 'kode_ring', 		
                'type' 	=> Type::string(),
            ], 
            
             
            'warna_mutasi'		=> 	[
                'name' 	=> 'warna_mutasi', 		
                'type' 	=> Type::string(),
            ], 
            
            'jenis_kelamin'		=> 	[
                'name' 	=> 'jenis_kelamin', 		
                'type' 	=> Type::string(),
            ], 
            'induk_jantan'		=> 	[
                'name' 	=> 'induk_jantan', 		
                'type' 	=> Type::string(),
            ], 
            'induk_betina'		=> 	[
                'name' 	=> 'induk_betina', 		
                'type' 	=> Type::string(),
            ], 
           
            'tanggal_lahir'		=> 	[
                'name' 	=> 'tanggal_lahir', 		
                'type' 	=> Type::string(),
            ], 

            
            'deskripsi'		=> 	[
                'name' 	=> 'deskripsi', 		
                'type' 	=> Type::string(),
            ], 
            'id_user'		=> 	[
                'name' 	=> 'id_user', 		
                'type' 	=> Type::int(),
            ], 
            'image'		=> 	[
                'name' 	=> 'image', 		
                'type' 	=> Type::string(),
            ], 
            'idjenis_lovebird'		=> 	[
                'name' 	=> 'idjenis_lovebird', 		
                'type' 	=> Type::int(),
            ], 
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $lovebird = new Lovebird();
        $lovebird->idjenis_lovebird=$args['idjenis_lovebird'];
        $lovebird->warna_mutasi=$args['warna_mutasi'];
        $lovebird->jenis_kelamin=$args['jenis_kelamin'];
        $lovebird->tanggal_lahir=$args['tanggal_lahir'];
        $lovebird->deskripsi=$args['deskripsi'];
        $args['nama']? $lovebird->nama = $args['nama']: '';
        $args['induk_jantan']? $lovebird->induk_jantan = $args['induk_jantan']: '';
        $args['induk_betina']? $lovebird->induk_betina = $args['induk_betina']: '';
        $lovebird->kode_ring=$args['kode_ring'];
        $lovebird->status=0;
        $lovebird->id_user=$args['id_user'];
        $lovebird->save();

        $image = new Image();
        $image->id_lovebird=$lovebird->id;
        $image->image=$args['image'];
        $image->save();

        return $lovebird;
    }
}
