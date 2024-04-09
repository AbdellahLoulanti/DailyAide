<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('demande_services', function (Blueprint $table) {
            $table->id(); // Automatically creates an 'id' column, no need for 'demande_id' as a separate field
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->foreignId('partenaire_id')->constrained()->onDelete('cascade');
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->string('titre');
            $table->text('adresse');
            $table->dateTime('date');
            $table->string('statut');
            $table->text('description')->nullable();
            $table->integer('duree');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('demande_services');
    }
};
