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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("slug")->unique();
            $table->string("name");
            $table->string("en_name");
            $table->string("image");
            $table->unsignedBigInteger("category_id");
            $table->integer("shipping_price");
            $table->integer("is_amazing")->default(0)->comment("1 amazing | 0 normal");
            $table->date("is_amazing_date")->nullable();
            $table->unsignedBigInteger("brand_id")->nullable();
            $table->longText("description");
            $table->integer("status")->default(1)->comment("1active | 0 deActive");
            $table->timestamps();

            $table->foreign("category_id")->on("categories")->references("id")
                ->onUpdate("cascade")
                ->onDelete("restrict");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
