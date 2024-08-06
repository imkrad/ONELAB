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
        Schema::create('target_breakdowns', function (Blueprint $table) {
            $table->engine = 'InnoDB'; 
            $table->increments('id');
            $table->string('name');
            $table->integer('count');
            $table->boolean('is_set')->default(0);
            $table->boolean('is_amount');
            $table->boolean('is_consolidated');
            $table->tinyInteger('laboratory_type')->unsigned()->nullable();
            $table->foreign('laboratory_type')->references('id')->on('list_laboratories')->onDelete('cascade');
            $table->integer('target_id')->unsigned()->nullable();
            $table->foreign('target_id')->references('id')->on('targets')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('target_breakdowns');
    }
};
