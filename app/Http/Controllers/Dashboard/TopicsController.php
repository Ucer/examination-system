<?php

namespace App\Http\Controllers\Dashboard;

use App\Repositories\PaperRepository;
use App\Repositories\StopicRepository;
use App\Repositories\SubpaperRepository;
use App\Repositories\TopicRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class TopicsController extends Controller
{
    protected $topicRepository;
    protected $stopicRepository;
    protected $paperRepository;
    protected $subpaperRepository;

    public function __construct(TopicRepository $topicRepository, StopicRepository $stopicRepository, PaperRepository $paperRepository, SubpaperRepository $subpaperRepository)
    {
        $this->topicRepository = $topicRepository;
        $this->stopicRepository = $stopicRepository;
        $this->paperRepository = $paperRepository;
        $this->subpaperRepository = $subpaperRepository;
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
        $radio_num = $this->topicRepository->getNumByType('radio');
        $multiselect_num = $this->topicRepository->getNumByType('multiselect');
        $select_num = $this->topicRepository->getNumByType('select');
        $field_num = $this->topicRepository->getNumByType('field');
        $judge_num = $this->topicRepository->getNumByType('judge');
        $ask_num = $this->topicRepository->getNumByType('ask');
        $materail_num = $this->topicRepository->getNumByType('materail');
        return view('dashboard.papers.create',compact('radio_num','materail_num','select_num','field_num','multiselect_num','judge_num','ask_num'));
    }
    public function storeP(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['generate_type'] = 0;
        $data['status'] = 1;

        $radio =  $this->topicRepository->getPaperTopics($data['radio_num'], 'radio');
        $multiselec =  $this->topicRepository->getPaperTopics($data['multiselect_num'], 'multiselect');
        $select =  $this->topicRepository->getPaperTopics($data['select_num'], 'select');
        $field =  $this->topicRepository->getPaperTopics($data['field_num'], 'field');
        $judge =  $this->topicRepository->getPaperTopics($data['judge_num'], 'judge');
        $ask =  $this->topicRepository->getPaperTopics($data['ask_num'], 'ask');
        $materail =  $this->topicRepository->getPaperTopics($data['materail_num'], 'materail');

        $radio_value = floor($data['radio_value']/$data['radio_num']);
        $multiselect_value = floor($data['multiselect_value']/$data['multiselect_num']);
        $select_value = floor($data['select_value']/$data['select_num']);
        $field_value = floor($data['field_value']/$data['field_num']);
        $judge_value = floor($data['judge_value']/$data['judge_num']);
        $ask_value = floor($data['ask_value']/$data['ask_num']);
        $materail_value = floor($data['materail_value']/$data['materail_num']);

        $data['topic_count'] = $data['radio_num'] + $data['multiselect_num'] + $data['select_num'] + $data['field_num'] +$data['judge_num'] + $data['ask_num'] + $data['materail_num'];
        $data['value_count'] = $data['radio_value'] + $data['multiselect_value'] + $data['select_value'] + $data['field_value'] +$data['judge_value'] + $data['ask_value'] + $data['materail_value'];
        $info = $this->paperRepository->store($data);
        $pid = $info->id;

        $addData = [];
        foreach($radio as $v) {
            $addData[] = ['paper_id' => $pid, 'topic_id' => $v['id'], 'value' => $radio_value, 'unchecked' => 0];
        }
        foreach($multiselec as $v) {
            $addData[] = ['paper_id' => $pid, 'topic_id' => $v['id'], 'value' => $multiselect_value, 'unchecked' => $data['multiselect_uncheck']];
        }
        foreach($select as $v) {
            $addData[] = ['paper_id' => $pid, 'topic_id' => $v['id'], 'value' => $select_value, 'unchecked' => $data['select_uncheck']];
        }
        foreach($field as $v) {
            $addData[] = ['paper_id' => $pid, 'topic_id' => $v['id'], 'value' => $field_value, 'unchecked' => 0];
        }
        foreach($judge as $v) {
            $addData[] = ['paper_id' => $pid, 'topic_id' => $v['id'], 'value' => $judge_value, 'unchecked' => 0];
        }
        foreach($ask as $v) {
            $addData[] = ['paper_id' => $pid, 'topic_id' => $v['id'], 'value' => $ask_value, 'unchecked' => 0];
        }
        foreach($materail as $v) {
            $addData[] = ['paper_id' => $pid, 'topic_id' => $v['id'], 'value' => $materail_value, 'unchecked' => 0];
        }

        $this->subpaperRepository->insert($addData);

        return redirect()->route('dashboard.paper');
    }

    public function showP($id)
    {
        $info = $this->paperRepository->getById($id);

        $all_topic =  $this->subpaperRepository->getPaperId($id);

        $list = [];

        $i = 0;
        foreach ($all_topic as $k=>$v) {
            $i +=1;
            $v->topic->order = $i;
            $v->topic->options = getSelect($v->topic_id);;
            $list[$v->topic->type][] = $v;
        }

        return view('dashboard.papers.show', compact('info', 'list','i'));
    }
}
