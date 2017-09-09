<?php

namespace App\Repositories;

use App\Subpaper;

class SubpaperRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Subpaper $model)
    {
        $this->model = $model;
    }
}