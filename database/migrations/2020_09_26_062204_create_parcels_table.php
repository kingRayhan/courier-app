<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->string("tracking_id")->unique();
            $table->string("customer_name");
            $table->string("customer_phone");
            $table->string("customer_address");
            $table->string("invoice_id");
            $table->integer("parcel_price");
            $table->boolean("cod_collected")->default(false);
            $table->enum("status", [
                "placed",
                "picked",
                "shipping",
                "delivered",
                "cancelled",
                "returned",
            ])
                ->default("placed");
            $table->integer("weight");
            $table->float("merchant_payback_amount")->default(0);
            $table->timestamps();

            $table->unsignedBigInteger("user_id")->index();
            $table->unsignedBigInteger("shop_id")->index();


            $table->foreign("user_id")
                ->references("id")
                ->on('users')
                ->onDelete('cascade');

            $table->foreign("shop_id")
                ->references("id")
                ->on('shops')
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
        Schema::dropIfExists('parcels');
    }
}
