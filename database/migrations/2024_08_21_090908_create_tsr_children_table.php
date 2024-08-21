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
        Schema::create('tsr_children', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('parent_id')->unsigned()->index();
            $table->foreign('parent_id')->references('id')->on('tsrs')->onDelete('cascade');
            $table->bigInteger('child_id')->unsigned()->index();
            $table->foreign('child_id')->references('id')->on('tsrs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tsr_children');
    }
};
