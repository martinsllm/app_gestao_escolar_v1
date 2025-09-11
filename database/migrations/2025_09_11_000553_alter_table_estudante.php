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
        Schema::table('estudantes', function (Blueprint $table) {
            $table->dropColumn('data_nascimento');
            $table->date('data_nascimento')->after('nome_completo');
            $table->string('email', 15)->nullable()->after('data_nascimento');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('estudantes', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('data_nascimento');
            $table->string('data_nascimento')->after('nome_completo');
        });
    }
};
