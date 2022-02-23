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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('company_id')->default(1);
            $table->integer('role_id')->default(1);
            $table->string('phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // $table->foreignId('supplier_id')->constrained()->cascadeOnDelete();
            $table->rememberToken();
            $table->timestamps();
            $table->boolean('is_active')->default(1);
            $table->softDeletes();
        });

        DB::table('sellers')->insert([
            'name' => 'Asbeez Seller',
            'email' => 'info@asbeez.com',
            'phone' => '7783024500',
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
        Schema::dropIfExists('sellers');
    }
};
