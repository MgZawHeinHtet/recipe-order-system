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
            $table->string('title');
            $table->longText('description');
            $table->string('photo');
            $table->double('price');
            $table->integer('rating')->default(5);
            $table->unsignedBigInteger('stock')->default(10);
            $table->string('ingredients');
            $table->string('country');
            $table->unsignedBigInteger('category_id');
            $table->boolean('is_publish')->nullable()->default(true);
            $table->timestamps();
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
