@extends('layouts.dashboard')
@section('title','考试中')
@section('style')
@endsection


@section('content')
    <div class="container">
        <div class="row bb pb5">
            <h3 class="fl">{{ $info->name }}</h3>
        </div>
        <div class="row" id="toolbar">
            <p class="ph15">共{{ $info->topic_count }}题，总分{{ $info->value_count }}分，请在{{ $info->limit_time }}分钟内做完</p>
            <ul class="nav nav-pills" id="nav_top">
                <li class="active"><a href="#radio">单项选择题</a></li>
                <li><a href="#multiselect">多项选择题</a></li>
                <li><a href="#select">不定项选择题</a></li>
                <li><a href="#field">填空题</a></li>
                <li><a href="#judge">判断题</a></li>
                <li><a href="#ask">问答题</a></li>
                <li><a href="#materail">材料题</a></li>
            </ul>
        </div>

        <div class="row" data-spy="scroll" data-target="#listbar" data-offset="0">

            <form action="{{ route('paper.stop',['id'=>$info->id, 'type' => 'end']) }}" method="post">
            <div class="col-xs-9 pr15" data-spy="scroll" data-target="#toolbar" data-offset="0"
                 style="height:750px;overflow:auto;">
                    {{ csrf_field() }}
                <input type="hidden" name="doing_id" value="{{ $doInfo->id }}" >
                    <div class="row mr0">
                        <div class="panel panel-default">
                            <div class="panel-heading" id="radio"><strong>一、单项选择题</strong></div>
                            <div class="panel-body">
                                @foreach($list['radio'] as $k=>$v)
                                    <div class="row">
                                        <div class="col-xs-1">
                                            <p class="text-primary fz18 fr" id="radio{{ $k+1 }}">{{ $v->topic->order }}
                                                .</p>
                                            <input type="button" class="btn btn-default btn-xs co-gray pull-right"
                                                   value="{{ $v->value }}分" disabled/>
                                        </div>

                                        <div class="col-xs-11">
                                            <p>{!! $v->topic->name !!}</p>
                                            <hr class="dash">
                                            <br/>
                                            @foreach($v->topic->options as $vv)
                                                <p>{{ $vv->name }}.&nbsp;&nbsp;{{ $vv->description }}</p>
                                            @endforeach
                                            <hr class="dash">
                                            <p>
                                                @foreach($v->topic->options  as $vv)
                                                    <label class="radio-inline">
                                                        <input type="radio" name="topic[{{$v->topic->id}}]"
                                                               value="{{ $vv->name }}"> {{ $vv->name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </label>
                                            @endforeach

                                            <p/>
                                        </div>
                                    </div>
                                    <br/>
                                    <br/>
                                    <hr/>
                                @endforeach
                            </div>
                        </div>


                        <div class="panel panel-default" id="multiselect">
                            <div class="panel-heading"><strong>二、多项选择题</strong></div>
                            <div class="panel-body">
                                @foreach($list['multiselect'] as $k=>$v)
                                    <div class="row">
                                        <div class="col-xs-1">
                                            <p class="text-primary fz18 fr"
                                               id="multiselect{{ $k+1 }}">{{ $v->topic->order }}.</p>
                                            <input type="button" class="btn btn-default btn-xs co-gray pull-right"
                                                   value="{{ $v->value }}分" disabled/>
                                        </div>

                                        <div class="col-xs-11">
                                            <p>{!! $v->topic->name !!}</p>
                                            <hr class="dash">
                                            <br/>
                                            @foreach($v->topic->options as $vv)
                                                <p>{{ $vv->name }}.&nbsp;&nbsp;{{ $vv->description }}</p>
                                            @endforeach
                                            <hr class="dash">
                                            <p>
                                                @foreach($v->topic->options  as $vv)
                                                    <label class="radio-inline">
                                                        <input type="checkbox" name="topic[{{$v->topic->id}}][]"
                                                               value="{{ $vv->name }}"> {{ $vv->name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </label>
                                            @endforeach

                                            <p/>
                                        </div>
                                    </div>
                                    <br/>
                                    <br/>
                                    <hr/>
                                @endforeach
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" id="select"><strong>三、不定向项选择题</strong></div>
                            <div class="panel-body">
                                @foreach($list['select'] as $k=>$v)
                                    <div class="row">
                                        <div class="col-xs-1">
                                            <p class="text-primary fz18 fr" id="select{{ $k+1 }}">{{ $v->topic->order }}
                                                .</p>
                                            <input type="button" class="btn btn-default btn-xs co-gray pull-right"
                                                   value="{{ $v->value }}分" disabled/>
                                        </div>

                                        <div class="col-xs-11">
                                            <p>{!! $v->topic->name !!}</p>
                                            <hr class="dash">
                                            <br/>
                                            @foreach($v->topic->options as $vv)
                                                <p>{{ $vv->name }}.&nbsp;&nbsp;{{ $vv->description }}</p>
                                            @endforeach
                                            <hr class="dash">
                                            <p>
                                                @foreach($v->topic->options  as $vv)
                                                    <label class="radio-inline">
                                                        <input type="checkbox" name="topic[{{$v->topic->id}}][]"
                                                               value="{{ $vv->name }}"> {{ $vv->name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </label>
                                            @endforeach

                                            <p/>
                                        </div>
                                    </div>
                                    <br/>
                                    <br/>
                                    <hr/>
                                @endforeach
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div id="field" class="panel-heading"><strong>四、填空题</strong></div>
                            <div class="panel-body">
                                @foreach($list['field'] as $k=>$v)
                                    <div class="row">
                                        <div class="col-xs-1">
                                            <p class="text-primary fz18 fr" id="field{{ $k+1 }}">{{ $v->topic->order }}
                                                .</p>
                                            <input type="button" class="btn btn-default btn-xs co-gray pull-right"
                                                   value="{{ $v->topic->value }}分" disabled/>
                                        </div>
                                        <div class="col-xs-11">
                                            <p>{!! $v->topic->name !!}</p>
                                            <hr class="dash">
                                            <input type="text" name="topic[{{$v->topic->id}}]" value=""
                                                   class="form-control" placeholder="填空（1）答案，请填在这里">
                                            <br/>
                                            <br/>
                                            <hr>

                                        </div>
                                    </div>
                                    <br/>
                                    <br/>
                                    <hr/>
                                @endforeach
                            </div>
                        </div>


                        <div class="panel panel-default">
                            <div id="judge" class="panel-heading"><strong>五、判断题</strong></div>
                            <div class="panel-body">
                                @foreach($list['judge'] as $k=>$v)
                                    <div class="row">
                                        <div class="col-xs-1">
                                            <p class="text-primary fz18 fr" id="judge{{ $k+1 }}">{{ $v->topic->order }}
                                                .</p>
                                            <input type="button" class="btn btn-default btn-xs co-gray pull-right"
                                                   value="{{ $v->topic->value }}分" disabled/>
                                        </div>
                                        <div class="col-xs-11">
                                            <p>{!! $v->topic->name !!}</p>
                                            <hr class="dash">
                                            <p>
                                                <label class="radio-inline">
                                                    <input type="radio" name="topic[{{$v->topic->id}}]" value="true"> 正确&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="topic[{{$v->topic->id}}]" value="false">
                                                    错误&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </label>
                                            <p/>
                                            <br/>
                                            <br/>
                                            <hr>

                                        </div>
                                    </div>
                                    <br/>
                                    <br/>
                                    <hr/>
                                @endforeach
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div id="ask" class="panel-heading"><strong>六、问答</strong></div>
                            <div class="panel-body">
                                @foreach($list['ask'] as $k=>$v)
                                    <div class="row">
                                        <div class="col-xs-1">
                                            <p class="text-primary fz18 fr" id="ask{{ $k+1 }}">{{ $v->topic->order }}
                                                .</p>
                                            <input type="button" class="btn btn-default btn-xs co-gray pull-right"
                                                   value="{{ $v->topic->value }}分" disabled/>
                                        </div>
                                        <div class="col-xs-11">
                                            <p>{!! $v->topic->name !!}</p>
                                            <hr class="dash">
                                            <input type="text" name="topic[{{$v->topic->id}}]" value=""
                                                   class="form-control" placeholder="答案，请填在这里">
                                            <br/>
                                            <br/>
                                            <hr>

                                        </div>
                                    </div>
                                    <br/>
                                    <br/>
                                    <hr/>
                                @endforeach
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div id="materail" class="panel-heading"><strong>七、材料题</strong></div>
                            <div class="panel-body">
                                @foreach($list['materail'] as $k=>$v)
                                    <div class="row">
                                        <div class="col-xs-1">
                                            <p class="text-primary fz18 fr"
                                               id="materail{{ $k+1 }}">{{ $v->topic->order }}.</p>
                                            <input type="button" class="btn btn-default btn-xs co-gray pull-right"
                                                   value="{{ $v->topic->value }}分" disabled/>
                                        </div>
                                        <div class="col-xs-11">
                                            <p>{!! $v->topic->name !!}</p>
                                            <hr class="dash">
                                            <input type="text" name="topic[{{$v->topic->id}}]" value=""
                                                   class="form-control" placeholder="请填在这里">
                                            <br/>
                                            <br/>
                                            <hr>

                                        </div>
                                    </div>
                                    <br/>
                                    <br/>
                                    <hr/>
                                @endforeach
                            </div>
                        </div>

                    </div>
            </div>


            <div class="col-xs-3 pl15">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a class="btn"><span style="color:black">考试倒计时：</span> <span id="countdown_time"></span></a>
                            <ul>
                                <a class="btn btn-now">暂停</a>
                                <a class="btn btn-next">下次再做</a>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <dl>
                                <dt>一、单项选择题{{ count($list['radio']) }}</dt>
                                @for($i=0;$i < count($list['radio']);$i++)
                                    <dd class="btn btn-default m5"><a href="#radio{{ $i+1 }}">{{ $i+1 }}</a></dd>
                                @endfor
                            </dl>
                            <dl>
                                <dt>二、多项选择题{{ count($list['multiselect']) }}</dt>
                                @for($i=0;$i < count($list['multiselect']);$i++)
                                    <dd class="btn btn-default m5"><a href="#multiselect{{ $i+1 }}">{{ $i+1 }}</a></dd>
                                @endfor
                            </dl>
                            <dl>
                                <dt>三、不定项项选择题{{ count($list['select']) }}</dt>
                                @for($i=0;$i < count($list['select']);$i++)
                                    <dd class="btn btn-default m5"><a href="#select{{ $i+1 }}">{{ $i+1 }}</a></dd>
                                @endfor
                            </dl>
                            <dl>
                                <dt>四、填空题{{ count($list['field']) }}</dt>
                                @for($i=0;$i < count($list['field']);$i++)
                                    <dd class="btn btn-default m5"><a href="#field{{ $i+1 }}">{{ $i+1 }}</a></dd>
                                @endfor
                            </dl>
                            <dl>
                                <dt>五、判断题{{ count($list['judge']) }}</dt>
                                @for($i=0;$i < count($list['judge']);$i++)
                                    <dd class="btn btn-default m5"><a href="#judge{{ $i+1 }}">{{ $i+1 }}</a></dd>
                                @endfor
                            </dl>
                            <dl>
                                <dt>六、问答题{{ count($list['ask']) }}</dt>
                                @for($i=0;$i < count($list['ask']);$i++)
                                    <dd class="btn btn-default m5"><a href="#ask{{ $i+1 }}">{{ $i+1 }}</a></dd>
                                @endfor
                            </dl>
                            <dl>
                                <dt>七、材料题{{ count($list['materail']) }}</dt>
                                @for($i=0;$i < count($list['materail']);$i++)
                                    <dd class="btn btn-default m5"><a href="#materail{{ $i+1 }}">{{ $i+1 }}</a></dd>
                                @endfor
                            </dl>
                        </div>
                        <div class="panel-footer">
                            <input type="submit" class="btn btn-success form-control" value="我要交卷">
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    @section('scripts')
        <script>
            $(function() {
                //设置时间倒计时
                setCountDown_time();
            });
            /*时间倒计时*/
            var sec = 60,min = '{{ $info->limit_time -1 }}';
            var format = function(str) {
                if(parseInt(str) < 10) {
                    return "0" + str;
                }
                return str;
            };
            function setCountDown_time(){
                var idt = window.setInterval("ls();", 1000);
            }
            function ls() {
                sec--;
                if(sec == 0) {
                    min--;
                    sec = 59;
                }
                document.getElementById("countdown_time").innerHTML = format(min) + ":" + format(sec);
                if(parseInt(min) == 0 && parseInt(sec) == 0) {
                    window.clearInterval(idt);
                    alert('考试时间已到，试卷已提交，感谢您的使用！');
                }
            }
        </script>
    @endsection
@endsection
