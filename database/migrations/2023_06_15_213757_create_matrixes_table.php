<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatrixesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matrices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rowNo_alternatif');
            $table->unsignedBigInteger('colNo_kriteria');
            $table->double('value');
            $table->double('nilai_keputusan')->nullable();
            $table->timestamps();

            $table->foreign('rowNo_alternatif')->references('id')->on('alternatives')->onDelete('cascade');
            $table->foreign('colNo_kriteria')->references('id')->on('criterias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matrices');
    }
}
