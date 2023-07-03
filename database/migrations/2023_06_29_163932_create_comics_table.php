<?php

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
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->text('description');
            $table->text('thumb');
            $table->tinyInteger('price');
            $table->string('series', 100);
            $table->string('sale_date', 50);
            $table->string('type', 100);
        // "artists" => [
        //     "José Luis García-López",
        //     "Clay Mann",
        //     "Rafael Albuquerque",
        //     "Patrick Gleason",
        //     "Dan Jurgens",
        //     "Joe Shuster",
        //     "Neal Adams",
        //     "Curt Swan",
        //     "John Cassaday",
        //     "Olivier Coipel",
        //     "Jim Lee"
        // ],
        // "writers" => [
        //     "Brad Meltzer",
        //     "Tom King",
        //     "Scott Snyder",
        //     "Geoff Johns",
        //     "Brian Michael Bendis",
        //     "Paul Dini",
        //     "Louise Simonson",
        //     "Richard Donner",
        //     "Marv Wolfman",
        //     "Peter J. Tomasi",
        //     "Dan Jurgens",
        //     "Jerry Siegel",
        //     "Paul Levitz"
        // ],
            $table->softDeletes();
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
        Schema::dropIfExists('comics');
    }
};
