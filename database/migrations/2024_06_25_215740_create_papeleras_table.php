<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePapelerasTable extends Migration
{
    public function up()
    {
        Schema::create('papeleras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('documento_id');
            $table->unsignedBigInteger('carpeta_id');
            $table->string('nombre_documento');
            $table->string('tipo');
            $table->string('peso');
            $table->timestamps();

            $table->foreign('documento_id')->references('id')->on('documentos')->onDelete('cascade');
            $table->foreign('carpeta_id')->references('id')->on('carpetas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('papeleras');
    }
}
