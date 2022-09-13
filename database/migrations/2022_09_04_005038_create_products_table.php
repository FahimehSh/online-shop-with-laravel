<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->nullable();
            $table->foreignId('supplier_id')->nullable();
            $table->foreignId('discount_id')->nullable();
            $table->string('title');
            $table->string('meta_title')->nullable();
            $table->text('introduction')->nullable();
            $table->string('slug');
            $table->string('sku')->nullable();
            $table->unsignedInteger('price');
            $table->unsignedInteger('rating')->nullable();
            $table->unsignedInteger('quantity');
            $table->boolean('is_available')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->timestamp('ended_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
