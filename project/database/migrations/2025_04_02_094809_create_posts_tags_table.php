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
        Schema::create('posts_tags', function (Blueprint $table) {
            $table->id();

            // columns
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('tag_id');

            // indexs
            $table->index('post_id', 'post_tag_post_index');
            $table->index('tag_id', 'post_tag_tag_index');

            // foreign keys
            $table->foreign('post_id', 'post_tag_post_fk')->on('posts')->references('id');
            $table->foreign('tag_id', 'post_tag_tag_fk')->on('tags')->references('id');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts_tags');
    }
};
