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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('seller_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('contactFName');
            $table->string('contactLName');
            $table->string('contactTitle');
            $table->string('address1');
            $table->string('address2');
            $table->string('city_town');
            $table->string('state_province');
            $table->string('zip_postal');
            $table->string('country_code');
            $table->string('phone');
            $table->string('fax');
            $table->string('email');
            $table->string('website');
            $table->string('paymentMethods');
            $table->string('discountType');
            $table->string('logo');
            $table->string('productHelpUrl1');
            $table->string('productHelpUrl2');
            $table->string('productHelpUrl3');
            $table->tinyInteger('ranking');
            $table->float('discountRate');
            $table->boolean('discountAvailable');
            $table->boolean('currentOrder');
            $table->mediumText('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
};
