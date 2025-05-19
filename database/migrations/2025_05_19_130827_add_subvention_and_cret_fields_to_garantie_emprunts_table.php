<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
        {
            Schema::table('garantie_emprunts', function (Blueprint $table) {
                $table->date('date_deliberation_subvention')->nullable();
                $table->string('numero_delib_subvention')->nullable();
                $table->integer('montant_subvention_agglo')->nullable();
                $table->string('date_cret')->nullable();
                $table->integer('montant_cret')->nullable();
            });
        }

        public function down()
        {
            Schema::table('garantie_emprunts', function (Blueprint $table) {
                $table->dropColumn([
                    'date_deliberation_subvention',
                    'numero_delib_subvention',
                    'montant_subvention_agglo',
                    'date_cret',
                    'montant_cret',
                ]);
            });
        }
};