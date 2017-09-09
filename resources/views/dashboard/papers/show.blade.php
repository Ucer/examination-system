@extends('layouts.dashboard')
@section('title','题目预览')
@section('style')
@endsection


@section('content')
    @if($info->type == 'judge')
    <div class="container" >
        <div class="row">
            <div class="clo-xs-1">
                <h4>题目预览</h4>
                <span class="pull-leftt close1" >×</span>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-1">
                <input type="button" class="btn btn-default btn-xs co-gray pull-right" value="{{ $info->value }} 分" disabled />
            </div>
            <div class="col-xs-11">
                <p>{!!  $info->name !!}</p>
                <hr class="dash">
                <p>
                    <label class="radio-inline">
                        <input type="radio" name="answer" value="1"> 正确&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="answer" value="1"> 错误&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </label>
                <p/>

                <p></p>
                <p class="ph10">正确答案：<span class="co-green">
                        @if($info->answer === 'true') 正确 @else 错误 @endif
                    </span></p>
                <div class="alert alert-success" role="alert">{!! $info->description !!}</div>
                <br />
                <br />
                <hr>
            </div>
        </div>
    </div>
    @elseif(in_array($info->type,['radio','multiselect','select']))
        <div class="container" >
            <div class="row">
                <div class="clo-xs-1">
                    <h4>题目预览</h4>
                    <span class="pull-leftt close1" >×</span>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1">
                    <input type="button" class="btn btn-default btn-xs co-gray pull-right" value="{{ $info->value }} 分" disabled />
                </div>
                <div class="col-xs-11">
                    <p>{!! $info->name !!}</p>
                    <hr class="dash">
                    <br />
                    @foreach($list as $v)
                    <p>{{ $v->name }}.&nbsp;&nbsp;{{ $v->description }}</p>
                    @endforeach
                    <hr class="dash">
                    <p>
                        @foreach($list as $v)
                        <label class="radio-inline">
                            <input type="radio" name="answer" value="1"> {{ $v->name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </label>
                    @endforeach

                    <p/>

                    <p class="ph10">正确答案：<span class="co-green">{{ $info->answer }}</span></p>
                    <div class="alert alert-success" role="alert">{!! $info->description !!}</div>
                    <br />
                    <br />
                    <hr>

                </div>
            </div>
        </div>
    @elseif($info->type == 'field'))
    <div class="container">
        <div class="row">
            <div class="clo-xs-1">
                <h4>题目预览</h4>
                <span class="pull-right close1">×</span>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-1">
                <input type="button" class="btn btn-default btn-xs co-gray pull-right" value="{{ $info->value }}分" disabled />
            </div>
            <div class="col-xs-11">
                <p>{!! $info->name !!}</p>
                <hr class="dash">
                <input type="text" name="answer" class="form-control" placeholder="填空（1）答案，请填在这里">
                <br />
                <p class="ph10">正确答案：<span class="co-green">{{ $info->answer }}</span></p>
                <h5>解析：</h5>
                <div class="alert alert-success" role="alert">{!! $info->description !!}</div>
                <br />
                <br />
                <hr>

            </div>
        </div>
    </div>
        @else
        <div class="container" >
            <div class="row">
                <div class="clo-xs-1">
                    <h4>题目预览</h4>
                    <span class="pull-right close1" >×</span>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1">
                    <input type="button" class="btn btn-default btn-xs co-gray pull-right" value="{{ $info->value }}分" disabled />
                </div>
                <div class="col-xs-11">
                    <p>{!! $info->name !!}</p>
                    <hr class="dash">
                    <input type="text" name="answer" class="form-control h80">
                    <br />
                    <p>参考答案：</p>
                    <div class="pl30">
                        {!! $info->answer !!}
                    </div>
                    <h5>解析：</h5>
                    <div class="alert alert-success" role="alert">{!! $info->description !!}</div>
                    <br />
                    <br />
                    <hr>

                </div>
            </div>
        </div>
    @endif
@endsection
