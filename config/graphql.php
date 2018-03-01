<?php

use App\GraphQL\Query\UsersQuery;
use App\GraphQL\Type\UsersType;

return [
    'prefix' => 'graphql',
    'routes' => 'query/{graphql_schema?}',
    'controllers' => \Rebing\GraphQL\GraphQLController::class . '@query',
    'middleware' => [],
    'default_schema' => 'default',
    // register query
    'schemas' => [
        'default' => [
            'query' => [
                'users' => 'App\GraphQL\Query\UsersQuery'
            ],
            'mutation' => [
                'updateUserPassword' => 'App\GraphQL\Mutation\UpdateUserPasswordMutation',
                'updateUser' => 'App\GraphQL\Mutation\UpdateUserMutation'
            ],
            'middleware' => [],
        ],
    ],
    // register types
    'types' => [
        'user' => 'App\GraphQL\Type\UserType'
    ],
    'error_formatter' => ['\Rebing\GraphQL\GraphQL', 'formatError'],
    'params_key' => 'params',
];