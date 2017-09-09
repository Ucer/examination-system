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
        <div class="row">
            <div  class="col-xs-2" >
                <label class="pull-right" >试卷名称</label>
            </div>
            <div class="col-xs-8">
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="row ma-t15">
            <div  class="col-xs-2" >
                <label class="pull-right">试卷说明</label>
            </div>
            <div class="col-xs-8">
                <textarea style="height:200px;" name="后台取值的key" id="myEditor"></textarea>
            </div>
        </div>
        <div class="row ma-t15">
            <div  class="col-xs-2" >
                <label class="pull-right">时间限制</label>
            </div>
            <div class="col-xs-8">
                <div style="width:300px;float:left;">
                    <input type="text" name="answer" class="form-control" placeholder="真空（1）答案，请填在这里">
                </div>&nbsp;&nbsp;&nbsp;&nbsp;<span style="line-height:34px;">分钟</span>

            </div>
        </div>
        <div class="row ma-t15">
            <div  class="col-xs-2" >
                <label class="pull-right">生成方式</label>
            </div>
            <div class="col-xs-10">
                <input type="radio">&nbsp;随机生成&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input class="ml30" type="radio">&nbsp;按难易度生成
            </div>
        </div>
        <div class="row ma-t15">
            <div  class="col-xs-2" >
                <label class="pull-right">试卷难度</label>
            </div>
            <div class="col-xs-10">

            </div>
        </div>
        <div class="row ma-t15">
            <div  class="col-xs-2" >
                <label class="pull-right">题目设置</label>
            </div>
            <div class="col-xs-10">
                <div class="row">
                    <div class="col-xs-2"><span class="glyphicon glyphicon-move text-primary"></span>单选题</div>
                    <div class="col-xs-2">题目数量：<span class="w50 dis_il"><input type="text" class="form-control"></span></div>
                    <div class="col-xs-2">题目分值：<span class="w50 dis_il"><input type="text" class="form-control"></span></div>
                </div>
                <div class="row mt10">
                    <div class="col-xs-2"><span class="glyphicon glyphicon-move text-primary"></span>多选题</div>
                    <div class="col-xs-2">题目数量：<span class="w50 dis_il"><input type="text" class="form-control"></span></div>
                    <div class="col-xs-2">题目分值：<span class="w50 dis_il"><input type="text" class="form-control"></span></div>
                    <div class="col-xs-6">漏选分值：<span class="w50 dis_il"><input type="text" class="form-control"></span><span class="text-danger"> 缺一道题</span>
                    </div>
                </div>
                <div class="row mt10">
                    <div class="col-xs-2"><span class="glyphicon glyphicon-move text-primary"></span>多选题</div>
                    <div class="col-xs-2">题目数量：<span class="w50 dis_il"><input type="text" class="form-control"></span></div>
                    <div class="col-xs-2">题目分值：<span class="w50 dis_il"><input type="text" class="form-control"></span></div>
                    <div class="col-xs-6">漏选分值：<span class="w50 dis_il"><input type="text" class="form-control"></span><span class="text-danger"> 缺一道题</span>
                    </div>
                </div>
                <div class="row mt10">
                    <div class="col-xs-2"><span class="glyphicon glyphicon-move text-primary"></span>多选题</div>
                    <div class="col-xs-2">题目数量：<span class="w50 dis_il"><input type="text" class="form-control"></span></div>
                    <div class="col-xs-2">题目分值：<span class="w50 dis_il"><input type="text" class="form-control"></span></div>
                    <div class="col-xs-6">漏选分值：<span class="w50 dis_il"><input type="text" class="form-control"></span><span class="text-danger"> 缺一道题</span>
                    </div>
                </div>
            </div>
        </div>


        <br />
        <br />
        <hr>

        <input type="button" class="btn btn-default co-gray pull-right ma-l20" value="取消">
        <input type="submit" class="btn btn-primary pull-right" value="生成试卷">
    </div>

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