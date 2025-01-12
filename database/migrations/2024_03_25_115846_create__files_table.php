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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('TdeFICHER');
            $table->string('Title');
            $table->string('Description');
            $table->string('Code');
            $table->binary('file');
            $table->unsignedBigInteger('user');
            $table->unsignedBigInteger('Folder');
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('Folder')->references('id')->on('folders');
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
        Schema::dropIfExists('files');
    }
};
