<?php

use App\Models\Especie;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('nome_dono', 100);
            // foreign key
            $table->foreignIdFor(Especie::class);
            $table->foreign('especie_id')->references('id')->on('especie');
            $table->string('raca', 100);
            $table->date('data_nascimento');
            $table->integer('idade')->nullable()->default(NULL);
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
        Schema::dropIfExists('animal');
    }
};
