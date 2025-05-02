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
        Schema::create('contact_ecfr', function (Blueprint $table) {
            $table->id();
            $table->string('nom_contact')->nullable();
            $table->string('prenom_contact')->nullable();
            $table->date('date_contact')->nullable();
            $table->string('email_contact')->nullable();
            $table->string('telephone_contact')->nullable();
            $table->string('adresse_contact')->nullable();
            $table->string('commune_contact')->nullable();
            $table->string('revenu_fiscal')->nullable();
            $table->string('taille_menage')->nullable();
            $table->string('demande')->nullable();
            $table->string('reponse')->nullable();
            $table->string('code_postal_contact')->nullable();
            $table->string('commentaires_contact')->nullable();
            $table->boolean('renvoi_citemetrie')->default(false);
            $table->string('pieces_jointes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_ecfr');
    }
};
