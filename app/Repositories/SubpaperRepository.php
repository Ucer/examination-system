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


    public function getPaperId($paper_id)
    {
        return $this->model->where('paper_id', $paper_id)->with('topic')->get();
    }}