<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sponsor');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->boolean('is_active')->default(1);
            $table->softDeletes();
        });

        DB::table('users')->insert([
            'name' => 'Dummy',
            'sponsor' => 'asbeez',
            'username' => 'asbeez',
            'email' => 'info@asbeez.com',
            'password' => \Hash::make('secret'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'deleted_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Joey Lustre',
            'sponsor' => 'asbeez',
            'username' => 'jlustre',
            'email' => 'jlustre@asbeez.com',
            'password' => \Hash::make('jocolus7'),
            'email_verified_at' => now(),
            'created_at' => now(),
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
