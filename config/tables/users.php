<?php
return [
    "fields" => [
        'name' => 'Nombre',
        'email' => 'Email',
        'roles_string' => 'Roles',
        'created_at' => 'Creado el'
    ],
    "routes" => [
        'index' => 'users.index',
        'create' => 'users.create',
        'store' => 'users.store',
        'seed' => 'users.seed',
        // Con parámetro
        'edit' => 'users.edit',
        'update' => 'users.update',
        'destroy' => 'users.destroy'
    ],
    "texts" => [
        "add" => "Agregar usuario",
        "edit" => "Editar",
        "delete" => "Borrar",
        "confirm_delete" => "¿Estas seguro de borrar el usuario?"
    ]
];
