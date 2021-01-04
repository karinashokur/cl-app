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
            $table->text('description')->nullable();
            $table->integer('task_id')->unsigned();
            $table->foreign('task_id')->references('id')->on('tasks')->ondelete('cascade');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('risks');
    }
}
