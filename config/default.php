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
        'user_type'   => 1,
        'staff_id' => 1,
        'gender' => 'Male',
        'DOB' => \Carbon\Carbon::today(),
        'address' => '10, kufeji Street, Alagomeji , Lagos',
        'image' => 'timothy.jpg',

    ],

    'user_type'     => [
        ['name' => 'SuperAdmin', 'description' => 'Has all rights to any part of the system', 'staff_id' => 1, ],
        ['name' => 'Admin', 'description' => 'Has rights to create,delete and update all except admins', 'staff_id' => 1, ],
        ['name' => 'Student', 'description' => 'The main subject of the Application', 'staff_id' => 1, ],
        ['name' => 'Professor', 'description' => 'Lecturers', 'staff_id' => 1, ],
    ],

    'department'   => [
        ['name' => 'ICT', 'college_name' => '', 'HOD' => 1],
    ],

];