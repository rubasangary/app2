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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('feature_image');
            $table->string('second_image')->nullable();
            $table->string('third_image')->nullable();

            $table->integer('adscategory_id');
            $table->integer('subcategory_id');
            $table->integer('childcategory_id')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->string('price');
            $table->string('price_status');
            $table->string('product_condition')->nullable();

            $table->string('district')->nullable();
            $table->string('location')->nullable();
            $table->string('phone')->nullable();
            $table->string('link')->nullable();
            $table->integer('published')->nullable(1);
            $table->integer('view_count')->default(0);

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
        Schema::dropIfExists('advertisements');
    }
};
