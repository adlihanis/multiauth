<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppliancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appliances', function (Blueprint $table) {
            $table->id();
            $table->integer('totalQuantity');
            $table->decimal('totalPrice');
            $table->integer('quantity1');
            $table->integer('quantity2');
            $table->integer('quantity3');
            $table->integer('quantity4');
            $table->integer('quantity5');
            $table->integer('quantity6');
            $table->integer('quantity7');
            $table->integer('quantity8');
            $table->integer('quantity9');
            $table->longText('content')->nullable();
            $table->string('approval_status')->default('pending');
            $table->string('payment_status')->default('pending');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::table('appliances', function (Blueprint $table) {
            $table->dropColumn('approval_status');
        });
    }
};

