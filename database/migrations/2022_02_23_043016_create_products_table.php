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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->foreignId('supplier_id')->constrained()->cascadeOnDelete();
            $table->string('SKU')->nullable();
            $table->string('supplierProduct_id')->nullable();
            $table->string('productName');
            $table->mediumText('description')->nullable();
            $table->mediumText('notes')->nullable();
            // $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->integer('quantityPerUnit')->nullable();
            $table->string('unitSize')->default('each');
            $table->float('unitPrice')->nullable();
            $table->float('MSRP')->nullable();
            $table->float('discount')->nullable();
            $table->float('ABPoints')->nullable();
            $table->string('picture')->nullable();
            $table->string('availableSizes')->nullable();
            $table->string('availableColors')->nullable();
            $table->string('availableWeights')->nullable();
            $table->string('unitWeight')->nullable();
            $table->integer('unitsInStock')->nullable();
            $table->integer('unitsOnOrder')->nullable();
            $table->integer('reOrderLevel')->nullable();
            $table->integer('ranking')->nullable();
            $table->boolean('productAvailable')->default(1);
            $table->boolean('discountAvailable')->default(0);
            $table->boolean('currentOrder')->default(0);
            // $table->foreignId('size_id')->constrained()->cascadeOnDelete();
            // $table->foreignId('color_id')->constrained()->cascadeOnDelete();
            // $table->foreignId('weight_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
