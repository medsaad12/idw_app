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
        Schema::create('tableau_rows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("tableau_id");
            $table->foreign('tableau_id')->references('id')->on('tableaux')->onDelete('cascade');
            $table->unsignedBigInteger("agent");
            $table->foreign('agent')->references('id')->on('users')->onDelete('cascade');
            $table->integer('Rdv_brut');
            $table->integer('Rdv_confirme_telephone');
            $table->integer('Rdv_ouverture_de_porte');
            $table->integer('Rdv_annuler');
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
        Schema::dropIfExists('tableau_rows');
    }
};
