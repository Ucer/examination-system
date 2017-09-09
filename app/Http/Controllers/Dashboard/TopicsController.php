<?php

namespace App\Http\Controllers\Dashboard;

use App\Repositories\PaperRepository;
use App\Repositories\StopicRepository;
use App\Repositories\TopicRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class TopicsController extends Controller
{
    protected $topicRepository;
    protected $stopicRepository;
    protected $paperRepository;

    public function __construct(TopicRepository $topicRepository, StopicRepository $stopicRepository, PaperRepository $paperRepository)
    {
        $this->topicRepository = $topicRepository;
        $this->stopicRepository = $stopicRepository;
        $this->paperRepository = $paperRepository;
    }
    public function index()
    {
        $list = $this->topicRepository->getAllData('*', false);
        return view('dashboard.index', compact('list'));
    }

    public function show($id)
    {
        $info = $this->topicRepository->getById($id);
        $list = getSelect($id);
        return view('dashboard.topics.show', compact('info','list'));
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

    public function paper()
    {
        $list = $this->paperRepository->getAllData('*', false);
        return view('dashboard.paper', compact('list'));
    }
    public function createP()
    {
        return view('dashboard.papers.create');
    }
}
