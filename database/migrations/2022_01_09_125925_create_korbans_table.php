<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKorbansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('korbans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelaporan_id');
            $table->foreign('pelaporan_id')->references('id')->on('pelaporans')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama');
            $table->integer('umur');
            $table->char('nik', 25);
            $table->string('kondisi');
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
        Schema::dropIfExists('korbans');
    }
}
