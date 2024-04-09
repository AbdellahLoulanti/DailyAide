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
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('demande_id')->constrained('demande_services')->onDelete('cascade');
            $table->unsignedTinyInteger('note'); // assuming 'note' is an integer value like a rating out of 5
            $table->text('commentaire');
            $table->string('type'); // You might want to ensure this is a valid value (e.g., 'client', 'partenaire')
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('commentaires');
    }
};


