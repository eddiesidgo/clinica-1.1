<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $role1= Role::create(['name'=>'admin']);
        $role2= Role::create(['name'=>'secre']);
        $role3= Role::create(['name'=>'doctoe']);
        $user = User::find(33);
        $user->assignRole($role1);
        $user = User::find(34);
        $user->assignRole($role2);
        $user = User::find(35);
        $user->assignRole($role3);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
};
