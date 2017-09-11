<?php

namespace App\Http\Controllers\Dashboard;

use App\Repositories\DanswerRepository;
use App\Repositories\DoingRepository;
use App\Repositories\PaperRepository;
use App\Repositories\StopicRepository;
use App\Repositories\SubpaperRepository;
use App\Repositories\TopicRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;

class TopicsController extends Controller
{
    protected $topicRepository;
    protected $stopicRepository;
    protected $paperRepository;
    protected $subpaperRepository;
    protected $doingRepository;
    protected $danswerRepository;

    public function __construct(DanswerRepository $danswerRepository, DoingRepository $doingRepository, TopicRepository $topicRepository, StopicRepository $stopicRepository, PaperRepository $paperRepository, SubpaperRepository $subpaperRepository)
    {
        $this->topicRepository = $topicRepository;
        $this->stopicRepository = $stopicRepository;
        $this->paperRepository = $paperRepository;
        $this->subpaperRepository = $subpaperRepository;
        $this->doingRepository = $doingRepository;
        $this->danswerRepository = $danswerRepository;
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
        return view('dashboard.topics.show', compact('info', 'list'));
    }

    public function create()
    {
        return view('dashboard.topics.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        if (in_array($data['type'], ['radio', 'multiselect', 'select'])) {
            $info = $this->topicRepository->store($data);
            $addData = [];

            foreach ($data['select_option'] as $k => $v) {
                if ($v) {
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

    // 试卷
    public function createP()
    {
        $radio_num = $this->topicRepository->getNumByType('radio');
        $multiselect_num = $this->topicRepository->getNumByType('multiselect');
        $select_num = $this->topicRepository->getNumByType('select');
        $field_num = $this->topicRepository->getNumByType('field');
        $judge_num = $this->topicRepository->getNumByType('judge');
        $ask_num = $this->topicRepository->getNumByType('ask');
        $materail_num = $this->topicRepository->getNumByType('materail');
        return view('dashboard.papers.create', compact('radio_num', 'materail_num', 'select_num', 'field_num', 'multiselect_num', 'judge_num', 'ask_num'));
    }

    public function storeP(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['generate_type'] = 0;
        $data['status'] = 1;

        $radio = $this->topicRepository->getPaperTopics($data['radio_num'], 'radio');
        $multiselec = $this->topicRepository->getPaperTopics($data['multiselect_num'], 'multiselect');
        $select = $this->topicRepository->getPaperTopics($data['select_num'], 'select');
        $field = $this->topicRepository->getPaperTopics($data['field_num'], 'field');
        $judge = $this->topicRepository->getPaperTopics($data['judge_num'], 'judge');
        $ask = $this->topicRepository->getPaperTopics($data['ask_num'], 'ask');
        $materail = $this->topicRepository->getPaperTopics($data['materail_num'], 'materail');

        $radio_value = floor($data['radio_value'] / $data['radio_num']);
        $multiselect_value = floor($data['multiselect_value'] / $data['multiselect_num']);
        $select_value = floor($data['select_value'] / $data['select_num']);
        $field_value = floor($data['field_value'] / $data['field_num']);
        $judge_value = floor($data['judge_value'] / $data['judge_num']);
        $ask_value = floor($data['ask_value'] / $data['ask_num']);
        $materail_value = floor($data['materail_value'] / $data['materail_num']);

        $data['topic_count'] = $data['radio_num'] + $data['multiselect_num'] + $data['select_num'] + $data['field_num'] + $data['judge_num'] + $data['ask_num'] + $data['materail_num'];
        $data['value_count'] = $data['radio_value'] + $data['multiselect_value'] + $data['select_value'] + $data['field_value'] + $data['judge_value'] + $data['ask_value'] + $data['materail_value'];
        $info = $this->paperRepository->store($data);
        $pid = $info->id;

        $addData = [];
        foreach ($radio as $v) {
            $addData[] = ['paper_id' => $pid, 'topic_id' => $v['id'], 'value' => $radio_value, 'unchecked' => 0];
        }
        foreach ($multiselec as $v) {
            $addData[] = ['paper_id' => $pid, 'topic_id' => $v['id'], 'value' => $multiselect_value, 'unchecked' => $data['multiselect_uncheck']];
        }
        foreach ($select as $v) {
            $addData[] = ['paper_id' => $pid, 'topic_id' => $v['id'], 'value' => $select_value, 'unchecked' => $data['select_uncheck']];
        }
        foreach ($field as $v) {
            $addData[] = ['paper_id' => $pid, 'topic_id' => $v['id'], 'value' => $field_value, 'unchecked' => 0];
        }
        foreach ($judge as $v) {
            $addData[] = ['paper_id' => $pid, 'topic_id' => $v['id'], 'value' => $judge_value, 'unchecked' => 0];
        }
        foreach ($ask as $v) {
            $addData[] = ['paper_id' => $pid, 'topic_id' => $v['id'], 'value' => $ask_value, 'unchecked' => 0];
        }
        foreach ($materail as $v) {
            $addData[] = ['paper_id' => $pid, 'topic_id' => $v['id'], 'value' => $materail_value, 'unchecked' => 0];
        }

        $this->subpaperRepository->insert($addData);

        return redirect()->route('dashboard.paper');
    }

    public function showP($id)
    {
        $info = $this->paperRepository->getById($id);

        $all_topic = $this->subpaperRepository->getPaperId($id);

        $list = [];

        $i = 0;
        foreach ($all_topic as $k => $v) {
            $i += 1;
            $v->topic->order = $i;
            $v->topic->options = getSelect($v->topic_id);;
            $list[$v->topic->type][] = $v;
        }

        return view('dashboard.papers.show', compact('info', 'list', 'i'));
    }

    // 开始考试

    /**
     * @param $id 试卷 id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function doPaper($id)
    {
        $did = DB::table('doings')->where('user_id', Auth::user()->id)->where('paper_id', $id)->count();
        $is_end = DB::table('doings')->where('user_id', Auth::user()->id)->where('paper_id', $id)->where('status', 2)->count();
        if ($is_end > 0) {
            return redirect()->back()->with('error', '您已经交卷了');
        }


        $info = $this->paperRepository->getById($id);

        $all_topic = $this->subpaperRepository->getPaperId($id);

        $list = [];

        $i = 0;
        foreach ($all_topic as $k => $v) {
            $i += 1;
            $v->topic->order = $i;
            $v->topic->options = getSelect($v->topic_id);;
            $list[$v->topic->type][] = $v;
        }
        if ($did < 1) { // 第一次点击开始做题，数据入库
            $this->doingRepository->store(['paper_id' => $id, 'user_id' => Auth::user()->id]);
        }

        $doInfo = DB::table('doings')->where('user_id', Auth::user()->id)->where('paper_id', $id)->first(); // 学生开始做这个试卷


        return view('dashboard.papers.do', compact('info', 'list', 'i', 'doInfo'));
    }

    // 暂停、下次再做、交卷

    /**
     * @param $id 试卷表 id
     * @param $type 暂停「now」 交卷「end」 下次再做「next」
     * @param Request $request
     */
    public function opPaper($id, $type, Request $request)
    {
        $all_topic = $this->subpaperRepository->getPaperId($id);
        $data = $request->all();
        $doing_id = $data['doing_id'];
        $data = $data['topic'];

        // 取出所有题目，将没做的题目的 answer 置为空「null」
        foreach ($all_topic as $v) {
            $tid = $v->topic_id;
            $ids[] = $tid;

            if (!isset($data[$tid])) {
                $data[$tid] = null;
            }
            if (is_array($data[$tid])) {
                $data[$tid] = implode(',', $data[$tid]);
            }
        }

        $addData = $this->statistics($data,$id);

        // 判断是否做过了
        $num = DB::table('danswers')->where('doing_id' , $doing_id)->count();

        if($num > 0) { // 已经保存过一次了「可能是暂停过」，更新
            foreach($addData as $k => $v) {
                DB::table('danswers')->where('doing_id', $doing_id)->where('topic_id', $v['topic_id'])->update($v);
            }

        } else { //第一次保存答案，新增
            $this->danswerRepository->insert($addData);
        }
    }

    /**
     * @param $data
     * @param $id doings 表 id
     * @return array
     */

    protected function statistics($data, $id)
    {
        $arr = [];
        foreach ($data as $k => $v) {
            $arr[$k]['doing_id'] = $id;
            $arr[$k]['topic_id'] = $k;
            $arr[$k]['your_answer'] = $v;

            $topicInfo = $this->topicRepository->getById($k); // 题目详情
            $subpaper = DB::table('subpapers')->where('topic_id', $k)->first(); //试卷中的题目详情

            $arr[$k]['true_answer'] = $topicInfo['answer'];
            $arr[$k]['topic_type'] =$topicInfo['type'];
            $arr[$k]['value'] = $subpaper->value;
            $arr[$k]['unchecked'] =$subpaper->unchecked;

        }
        return $arr;
    }
//    protected function statistics($data, $do_type, $id)
//    {
//        $arr = [];
//        foreach ($data as $k => $v) {
//            $arr[$k]['doing_id'] = $id;
//            $arr[$k]['topic_id'] = $k;
//            $arr[$k]['your_answer'] = $v;
//
//            $topicInfo = $this->topicRepository->getById($k); // 题目详情
//            $subpaper = DB::table('subpapers')->where('topic_id', $k)->first(); //试卷中的题目详情
//            $type = $topicInfo['type'];
//            $true_answer = $topicInfo['answer'];
//            $value = $subpaper->value;
//            $unchecked = $subpaper->unchecked;
//            $status = 0;
//            $get_value = 0;
//
//            $arr[$k]['true_answer'] = $true_answer;
//
//            if ($do_type == end) { // 第一次交卷，对客观题计分
//
//                if (in_array($type, ['radio', 'field', 'multiselect', 'select'])) {
//
//                    if ($type == 'field') { // 填空
//                        if (in_array($v, explode(',', $true_answer))) {
//                            $status = 1;
//                            $get_value = $value;
//                        }
//                    } elseif ($type == 'multiselect' || $type == 'select') {
//                        if ($v == $true_answer) {
//                            $status = 1;
//                            $get_value = $value;
//                        } else {
//                            $answer_array = explode(',', $v);
//                            $true_answer_array = explode(',', $true_answer);
//                            if (count($answer_array) > count($true_answer_array)) {
//
//                            } else {
//                                $diff = array_diff($answer_array, $true_answer_array);
//                                if (count($diff) < 1) {
//                                    $unchecked_num = count($true_answer_array) - count($answer_array);
//                                    $get_value = $value - $unchecked * $unchecked_num;
//                                    $status = 3;// 不全
//                                }
//                            }
//                        }
//
//                    } else {  // 判断和单选
//                        if ($v == $true_answer) {
//                            $status = 1;
//                            $get_value = $value;
//                        }
//                    }
//                    $arr[$k]['get_value'] = $get_value;
//                    $arr[$k]['status'] = $status;
//                } else {
//                    $arr[$k]['get_value'] = '';
//                    $arr[$k]['status'] = 0;
//                }
//
//            } else {
//                $arr[$k]['status'] = 2;
//            }
//        }
//        return $arr;
//    }
}
