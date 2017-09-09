@extends('layouts.dashboard')
@section('title','新建试题')
@section('style')
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div>
                <span class="glyphicon glyphicon-plus pull-left">&nbsp;</span>
                <h4>新建试题</h4>
                <span class="pull-right close1">×</span>
                <hr>
            </div>
        </div>
        <form action="{{ route('topic.s') }}" method="post">
            {{ csrf_field() }}
        <div class="row">
            <div class="col-xs-2">
                <label class="pull-right" for="abc">难度</label>
            </div>
            <div class="col-xs-10">
                <label class="radio-inline">
                    <input type="radio" name="level" value="0" checked> 简单&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </label>
                <label class="radio-inline">
                    <input type="radio" name="level" value="1"> 一般&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </label>
                <label class="radio-inline">
                    <input type="radio" name="level" value="2"> 困难&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </label>
            </div>
        </div>
        <div class="row ma-t15">
            <div class="col-xs-2">
                <label class="pull-right" for="abc">题型</label>
            </div>
            <div class="col-xs-10">
                <select name="type" id="topic_type" class="col-xs-10 form-control">
                    <option value="radio">单选</option>
                    <option value="multiselect">多选</option>
                    <option value="select">不定向选择</option>
                    <option value="field">填空</option>
                    <option value="judge">判断</option>
                    <option value="ask">问答</option>
                    <option value="materail">材料</option>
                </select>
            </div>
        </div>
        <div class="row ma-t15">
            <div class="col-xs-2">
                <label class="pull-right" for="name">题干</label>
            </div>
            <div class="col-xs-10">
                <textarea style="height:200px;" name="name" id="myEditor" placeholder="这里写你的初始化内容" required>今年是[]年</textarea>
            </div>
        </div>
        <div class="row ma-t15 select-option">
            <div class="col-xs-2">
                <label class="pull-right" for="abc">选项 A</label>
            </div>
            <div class="col-lg-6">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="描述" name="select_option[]">
                    <span class="input-group-btn">
                        <button class="btn btn-warning" type="button">删除</button>
                    </span>
                </div>
            </div>
        </div>
        <div class="row ma-t15 select-option">
            <div class="col-xs-2">
                <label class="pull-right" for="abc">选项 B</label>
            </div>
            <div class="col-lg-6">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="描述" name="select_option[]">
                    <span class="input-group-btn">
                        <button class="btn btn-warning" type="button">删除</button>
                    </span>
                </div>
            </div>
        </div>
        <div class="row ma-t15 select-option">
            <div class="col-xs-2">
                <label class="pull-right" for="abc">选项 C</label>
            </div>
            <div class="col-lg-6">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="描述" name="select_option[]">
                    <span class="input-group-btn">
                        <button class="btn btn-warning" type="button">删除</button>
                    </span>
                </div>
            </div>
        </div>
        <div class="row ma-t15 select-option">
            <div class="col-xs-2">
                <label class="pull-right" for="abc">选项 D</label>
            </div>
            <div class="col-lg-6">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="描述" name="select_option[]">
                    <span class="input-group-btn">
                        <button class="btn btn-warning" type="button">删除</button>
                    </span>
                </div>
            </div>
        </div>
        <div class="row ma-t15" id="add-select">
            <div class="col-xs-2">
                <label class="pull-right" for="abc"></label>
            </div>
            <div class="col-xs-3">
               <span class="input-group-btn">
                    <button class="btn btn-primary right" type="button" id="addBtn">新增选项</button>
                </span>
            </div>
        </div>
        <div class="row ma-t15">
            <div class="col-xs-2">
                <label class="pull-right" for="abc">答案</label>
            </div>
            <div class="col-xs-10">
                <input type="text" name="answer" class="form-control h50" required placeholder="问答和材料分析直接在此写正确答案，判断题只能写 true|false，选择题与填空题多个答案以逗号隔开">
            </div>
        </div>
        <div class="row ma-t15">
            <div class="col-xs-2">
                <label class="pull-right" for="abc">解析</label>
            </div>
            <div class="col-xs-10">
                <textarea style="height:200px;" name="description" id="myEditor2" required></textarea>
            </div>
        </div>
        <div class="row ma-t15">
            <div class="col-xs-2">
                <label class="pull-right" for="abc">分值</label>
            </div>
            <div class="col-xs-10">
                <input type="number" class="form-control" name="value" placeholder="" required>
            </div>
        </div>

        <br/>
        <br/>
        <hr>
        <input type="submit" class="btn btn-success pull-right ma-l20" value="确定">
        <input type="button" class="btn btn-default co-gray pull-right" value="取消">
        </form>
    </div><br/><br/>

@section('scripts')
    <script type="text/javascript">
        UE.getEditor("myEditor");
        UE.getEditor("myEditor2");

        $(function () {
            var type = $('#topic_type').val();
            if (type == 'radio' || type == 'multiselect' || type == 'select') {

            } else {
                $(".select-option").hide();
                $("#add-select").hide();
            }

        });

        $("#topic_type").change(function () {
            var type = $('#topic_type').val();
            if (type == 'radio' || type == 'multiselect' || type == 'select') {
                $(".select-option").show();
                $("#add-select").show();
            }else {
                $(".select-option").hide();
                $("#add-select").hide();
            }
        });
    </script>
@endsection
@endsection