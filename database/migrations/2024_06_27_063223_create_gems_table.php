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
        Schema::create('gems', function (Blueprint $table) {
            $table->id();
            $table->string('species');
            $table->string('variety');
            $table->string('shape_cutting_style');
            $table->string('measurements');
            $table->decimal('carat_weight', 8, 2);
            $table->string('color');
            $table->unsignedBigInteger('user_detail_id');
            $table->foreign('user_detail_id')->references('id')->on('user_details')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gems');
    }
};
