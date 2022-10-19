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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('short_content');
            $table->text('content');
            $table->foreignId('user_id');
            $table->foreignId('category_id');
            $table->integer('comments_count')->default(0);
            $table->integer('visit_count')->default(0);
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->boolean('is_confirm')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
