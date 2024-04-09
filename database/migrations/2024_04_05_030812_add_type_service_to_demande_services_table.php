<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeServiceToDemandeServicesTable extends Migration
{
    public function up()
    {
        Schema::table('demande_services', function (Blueprint $table) {
            $table->string('typeService')->nullable(); // Ajout du champ typeService
        });
    }

    public function down()
    {
        Schema::table('demande_services', function (Blueprint $table) {
            $table->dropColumn('typeService');
        });
    }
}
