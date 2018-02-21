<?php

namespace App\Console\Commands;

use App\User;
use App\UserType;
use App\Department;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class InstallRms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Rms:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs defaults for the system.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        DB::transaction(function () {
            $this->setUserTypes();
            $this->setDepartment();
            $this->setDefaultUsers();
        });
    }

    public function setDepartment()
    {
        $department = new Department();

        foreach (config('default.department') as $defaultDepartment) {
            $department->createNew($defaultDepartment);
        }
        return ;
    }
    public function setDefaultUsers()
    {
        $user = new User();

        return $user->createNew(config('default.superadmin'));
    }

    public function setUserTypes()
    {
        $userType = new UserType();
        foreach (config('default.user_type') as $defaultRole) {
            $userType->createNew($defaultRole);
        }
        return ;
    }
}
