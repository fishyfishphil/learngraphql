<?php

namespace App\GraphQL\Mutation;

use App\User;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class UpdateUserMutation extends Mutation
{

    protected $attributes = [
        'name' => 'UpdateUser',
    ];

    public function type()
    {
        return GraphQL::type('user');
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::nonNull(Type::string())],
            'name' => ['name' => 'name', 'type' => Type::string()],
            'email' => ['name' => 'email', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args)
    {
        $user = User::find($args['id']);
        if (!$user) {
            return null;
        }

        $user->name = (isset($args['name'])) ? $args['name'] : $user->name;
        $user->email = (isset($args['email'])) ? $args['email'] : $user->email;
        $user->save();

        return $user;
    }

}