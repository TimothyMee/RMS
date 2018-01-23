<?php

return [
    'superadmin' => [
        'firstname' => 'Timothy',
        'lastname'   => 'Fadayini',
        'middlename'  => 'Mee',
        'identification_no' => '130202003',
        'password'  => 'secret',
        'email'     => 'timothy33.tf@gmail.com',
        'tel_no'     => '07088775522',
        'department_id' => 1,
        'role_id'   => 1,
        'staff_id' => 1,
    ],

    'roles'     => [
        ['name' => 'SuperAdmin', 'description' => 'Has all rights to any part of the system', 'staff_id' => 1, ]
    ],

    'department'   => [
        ['name' => 'ICT', 'college_name' => ''],
    ],

];