<?php

use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $task = new \App\Task();
        $task->id = 1;
        $task->title = "Công việc 1";
        $task->content = "Nội dung công việc 1";
        $task->image = "";
        $task->due_date = "2018-09-15";
        $task->save();
    }
}
