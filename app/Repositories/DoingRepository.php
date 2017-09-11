<?php

namespace App\Repositories;


use App\Doing;

class DoingRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Doing $model)
    {
        $this->model = $model;
    }
}