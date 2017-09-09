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
}