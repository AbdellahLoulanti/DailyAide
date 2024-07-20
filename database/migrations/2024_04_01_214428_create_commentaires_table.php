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
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->unsignedBigInteger('id_cli');  // Foreign key to the clients table
            $table->unsignedBigInteger('id_part');  // Foreign key to the partenaires table
            $table->unsignedBigInteger('id_dem_ser');  // Foreign key to the demande_services table
            $table->text('commentaire');  // Text of the comment
            $table->string('sendby');  // Identifier of who sent the comment
            $table->timestamp('date_saisie')->useCurrent();  // Timestamp for when the comment was made

            
            $table->timestamps();  // Laravel default timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commentaires');
    }
};
