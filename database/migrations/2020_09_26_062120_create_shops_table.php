<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();

            $table->string("name", 80);
            $table->string("pickup_address", 220);
            $table->string("shop_phone", 15);
            $table->unsignedBigInteger("area_id")->index();
            $table->unsignedBigInteger("zone_id")->index();
            $table->unsignedBigInteger("user_id")->index();
            $table->timestamps();

            $table->foreign("area_id")
                ->references("id")
                ->on('areas')
                ->onDelete('cascade');


            $table->foreign("zone_id")
                ->references("id")
                ->on('zones')
                ->onDelete('cascade');


            $table->foreign("user_id")
                ->references("id")
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
