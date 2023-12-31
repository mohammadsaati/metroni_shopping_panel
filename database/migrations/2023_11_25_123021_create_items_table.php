<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_id");
            $table->integer("shipping_price");
            $table->unsignedBigInteger("size_id")->nullable();
            $table->integer("stock")->default(0);
            $table->integer("status")->default(1)->comment("1 active | 0 deActive");
            $table->timestamps();


            $table->foreign("product_id")->on("products")->references("id")
                ->onDelete("restrict")
                ->onUpdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
