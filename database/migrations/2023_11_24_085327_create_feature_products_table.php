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
        Schema::create('feature_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("feature_id");
            $table->unsignedBigInteger("product_id");
            $table->string("value");
            $table->timestamps();

            $table->foreign("feature_id")->on("features")->references("id")
                ->onUpdate("cascade")
                ->onDelete("restrict");

            $table->foreign("product_id")->on("products")->references("id")
                ->onUpdate("cascade")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feature_products');
    }
};
