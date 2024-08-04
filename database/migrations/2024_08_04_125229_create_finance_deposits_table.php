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
        Schema::create('finance_deposits', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('start',20);
            $table->string('end',20);
            $table->decimal('total',12,2);
            $table->tinyInteger('deposit_id')->unsigned()->index();
            $table->foreign('deposit_id')->references('id')->on('list_dropdowns')->onDelete('cascade');
            $table->integer('orseries_id')->unsigned()->index();
            $table->foreign('orseries_id')->references('id')->on('finance_orseries')->onDelete('cascade');
            $table->integer('created_by')->unsigned()->index();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('laboratory_id')->unsigned()->index();
            $table->foreign('laboratory_id')->references('id')->on('laboratories')->onDelete('cascade');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finance_deposits');
    }
};
