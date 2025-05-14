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
        Schema::table('garantie_emprunts', function (Blueprint $table) {
            $table->string('deliberation')->nullable()->after('date_bureau_conseil');
        });
    }

    public function down(): void
    {
        Schema::table('garantie_emprunts', function (Blueprint $table) {
            $table->dropColumn('deliberation');
        });
    }
};
