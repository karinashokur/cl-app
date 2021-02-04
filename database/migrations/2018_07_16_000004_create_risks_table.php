<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateRisksTable extends Migration
{
    public function up()
    {
        Schema::create('risks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('seriousness');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('risks');
    }
}
