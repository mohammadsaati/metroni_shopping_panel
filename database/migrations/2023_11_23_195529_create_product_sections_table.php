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
        Schema::create('product_sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_id");
            $table->unsignedBigInteger("section_id");
            $table->timestamps();

            $table->foreign("product_id")->on("products")->references("id")
                ->onUpdate("cascade")
                ->onDelete("cascade");

            $table->foreign("section_id")->on("sections")->references("id")
                ->onUpdate("cascade")
                ->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_sections');
    }
};
