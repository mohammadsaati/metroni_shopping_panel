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
        Schema::create('shopping_cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("shopping_cart_id");
            $table->unsignedBigInteger("item_id")->index();
            $table->integer("count");
            $table->timestamps();

            $table->foreign("shopping_cart_id")->references("id")->on("shopping_carts")
                ->onDelete("restrict")
                ->onUpdate("cascade");

            $table->foreign("item_id")->references("id")->on("items")
                ->onDelete("restrict")
                ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_cart_items');
    }
};
