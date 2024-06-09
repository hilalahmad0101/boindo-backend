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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->foreignId('sub_cat_id')->constrained('sub_categories')->cascadeOnDelete();
            $table->string('title');
            $table->string('isbn');
            $table->string('translator');
            $table->string('cost');
            $table->string('summary');
            $table->string('image');
            $table->string('audio');
            $table->string('demo');
            $table->json('authors');
            $table->json('producers');
            $table->json('adoption');
            $table->json('director');
            $table->json('music_director');
            $table->integer('plays')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
