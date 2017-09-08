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
    <div class="row">
        <div  class="col-xs-2" >
            <label class="pull-right" for="abc">难度</label>
        </div>
        <div class="col-xs-10">
            <label class="radio-inline">
                <input type="radio" name="answer" value="1"> 简单&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </label>
            <label class="radio-inline">
                <input type="radio" name="answer" value="1"> 一般&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </label>
            <label class="radio-inline">
                <input type="radio" name="answer" value="1"> 困难&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </label>
        </div>
    </div>
    <div class="row ma-t15">
        <div  class="col-xs-2" >
            <label class="pull-right" for="abc">题型</label>
        </div>
        <div class="col-xs-10">
            <select name="type" id="" class="col-xs-10 control-label">
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
        <div  class="col-xs-2" >
            <label class="pull-right" for="abc">题干</label>
        </div>
        <div class="col-xs-10">
            <textarea style="height:200px;" name="name" id="myEditor">这里写你的初始化内容</textarea>
        </div>
    </div>
    <div class="row ma-t15">
        <div  class="col-xs-2" >
            <label class="pull-right" for="abc">答案</label>
        </div>
        <div class="col-xs-10">
            <input type="text" name="answer" class="form-control h50" placeholder="真空（1）答案，请填在这里">
        </div>
    </div>
    <div class="row ma-t15">
        <div  class="col-xs-2" >
            <label class="pull-right" for="abc">解析</label>
        </div>
        <div class="col-xs-10">
            <textarea style="height:200px;" name="后台取值的key" id="myEditor2">这里写你的初始化内容</textarea>
        </div>
    </div>
    <div class="row ma-t15">
        <div  class="col-xs-2" >
            <label class="pull-right" for="abc" >分值</label>
        </div>
        <div class="col-xs-10">
            <input type="number" class="form-control" name="answer" placeholder="" required>
        </div>
    </div>

    <br />
    <br />
    <hr>

    <input type="submit" class="btn btn-success pull-right ma-l20" value="确定">
    <input type="button" class="btn btn-default co-gray pull-right" value="取消">
</div>

@section('scripts')
    <script type="text/javascript">
        UE.getEditor("myEditor");
        UE.getEditor("myEditor2");

    </script>
@endsection
@endsection