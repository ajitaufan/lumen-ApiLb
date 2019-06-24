<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Model\User;
class login extends Mutation
{
    protected $attributes = [
        'name' => 'login',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return (GraphQL::type('user'));
        
    }

    public function args()
    {
        return [
        	'username'		=> 	[
                'name' 	=> 'username', 		
                'type' 	=> Type::string(),
                'rules' => ['required', 'string'],
            ],
            'password'		=> 	[
                'name' 	=> 'password', 		
                'type' 	=> Type::string(),
                'rules' => ['required', 'string'],
            ],
          
];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $Account = User::where('username',$args['username'])->first();

		//////////////////
		// Authenticate //
		//////////////////
		if (!$Account)
		{
			throw new \Exception("Invalid authentication", 1000);
		}

		if (!app('hash')->check($args['password'], $Account->password))
		{
			throw new \Exception("Invalid authentication", 1000);
		}


		// Return
		return 	$Account;
    }
}
