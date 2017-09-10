<?php

use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = factory(\App\Topic::class)->times(100)->make()->each(function ($article, $i) {
            if ($i < 30) {
                $category = 'field';
            } elseif ($i < 60) {
                $category = 'judge';
            } elseif ($i < 90) {
                $category = 'ask';
            } else {
                $category = 'materail';
            }
            $article->type = $category;
            $article->level = rand(0, 2);
            $article->value = rand(1,30);
            if($category == 'judge'){
                $article->answer = rand(0,1) ? 'true' : 'false';
            }
        });
        DB::table('topics')->insert($articles->toArray());
    }
}
