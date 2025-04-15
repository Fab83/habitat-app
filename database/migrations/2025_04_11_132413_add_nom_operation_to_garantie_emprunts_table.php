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
            $table->string('nom_operation')->nullable()->after('id'); // Ajoutez la colonne après 'id'
        });
    }
    
    public function down()
    {
        Schema::table('garantie_emprunts', function (Blueprint $table) {
            $table->dropColumn('nom_operation');
        });
    }
};
