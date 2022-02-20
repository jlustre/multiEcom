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
            $table->string('sponsor',30);
            $table->string('username',30)->unique();
            $table->string('email')->unique();
            $table->string('mobile',15)->nullable();
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->string('location', 150)->nullable();
            $table->string('description')->nullable();
            $table->string('expanded_url')->nullable();
            $table->integer('followers_count')->nullable();
            $table->integer('friends_count')->nullable();
            $table->integer('listed_count');
            $table->string('twitter_created_at', 10);
            $table->integer('favourites_count');
            $table->integer('statuses_count');
            $table->string('status', 150);
            $table->text('profile_image_url', 16777215)->nullable();
            $table->datetime('last_login')->nullable();
            $table->string('last_ip')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->boolean('is_active')->default(1);
            $table->softDeletes();
        });

        DB::table('users')->insert([
            'name' => 'Dummy',
            'sponsor' => 'Dummy',
            'username' => 'asbeez',
            'email' => 'dummy@asbeez.com',
            'password' => \Hash::make('secret'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'deleted_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'AsBeez User',
            'sponsor' => 'asbeez',
            'username' => 'jlustre',
            'firstname' => 'AsBeez',
            'lastname' => 'International',
            'email' => 'info@asbeez.com',
            'password' => \Hash::make('secret'),
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
