<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('news')->insert([
			'news' => '**The server has been down for quite some time and that was due to some issues with the hosting service. Just these past few days the issues have all been resolved thankfully.**

Now the server has been down for quite some time and we decided that it may be a good idea to restart everything from the beginning. Some worlds will be kept while the main Survival one will be reset.

This essentially means things such as money, mcmmo, tokens etc will also be reset. One of the main reasons is due to the 1.13 update, a new world will allow you all to explore the world as freely as you like without having any issues.

We have opened up #suggestions for you all to place whatever you would like to see in the server. Be it plugins or minigames, pop it in the channel with a link so we can take a look at it in order to determine whether it can/should be added to our server.

Those who have ranks will not lose their ranks, including donators. You will keep all your privileges as you had before unless we change anything - which we will notify you guys about if anything does change.',
			'created_at' => '2019-03-23 08:13:08',
			'updated_at' => '2019-03-23 08:13:08',
			'title' => "Server Restart",
			'user_id' => 1,
		]);

		DB::table('news')->insert([
			'news' => '**As you may have noticed we\'ve removed some channels in the discord server:**
* Bug-report
* Support
* Creations
* Market

This is because we have created new boards for them on our forums. So if you do need to make a suggestion, report or anything else please do so on the forums unless it is absolutely urgent then post it in #general and we will get to it as soon as.',
			'created_at' => '2018-07-29 08:13:08',
			'updated_at' => '2018-07-29 08:13:08',
			'title' => "Discord Channels",
			'user_id' => 1,
		]);

		DB::table('news')->insert([
			'news' => '**We\'re currently working on a lot of updates right now, more so in specific the 1.13 update. Along side that we have been working on a new website and forum for you guys, so without further ado I\'d like to present the new and revised website for TFD!**

[The Forgotten District](https://www.theforgottendistrict.com)

We hope you guys like it and would love to hear feedback from you all regarding the website and forums.',
			'created_at' => '2018-07-25 08:13:08',
			'updated_at' => '2018-07-25 08:13:08',
			'title' => "New website",
			'user_id' => 1,
		]);
	}
}
