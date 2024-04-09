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
        Schema::create('partenaires', function (Blueprint $table) {
            $table->id(); // This will create an 'id' column instead of 'partenaire_id'
            // $table->bigIncrements('partenaire_id'); // Use this if you specifically want a 'partenaire_id' column
            $table->string('nom');
            $table->string('prenom');
            $table->string('domaine_expertise');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telephone');
            $table->string('region');
            $table->text('description')->nullable();
            $table->boolean('disponibilite');
            $table->decimal('tarif', 8, 2); // 8 digits in total, 2 after the decimal
            $table->string('model_pricing')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partenaires');
    }
};
