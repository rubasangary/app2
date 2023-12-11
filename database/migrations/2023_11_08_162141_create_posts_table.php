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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->string('title');
            $table->string('slug');
            $table->text('content');
            $table->string('author');
            $table->string('image');
            $table->string('url');

            $table->integer('like_count')->default(0);
            $table->integer('share_count')->default(0);
            $table->integer('view_count')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(false);

            $table->string('yt_iframe')->nullable();
            $table->string('web_link')->nullable();

            $table->string('meta_title')->nullable();
            $table->mediumText('meta_description')->nullable();
            $table->mediumText('meta_keyword')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
