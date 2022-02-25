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
        Schema::create('unit_sizes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('piece');
            $table->string('sname')->nullable();
            $table->enum('type', ['L', 'W', 'P', 'V', 'A'])->nullable();
            $table->timestamps();
        });

        // lenghts
        DB::table('unit_sizes')->insert([ 'name' => 'meter', 'sname' => 'm', 'type' => 'L', 'created_at' => now()]);
        DB::table('unit_sizes')->insert([ 'name' => 'inch', 'sname' => 'in', 'type' => 'L', 'created_at' => now()]);

        // areas
        DB::table('unit_sizes')->insert([ 'name' => 'sq. meters', 'sname' => 'sqm', 'type' => 'A', 'created_at' => now()]);
        DB::table('unit_sizes')->insert([ 'name' => 'sq. inches', 'sname' => 'sqi', 'type' => 'A', 'created_at' => now()]);
       
        // weights
        DB::table('unit_sizes')->insert([ 'name' => 'kilograms', 'sname' => 'kg', 'type' => 'W', 'created_at' => now()]);
        DB::table('unit_sizes')->insert([ 'name' => 'grams', 'sname' => 'g', 'type' => 'W', 'created_at' => now()]);

        // volume
        DB::table('unit_sizes')->insert([ 'name' => 'gallon', 'sname' => 'gal', 'type' => 'V', 'created_at' => now()]);
        DB::table('unit_sizes')->insert([ 'name' => 'liter', 'sname' => 'l', 'type' => 'V', 'created_at' => now()]);
        DB::table('unit_sizes')->insert([ 'name' => 'mililiter', 'sname' => 'ml', 'type' => 'V', 'created_at' => now()]);
        DB::table('unit_sizes')->insert([ 'name' => 'ounch', 'sname' => 'oz', 'type' => 'V', 'created_at' => now()]);
        
        // packages
        DB::table('unit_sizes')->insert([ 'name' => 'piece', 'sname' => 'pc', 'type' => 'P', 'created_at' => now()]);
        DB::table('unit_sizes')->insert([ 'name' => 'package', 'sname' => 'pkg', 'type' => 'P', 'created_at' => now()]);
        DB::table('unit_sizes')->insert([ 'name' => 'case', 'sname' => 'cs', 'type' => 'P', 'created_at' => now()]);
        DB::table('unit_sizes')->insert([ 'name' => 'dozen', 'sname' => 'doz', 'type' => 'P', 'created_at' => now()]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unit_sizes');
    }
};
