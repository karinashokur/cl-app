<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTariffsTable extends Migration
{
    public function up()
    {
        Schema::create('tariffs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('technical_level');
            $table->decimal('price')->comment('Price / Hour');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->ondelete('cascade');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('tariffs');
    }
}
