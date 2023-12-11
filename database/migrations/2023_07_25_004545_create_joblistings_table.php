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
        Schema::create('joblistings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('company_name');
            $table->string('logo')->nullable();
            $table->integer('job_category_id');
            $table->integer('job_subcategory_id');

            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->text('qualification');
            $table->text('requirement');
            $table->string('salary');

            $table->string('district');
            $table->string('address');
            $table->integer('phone');
            $table->tinyInteger('email_status')->nullable();
            $table->tinyInteger('published')->default(0);

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
        Schema::dropIfExists('joblistings');
    }
};
