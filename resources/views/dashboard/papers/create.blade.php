@extends('layouts.dashboard')
@section('title','新建试卷')
@section('style')
@endsection


@section('content')
    <body>
    <div class="container">
        <div class="row">
            <div>
                <span class="glyphicon glyphicon-plus pull-left">&nbsp;</span>
                <h4>创建试卷</h4>
                <span class="pull-right close1">×</span>
                <hr>
            </div>
        </div>
        <form action="{{ route('paper.s') }}" method="post">
            {{ csrf_field() }}
        <div class="row">
            <div  class="col-xs-2" >
                <label class="pull-right" >试卷名称</label>
            </div>
            <div class="col-xs-8">
                <input type="text" class="form-control" name="name" required>
            </div>
        </div>
        <div class="row ma-t15">
            <div  class="col-xs-2" >
                <label class="pull-right">试卷说明</label>
            </div>
            <div class="col-xs-8">
                <textarea style="height:200px;" name="description" id="myEditor" required></textarea>
            </div>
        </div>
        <div class="row ma-t15">
            <div  class="col-xs-2" >
                <label class="pull-right">时间限制</label>
            </div>
            <div class="col-xs-8">
                <div style="width:300px;float:left;">
                    <input type="text" name="limit_time" class="form-control" placeholder="0为不限时" required>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;<span style="line-height:34px;">分钟</span>

            </div>
        </div>
        <div class="row ma-t15">
            <div  class="col-xs-2" >
                <label class="pull-right">生成方式</label>
            </div>
            <div class="col-xs-10">
                <input type="radio" name="generate_type" value="0" checked>&nbsp;随机生成&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input class="ml30" type="radio" name="generate_type" value="1">&nbsp;按难易度生成
                <span class="text-warning"> 目前仅支持随机生成</span>
            </div>
        </div>
        <div class="row ma-t15">
            <div  class="col-xs-2" >
                <label class="pull-right">试卷难度</label>
            </div>
            <div class="col-xs-10">
                <div class="col-xs-10">
                    <input type="text" name="percentag" placeholder="简单比" class="col-xs-2">
                    <input type="text" name="percentag1" placeholder="一般比" class="col-xs-2">
                    <input type="text" name="percentag2" placeholder="困难比" class="col-xs-2"> <span style="font-weight: 700">单位%</span>
                </div>
            </div>
        </div>
        <div class="row ma-t15">
            <div  class="col-xs-2" >
                <label class="pull-right">题目设置</label>
            </div>
            <div class="col-xs-10">
                <div class="row">
                    <div class="col-xs-2"><span class="glyphicon glyphicon-move text-primary"></span>单选题</div>
                    <div class="col-xs-2">题目数量：<span class="w50 dis_il"><input type="text" class="form-control" name="radio_num" required></span></div> <span class="text-warning"> 目前题库有 {{ $radio_num }} 个题</span>
                    <div class="col-xs-2">题目分值：<span class="w50 dis_il"><input type="text" class="form-control" name="radio_value" required></span></div>
                </div>
                <div class="row mt10">
                    <div class="col-xs-2"><span class="glyphicon glyphicon-move text-primary"></span>多选题</div>
                    <div class="col-xs-2">题目数量：<span class="w50 dis_il"><input type="text" class="form-control" name="multiselect_num" required></span></div><span class="text-warning">  目前题库有 {{ $multiselect_num }} 个题</span>
                    <div class="col-xs-2">题目分值：<span class="w50 dis_il"><input type="text" class="form-control" name="multiselect_value" required></span></div>
                    <div class="col-xs-6">漏选分值：<span class="w50 dis_il"><input type="text" class="form-control" name="multiselect_uncheck" required></span><span class="text-danger"> 缺一道题</span>
                    </div>
                </div>
                <div class="row mt10">
                    <div class="col-xs-2"><span class="glyphicon glyphicon-move text-primary"></span>不定向选择</div>
                    <div class="col-xs-2">题目数量：<span class="w50 dis_il"><input type="text" class="form-control" name="select_num" required></span></div><span class="text-warning">  目前题库有 {{ $select_num }} 个题</span>
                    <div class="col-xs-2">题目分值：<span class="w50 dis_il"><input type="text" class="form-control" name="select_value"required></span></div>
                    <div class="col-xs-6">漏选分值：<span class="w50 dis_il"><input type="text" class="form-control" name="select_uncheck" required></span><span class="text-danger"> 缺一道题</span>
                    </div>
                </div>
                <div class="row mt10">
                    <div class="col-xs-2"><span class="glyphicon glyphicon-move text-primary"></span>填空题</div>
                    <div class="col-xs-2">题目数量：<span class="w50 dis_il"><input type="text" class="form-control" name="field_num" required></span></div><span class="text-warning">  目前题库有 {{ $field_num }} 个题</span>
                    <div class="col-xs-2">题目分值：<span class="w50 dis_il"><input type="text" class="form-control" name="field_value" required></span></div>
                </div>
                <div class="row mt10">
                    <div class="col-xs-2"><span class="glyphicon glyphicon-move text-primary"></span>判断题</div>
                    <div class="col-xs-2">题目数量：<span class="w50 dis_il"><input type="text" class="form-control" name="judge_num" required></span></div><span class="text-warning">  目前题库有 {{ $judge_num }} 个题</span>
                    <div class="col-xs-2">题目分值：<span class="w50 dis_il"><input type="text" class="form-control" name="judge_value" required></span></div>
                </div>
                <div class="row mt10">
                    <div class="col-xs-2"><span class="glyphicon glyphicon-move text-primary"></span>问答题</div>
                    <div class="col-xs-2">题目数量：<span class="w50 dis_il"><input type="text" class="form-control" name="ask_num" required></span></div><span class="text-warning">  目前题库有 {{ $ask_num }} 个题</span>
                    <div class="col-xs-2">题目分值：<span class="w50 dis_il"><input type="text" class="form-control" name="ask_value" required></span></div>
                </div>
                <div class="row mt10">
                    <div class="col-xs-2"><span class="glyphicon glyphicon-move text-primary"></span>材料题</div>
                    <div class="col-xs-2">题目数量：<span class="w50 dis_il"><input type="text" class="form-control" name="materail_num" required></span></div><span class="text-warning">  目前题库有 {{ $materail_num }} 个题</span>
                    <div class="col-xs-2">题目分值：<span class="w50 dis_il"><input type="text" class="form-control" name="materail_value" required></span></div>
                </div>
            </div>
        </div>

        <br />
        <br />
        <hr>

        <input type="button" class="btn btn-default co-gray pull-right ma-l20" value="取消">
        <input type="submit" class="btn btn-primary pull-right" value="生成试卷">
        </form>
    </div>

@section('scripts')
    <script type="text/javascript">
        UE.getEditor("myEditor");
        UE.getEditor("myEditor2");

    </script>
@endsection
@endsection