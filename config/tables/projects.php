<?php
return [
    "fields" => [
        'name' => 'Nombre',
        'description' => 'Descripción',
        'hours' => 'Horas',
        'starting_date' => 'Fecha de inicio'
    ],
    "routes" => [
        'index' => 'projects.index',
        'create' => 'projects.create',
        'store' => 'projects.store',
        'seed' => 'projects.seed',
        // Con parámetro
        'edit' => 'projects.edit',
        'update' => 'projects.update',
        'destroy' => 'projects.destroy'
    ],
    "texts" => [
        "add" => "Agregar proyecto",
        "edit" => "Editar",
        "delete" => "Borrar",
        "confirm_delete" => "¿Estas seguro de borrar el proyecto?"
    ]
];
