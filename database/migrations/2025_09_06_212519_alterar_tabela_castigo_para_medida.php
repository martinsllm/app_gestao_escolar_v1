<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::rename('castigos', 'medidas');

        Schema::table('ocorrencias', function (Blueprint $table) {
            $table->dropForeign('ocorrencias_castigo_id_foreign');
            $table->renameColumn('castigo_id', 'medida_id');
            $table->foreign('medida_id')->references('id')->on('medidas')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('medidas', 'castigos');

        Schema::table('ocorrencias', function (Blueprint $table) {
            $table->dropForeign('ocorrencias_medida_id_foreign');
            $table->renameColumn('medida_id', 'castigo_id');
            $table->foreign('castigo_id')->references('id')->on('castigos')->cascadeOnDelete();
        });
    }
};
