<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkarKuadratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculates', function (Blueprint $table) {
            $table->id();
            $table->string('user')->nullable();
            $table->double('number');
            $table->double('akarkuadrat');
            $table->double('excecution');
            $table->timestamps();
        });

        Schema::create('calculates_laravel', function (Blueprint $table) {
            $table->id();
            $table->string('user')->nullable();
            $table->double('number');
            $table->double('akarkuadrat');
            $table->double('excecution');
            $table->timestamps();
        });

        Schema::create('calculates_plsql', function (Blueprint $table) {
            $table->id();
            $table->string('user')->nullable();
            $table->double('number');
            $table->double('akarkuadrat');
            $table->double('excecution');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calculates_laravel');
        Schema::dropIfExists('calculates_plsql');
        Schema::dropIfExists('calculates');
    }
}
