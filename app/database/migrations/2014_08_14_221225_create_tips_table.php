<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tips', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('body');
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
		Schema::drop('tips');
	}

	public function initData()
	{
		$tips = [
			['body' => '<a href="http://laracasts.com/" target="_blank">Laracasts</a> 上面有很不錯的 Laravel 開發技巧的影片，通通看完你可以學到很多東西'],
			['body' => '<a href="http://packalyst.com/" target="_blank">Packalyst</a> 上可以瞭解更多 Laravel 的 package.'],
			['body' => '<a href="http://userscape.com/laracon/2014/" target="_blank">Laracon 2014</a> 這裡是 Laracon NYC 2014 的現場錄影'],
			['body' => '<a href="http://cheats.jesse-obrien.ca/" target="_blank">Laravel Cheat Sheet</a> 這裡是 Laravel 的 Cheat Sheet.'],
			['body' => 'laravel.com/docs 沒事多讀讀文檔, 每一次都可以收穫不少.'],
			['body' => 'Laravel 在 HHVM 運行單元測試 100% 通過.'],
			['body' => 'Learn something about everything and everything about something.'],
			['body' => 'Any fool can write code that a computer can understand. Good programmers write code that humans can understand.'],
			['body' => 'phptherightway.com 上可以更新的 PHP 知識.'],
			['body' => '<a href="http://www.buzzsprout.com/11908" target="_blank">Laravel.io 部落格</a> - 聽 Laravel 社群的幾個領導者談論技術.'],
			['body' => 'Model::remember(5)->get(); 可以緩存 Model 五分鐘'],
			['body' => '使用 CoffeeScript 和 Sass 來寫 JavaScript 和 CSS 提高開發效率'],
		];
		DB::table('tips')->insert( $tips );
	}
}
