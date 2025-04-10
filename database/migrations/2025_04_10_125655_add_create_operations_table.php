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
        Schema::table('operations', function (Blueprint $table) {
            $table->string('pc')->nullable();
            $table->integer('nombre_plai_agrement')->nullable();
            $table->integer('nombre_plus_agrement')->nullable();
            $table->integer('nombre_pls_agrement')->nullable();
            $table->integer('nombre_psla_agrement')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
