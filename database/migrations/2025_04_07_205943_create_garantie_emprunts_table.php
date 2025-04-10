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
        Schema::create('garantie_emprunts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('type_financement')->nullable();
            $table->integer('numero_delib')->nullable();
            $table->string('bureau_conseil')->nullable();
            $table->date('date_bureau_conseil')->nullable();
            $table->integer('montant_total')->nullable();
            $table->integer('montant_plai_construction')->nullable();
            $table->integer('montant_plai_foncier')->nullable();
            $table->integer('montant_pls_construction')->nullable();
            $table->integer('montant_pls_foncier')->nullable();
            $table->integer('montant_phb2')->nullable();
            $table->integer('montant_booster')->nullable();
            $table->integer('montant_plus_construction')->nullable();
            $table->integer('montant_plus_foncier')->nullable();
            $table->date('date_deliberation')->nullable();
            $table->integer('nombre_logements_reserves')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garantie_emprunts');
    }
};
