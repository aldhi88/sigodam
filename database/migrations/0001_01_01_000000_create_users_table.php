<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        $data = [
            ['id' => 1, 'name' => 'Administrator'],
            ['id' => 2, 'name' => 'Operator']
        ];
        Role::insert($data);

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('nickname');
            $table->timestamps();
        });

        $data = [
            ['id' => 1, 'role_id' => 1, 'username' => 'admin', 'password' => Hash::make('admin'), 'nickname' => 'Admin'],
        ];
        User::insert($data);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
    }
};
