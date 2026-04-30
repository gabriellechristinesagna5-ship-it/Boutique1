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
        Schema::create('commandes', function (Blueprint $table) {
           $table->id();
           $table->foreignId('utilisateur_id')->constrained('users')->onDelete('cascade');
           $table->decimal('prix_total', 10, 2);
           $table->enum('statut', ['en_attente', 'paye', 'livre'])->default('en_attente');
           $table->timestamps();
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
