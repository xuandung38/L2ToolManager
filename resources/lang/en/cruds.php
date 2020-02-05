<?php

return [
    'userManagement' => [
        'title' => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title' => 'Permissions',
        'title_singular' => 'Permission',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'title' => 'Title',
            'title_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role' => [
        'title' => 'Roles',
        'title_singular' => 'Role',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'title' => 'Title',
            'title_helper' => '',
            'permissions' => 'Permissions',
            'permissions_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'user' => [
        'title' => 'Users',
        'title_singular' => 'User',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'name' => 'Name',
            'name_helper' => '',
            'email' => 'Email',
            'email_helper' => '',
            'email_verified_at' => 'Email verified at',
            'email_verified_at_helper' => '',
            'password' => 'Password',
            'password_helper' => '',
            'roles' => 'Roles',
            'roles_helper' => '',
            'remember_token' => 'Remember Token',
            'remember_token_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'key_tool' => [
        'title' => 'Keys Tool List',
        'title_singular' => 'Key Tool',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'key' => 'Key',
            'key_helper' => '',
            'machine_name' => 'Machine Name',
            'machine_name_helper' => '',
            'user' => 'User',
            'user_helper' => '',
            'status' => 'Status',
            'status_helper' => '',
            'expired_at' => 'Expired at',
            'expired_at_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
            'is_active' => [
                'name' => 'Active',
                '0' => 'Deactivated',
                '1' => 'Activated',
            ],
        ],
    ],
    'account' => [
        'title' => 'Accounts List',
        'title_singular' => 'Account',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'name' => 'Name',
            'name_helper' => '',
            'server' => 'Server',
            'server_helper' => '',
            'planet'        => 'Planet',
            'planet_helper' => '',
            'power' => 'Power',
            'power_helper' => '',
            'gem' => 'Gem',
            'gem_helper' => '',
            'missions' => 'Missions',
            'missions_helper' => '',
            'map' => 'Map',
            'map_helper' => '',
            'login_at' => 'Login at',
            'login_at_helper' => '',
            'status' => 'Status',
            'status_helper' => '',
            'expired_at' => 'Expired at',
            'expired_at_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
            'status_name' => [
                '0' => 'READY',
                '1' => 'PROCESSING',
                '2' => 'HANG_ON',
                '3' => 'UPGEM',
                '4' => 'COMPLETED',
            ],
        ],

    ],
];
