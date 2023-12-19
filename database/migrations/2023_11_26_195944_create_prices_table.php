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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("item_id");
            $table->integer("before")->nullable();
            $table->integer("after");
            $table->integer("discount")->nullable();
            $table->timestamp("off_deadline")->nullable();
            $table->integer("status")->default(1)->comment("1 active | 0 deActive");
            $table->timestamps();

            $table->foreign("item_id")->on("items")->references("id")
                ->onUpdate("cascade")
                ->onDelete("restrict");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
