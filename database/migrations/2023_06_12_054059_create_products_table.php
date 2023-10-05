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
            $table->foreignId('category_id')->constrained('categories');
            $table->string('name');
            $table->longText('description');
            $table->bigInteger('qty');
            $table->integer('price');
            $table->bigInteger('value');
            $table->foreignId('status_id')->default(1)->constrained('status')->change();
            $table->string('image');
            $table->timestamps();
            $table->foreignId('created_by')->constrained('users');
            $table->date('verified_at');
            $table->foreignId('verified_by')->constrained('users');
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
