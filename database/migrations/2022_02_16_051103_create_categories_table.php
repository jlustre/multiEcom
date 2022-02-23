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
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0);
            $table->foreignId('user_id')->default(1)->constrained(); 
            $table->string('category_name');
            $table->string('photo')->nullable();
            $table->mediumText('description')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
            $table->SoftDeletes();
        });

        DB::table('categories')->insert([
            'id' => 0,
            'parent_id' => 0,
            'category_name' => 'Root',
            'created_at' => now(),
            'deleted_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
