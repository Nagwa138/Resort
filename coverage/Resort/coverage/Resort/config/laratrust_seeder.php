<?php

return [
    'role_structure' => [
    
        'superadmin' => [
            'users' => 'c,r,u,d',
            'clients' => 'c,r,u,d',
            'posts' => 'c,r,u,d',
            'jobbers' => 'c,r,u,d',
            'locations' => 'c,r,u,d',
            'reviews' => 'c,r,u,d', 
            'rents' => 'c,r,u,d', 
                     
        ],
        
         'admin' => [
            'clients' => 'c,r,u,d',
            'posts' => 'c,r,u,d',
            'jobbers' => 'c,r,u,d',
            'locations' => 'c,r,u,d',
            'reviews' => 'c,r,u,d', 
            'rents' => 'c,r,u,d', 
             
         ],
        
        
        
        'admin of users' => [
            'users' => 'c,r,u,d',
        ],
        
        'admin of clients' => [
            'clients' => 'c,r,u,d',

        ],
        'admin of posts' => [
            'posts' => 'c,r,u,d',

        ],
        'admin of jobbers' => [
            'jobbers' => 'c,r,u,d',
        ],
        'admin of locations' => [
            'locations' => 'c,r,u,d',
        ],
        'admin of reviews' => [
            'reviews' => 'c,r,u,d',
        ],
       
        'admin of rents' => [
            'rents' => 'c,r,u,d',
        ],
       
    
    ],
    
    
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
