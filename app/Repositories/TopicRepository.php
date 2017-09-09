<?php

namespace App\Repositories;

use App\Topic;

class TopicRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Topic $model)
    {
        $this->model = $model;
    }

    public function getNumByType($type)
    {
        return $this->model->where('type', $type)->count();
    }

    public function getPaperTopics($limit, $type)
    {
        return $this->model->where('type', $type)->inRandomOrder()->limit($limit)->select('id')->get()->toArray();
    }
}