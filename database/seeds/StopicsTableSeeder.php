<?php

use Illuminate\Database\Seeder;

class StopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
            'id' => 1,
            'name' => '选择题1',
            'type' => 'radio',
            'level' => rand(0,2),
            'value' => rand(1,5),
            'answer' => 'A',
            'description' => '没什么好说的',
            'created_at' => \Carbon\Carbon::now(),
            'user_id' => 1
            ],
            [
                'id' => 2,
                'name' => '选择题2',
                'type' => 'radio',
                'level' => rand(0,2),
                'value' => rand(1,5),
                'answer' => 'B',
                'description' => '没什么好说的',
                'created_at' => \Carbon\Carbon::now(),
                'user_id' => 1,

            ],
            [
                'id' => 3,
                'name' => '选择题3',
                'type' => 'radio',
                'level' => rand(0,2),
                'value' => rand(1,5),
                'answer' => 'C',
                'description' => '没什么好说的',
                'user_id' => 1,
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'id' => 4,
                'name' => '选择题4',
                'type' => 'multiselect',
                'level' => rand(0,2),
                'value' => rand(1,5),
                'answer' => 'B,D',
                'description' => '没什么好说的',
                'user_id' => 1,
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'id' => 5,
                'name' => '选择题5',
                'type' => 'multiselect',
                'level' => rand(0,2),
                'value' => rand(1,5),
                'answer' => 'A,B',
                'description' => '没什么好说的',
                'user_id' => 1,
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'id' => 6,
                'name' => '选择题6',
                'type' => 'multiselect',
                'level' => rand(0,2),
                'value' => rand(1,5),
                'answer' => 'A,D',
                'description' => '没什么好说的',
                'user_id' => 1,
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'id' => 7,
                'name' => '选择题7',
                'type' => 'select',
                'level' => rand(0,2),
                'value' => rand(1,5),
                'answer' => 'A,C',
                'description' => '没什么好说的',
                'user_id' => 1,
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'id' => 8,
                'name' => '选择题8',
                'type' => 'select',
                'level' => rand(0,2),
                'value' => rand(1,5),
                'answer' => 'A,D,B',
                'description' => '没什么好说的',
                'user_id' => 1,
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'id' => 9,
                'name' => '选择题9',
                'type' => 'select',
                'level' => rand(0,2),
                'value' => rand(1,5),
                'answer' => 'A',
                'description' => '没什么好说的',
                'user_id' => 1,
                'created_at' => \Carbon\Carbon::now()
            ],
        ];

        DB::table('topics')->insert($data);

        $data1 = [];
        for($i=1;$i<10;$i++) {
            $data1[] = [
              'topic_id' => $i,
                'name' => '0',
                'description' => '选项1',
            ];
            $data1[] = [
                'topic_id' => $i,
                'name' => '1',
                'description' => '选项2',
            ];
            $data1[] = [
                'topic_id' => $i,
                'name' => '2',
                'description' => '选项3',
            ];
            $data1[] = [
                'topic_id' => $i,
                'name' => '3',
                'description' => '选项4',
            ];
        }

        DB::table('stopics')->insert($data1);
    }
}
