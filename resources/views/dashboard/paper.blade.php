@extends('layouts.dashboard')
@section('title','试卷库')
@section('style')
@endsection


@section('content')
    <div class="container-fluid hh ww" >
    <div class="frame_left col-xs-10">
        <div class="row">
            <div class="col-xs-12 pt20">
                <table class="table table-striped bb">
                    <thead>
                    <tr>
                        <th></th>
                        <th>名称</th>
                        <th>状态</th>
                        <th>题目统计</th>
                        <th>时间限制</th>
                        <th>最后更新日期</th>
                        <th style="width:200px;">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($list as $v)
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>{!! $v->name !!}</td>
                        <td>{{ $v->type }}</td>
                        <td>
                            @if($v->level === 1)
                                一般
                                @elseif($v->level == 2)
                                困难
                                @else
                                简单
                            @endif
                        </td>
                        <td>{!! $v->answer !!}</td>
                        <td>{{ $v->updated_at }}</td>
                        <td><a href="{{ route('topic.sh', ['id' => $v->id]) }}" class="btn btn-default">试题预览</a></td>
                    </tr>
                    @empty
                        <tr>
                            <td class="col-12 text-center" colspan="12">
                                (=￣ω￣=) ··· 还没有数据噢。
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="row">

                </div>
            </div>
            <script>

            </script>
        </div>
    </div>



    <div class="frame_right col-xs-2 bl">
        <div class="row head">
            <div class="col-xs-12  ph10">
                <h4 class="m5">搜索试卷</h4>
            </div>
        </div>

    </div>
    </div>
@section('script')
@endsection
@endsection

