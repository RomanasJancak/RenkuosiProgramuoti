<?php

namespace Database\Seeders;
use App\Models\Friendship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FriendshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Friendship::create(['user_id' => 1,'friend_id' => 2]);
        Friendship::create(['user_id' => 2,'friend_id' => 1]);
        Friendship::create(['user_id' => 1,'friend_id' => 3]);
        Friendship::create(['user_id' => 3,'friend_id' => 1]);
        Friendship::create(['user_id' => 2,'friend_id' => 3]);
        Friendship::create(['user_id' => 3,'friend_id' => 2]);
    }
}
