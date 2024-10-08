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
        Schema::create('testservices', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->bigInteger('sampletype_id')->unsigned()->index();
            $table->foreign('sampletype_id')->references('id')->on('testservice_names')->onDelete('cascade');
            $table->bigInteger('testname_id')->unsigned()->index();
            $table->foreign('testname_id')->references('id')->on('testservice_names')->onDelete('cascade');
            $table->integer('method_id')->unsigned()->index();
            $table->foreign('method_id')->references('id')->on('testservice_methods')->onDelete('cascade');$table->tinyInteger('laboratory_type')->unsigned()->index();
            $table->foreign('laboratory_type')->references('id')->on('list_laboratories')->onDelete('cascade');
            $table->integer('laboratory_id')->unsigned()->index();
            $table->foreign('laboratory_id')->references('id')->on('laboratories')->onDelete('cascade');
            $table->boolean('is_fixed')->default(1);
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testservices');
    }
};
