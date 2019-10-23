<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('produits',function (Blueprint $table) {
            $table->string("reference");
            $table->primary("reference");
            $table->string('libelle');
            $table->mediumText('description');
            $table->float('prix_unitaire',11)->default(0);
            $table->string('image')->default("default.png");
            $table->string('fiche_technique');
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
        //
        Schema::dropIfExists('produits');
    }
}
