<?php

namespace App\Http\Controllers\Dashboard;

use App\Repositories\StopicRepository;
use App\Repositories\TopicRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class TopicsController extends Controller
{
    protected $topicRepository;
    protected $stopicRepository;

    public function __construct(TopicRepository $topicRepository, StopicRepository $stopicRepository)
    {
        $this->topicRepository = $topicRepository;
        $this->stopicRepository = $stopicRepository;
    }
    public function index()
    {
        $list = $this->topicRepository->getAllData('*', false);
        return view('dashboard.index', compact('list'));
    }

    public function create()
    {
        return view('dashboard.topics.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        if(in_array($data['type'],['radio','multiselect','select'])) {
            $info = $this->topicRepository->store($data);
            $addData = [];

            foreach ($data['select_option'] as $k => $v) {
                if($v) {
                    $addData[] = ['topic_id' => $info->id, 'name' => $k, 'description' => $v];
                }
            }
            $this->stopicRepository->insert($addData);

        } else {
            $this->topicRepository->store($data);
        }
        return redirect()->route('dashboard');

    }
}
