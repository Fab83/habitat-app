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
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->string('nom_operation');
            $table->string('adresse_operation');
            $table->string('commune_operation');
            $table->string('reference_cadastre')->nullable();
            $table->string('vefa_mod')->nullable();
            $table->string('neuf_aa')->nullable();
            $table->string('annee_prog')->nullable();
            $table->string('promoteur')->nullable();
            $table->string('numero_pc')->nullable();
            $table->string('date_pc')->nullable();
            $table->integer('nombre_logements')->nullable();
            $table->integer('nombre_lls')->nullable();
            $table->integer('nombre_plai')->nullable();
            $table->integer('nombre_plus')->nullable();
            $table->integer('nombre_ulsplus')->nullable();
            $table->integer('nombre_ulspls')->nullable();
            $table->integer('nombre_pls')->nullable();
            $table->integer('nombre_psla')->nullable();
            $table->integer('nombre_brs')->nullable();
            $table->integer('nombre_lli')->nullable();
            $table->integer('nombre_ulli')->nullable();
            $table->string('date_livraison')->nullable();
            $table->integer('nombre_logements_livres')->nullable();
            $table->string('RT')->nullable();
            $table->string('inventaire_sru')->nullable();
            $table->string('sig')->nullable();
            $table->text('commentaires')->nullable();
            $table->foreignId('bailleur_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operations');
    }
};
