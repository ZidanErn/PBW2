<?php

    //Muhammad Zidan Ernandiaz_6706223117_4604
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('koleksi', function (Blueprint $table) {
            $table->integer('jumlahKeluar');
            $table->integer('jumlahSisa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('koleksi', function (Blueprint $table) {
            //
        });
    }
};