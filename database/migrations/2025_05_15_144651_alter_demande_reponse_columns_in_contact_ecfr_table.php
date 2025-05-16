<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDemandeReponseColumnsInContactEcfrTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('contact_ecfr', function (Blueprint $table) {
            $table->text('demande')->nullable()->change();
            $table->text('reponse')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_ecfr', function (Blueprint $table) {
            $table->string('demande', 255)->nullable()->change();
            $table->string('reponse', 255)->nullable()->change();
        });
    }
}