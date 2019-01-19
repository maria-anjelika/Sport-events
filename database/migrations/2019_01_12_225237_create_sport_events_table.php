<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSportEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_events', function (Blueprint $table) {
            $table->increments('id')
            ->unsigned()->nullable()->default('NULL');
            $table->string('sportEventName');
            $table->string('organizerName');
            $table->date('date');
            $table->string('continuance');
            Schema::disableForeignKeyConstraints();
            $table->string('type');
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
        Schema::dropIfExists('sport_events');
    }
}
