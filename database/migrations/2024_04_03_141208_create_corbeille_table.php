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
        Schema::create('corbeille', function (Blueprint $table) {
            $table->id();
            $table->string('TdeFICHER');
            $table->string('Title');
            $table->string('Description');
            $table->string('Code');
            $table->binary('file');
            $table->unsignedBigInteger('user');
            $table->unsignedBigInteger('Folder');
            $table->unsignedBigInteger('userdelete');
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('Folder')->references('id')->on('folders');
            $table->foreign('userdelete')->references('id')->on('users');
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
        Schema::dropIfExists('corbeille');
    }
};
