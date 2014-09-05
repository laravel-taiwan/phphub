<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLinksTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('link');
            $table->timestamps();
        });

        $this->initData();
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('links');
    }

    public function initData()
    {
        $links = [
            [
                'title' => 'Laravel 台灣主站',
                'link' => 'http://laravel.tw/',
            ]
        ];
        DB::table('links')->insert( $links );
    }

}
