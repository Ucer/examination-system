<?php

namespace App\Repositories;


use App\Danswer;

class DanswerRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Danswer $model)
    {
        $this->model = $model;
    }
}