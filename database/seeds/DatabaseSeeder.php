<?php

use App\Message;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 创建管理员
        User::query()->create([
            'name' => '李星',
            'email' => 'i@star2000.work',
            'password' => bcrypt('1753304'),
            'email_verified_at' => now()
        ]);

        // 随机生成50个用户，并分别留个言
        factory(User::class, 50)->create()->each(function ($user) {
            $user->messages()->save(factory(Message::class)->make());
        });
    }
}
