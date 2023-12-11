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
        Schema::create('forums', function (Blueprint $table) {
            $table->id();
                $table->text('content');
                $table->foreignId('user_id')->constrained()->cascadeOnDelete();
                $table->string('image')->nullable();
                $table->string('url')->nullable();
                $table->unsignedInteger('total_likes')->default(0);
                $table->unsignedInteger('total_views')->default(0); // Add the total_views column
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
        Schema::dropIfExists('forums');
    }
};
