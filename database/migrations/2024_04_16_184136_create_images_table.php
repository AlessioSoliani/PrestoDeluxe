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
        Schema::create('images', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('announcement_id')->nullable();
            //referenzierà il campo 'ID' nella tabella announcements con l'opzione onDelete cascade in modo tale che quando l'utente andrà
            //a cancellare un annuncio anche le immagini correlate vengano cancellate
            $table->foreign('announcement_id')->references('id')->on('announcements')->onDelete('cascade');
            //campo stringa path che sarà il path dove sarà salvata l'immagine
            $table->string('path')->nullable();
            $table->timestamps();

    });
}

    /**
    * Reverse the migrations.
    */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
