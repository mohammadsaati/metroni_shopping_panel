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
        Schema::create('shipping_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("city_id");
            $table->unsignedBigInteger("item_id");
            $table->integer("price");
            $table->timestamps();

            $table->foreign("city_id")->references("id")->on("cities")
                ->onUpdate("cascade")
                ->onDelete("restrict");

            $table->foreign("item_id")->references("id")->on("items")
                ->onUpdate("cascade")
                ->onDelete("restrict");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_prices');
    }
};
