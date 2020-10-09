<?php

return [
    'role_structure' => [
    
        'superadmin' => [
            'users' => 'c,r,u,d',
            'clients' => 'c,r,u,d',
            'posts' => 'c,r,u,d',
            'jobbers' => 'c,r,u,d',
            'locations' => 'c,r,u,d',
            'rents' => 'c,r,u,d',            
        ],
        
        
        'admin users' => [
            'users' => 'c,r,u,d',
        ],
        
        'admin clients' => [
            'clients' => 'c,r,u,d',

        ],
        'admin posts' => [
            'posts' => 'c,r,u,d',

        ],
        'admin jobbers' => [
            'jobbers' => 'c,r,u,d',
        ],
        'admin locations' => [
            'locations' => 'c,r,u,d',
        ],
        'admin rents' => [
            'reviews' => 'c,r,u,d',
        ],
       
    
    ],
    
    
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
