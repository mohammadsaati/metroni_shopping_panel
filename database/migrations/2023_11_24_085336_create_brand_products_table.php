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
        Schema::create('brand_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("brand_id");
            $table->unsignedBigInteger("product_id");
            $table->timestamps();

            $table->foreign("brand_id")->on("brands")->references("id")
                ->onUpdate("cascade")
                ->onDelete("restrict");

            $table->foreign("product_id")->on("products")->references("id")
                ->onUpdate("cascade")
                ->onDelete("restrict");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brand_products');
    }
};
