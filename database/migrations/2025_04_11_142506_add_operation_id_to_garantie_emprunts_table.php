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
            $table->foreignId('operation_id')->nullable()->constrained()->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('garantie_emprunts', function (Blueprint $table) {
            $table->dropForeign(['operation_id']);
            $table->dropColumn('operation_id');
        });
    }
    
};
