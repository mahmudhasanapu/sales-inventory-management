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
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropForeign(['category_id']); // পুরান FK মুছবে
            $table->dropColumn('category_id');   // পুরান কলাম মুছবে

            $table->foreignId('customer_id')     // নতুন কলাম বানাবে
              ->constrained()
              ->cascadeOnUpdate()
              ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
            $table->dropColumn('customer_id');

            $table->foreignId('category_id')
              ->constrained()
              ->cascadeOnUpdate()
              ->restrictOnDelete();
        });
    }
};
