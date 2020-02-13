<?php

use Illuminate\Database\Seeder;
use App\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::truncate();

        $task1 = Task::create([
            'title' => 'Выгулять собаку',
            'time' => \Carbon\Carbon::now()->addDays(2),
            'completed' => 0,
            'user_id' => 2
        ]);

        $task2 = Task::create([
            'title' => 'Сделать покупки',
            'time' => \Carbon\Carbon::now()->subDays(2),
            'completed' => 1,
            'user_id' => 4
        ]);

        $task3 = Task::create([
            'title' => 'Встретиться с клиентом',
            'time' => \Carbon\Carbon::now()->addDays(4),
            'completed' => 0,
            'user_id' => $user1->id
        ]);

        $task1 = Task::create([
            'title' => 'Выгулять собаку',
            'time' => \Carbon\Carbon::now()->addDays(2),
            'completed' => 0,
            'user_id' => $user2->id
        ]);

        $task2 = Task::create([
            'title' => 'Сделать покупки',
            'time' => \Carbon\Carbon::now()->subDays(2),
            'completed' => 1,
            'user_id' => $user2->id
        ]);

        $task3 = Task::create([
            'title' => 'Встретиться с клиентом',
            'time' => \Carbon\Carbon::now()->addDays(4),
            'completed' => 0,
            'user_id' => $user2->id
        ]);
    }
}
