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
        Schema::table('tableau_rows', function (Blueprint $table) {
            $table->string('Rdv_brut')->nullable()->change();
            $table->string('Rdv_confirme_telephone')->nullable()->change();
            $table->string('Rdv_ouverture_de_porte')->nullable()->change();
            $table->string('Rdv_annuler')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tableau_rows', function (Blueprint $table) {
            //
        });
    }
};
