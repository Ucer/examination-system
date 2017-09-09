@extends('layouts.dashboard')
@section('title','首页')
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
                        <th>题干</th>
                        <th>题型</th>
                        <th>正确答案</th>
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
                        <td>{!! $v->answer !!}</td>
                        <td>{{ $v->updated_at }}</td>
                        <td><a href="" class="btn btn-default">试题预览</a></td>
                    </tr>
                    @empty
                        <div class="ui feed no-messages">
                            <a class="text-center alert alert-info">!
                                (=￣ω￣=) ··· 还没有数据噢。
                            </a>
                        </div>
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
                <h4 class="m5">搜索试题</h4>
            </div>
        </div>

        <div class="row">
            <div class="search_list col-xs-12">
                <dl>
                    <dt><span class="sjb"></span>&nbsp;试题题干</dt>
                    <dd>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control">
                            <span class="input-group-btn">
                                    <button class="btn btn-default"><span
                                                class="glyphicon glyphicon-search"></span></button>
                                </span>
                        </div>
                    </dd>
                </dl>
                <dl>
                    <dt><span class="sjb"></span>&nbsp;试题类型</dt>
                    <dd>
                        <a href="#">单选题</a>
                        <a href="#">多选题</a>
                        <a href="#">不定项选择题</a>
                        <a href="#">填空题</a>
                        <a href="#">问答题</a>
                        <a href="#">材料题</a>
                        <a href="#">材料题</a>
                    </dd>
                </dl>
                <dl>
                    <dt><span class=""></span>&nbsp;试题类型</dt>
                    <dd class="dis_n">
                        <a href="#">单选题</a>
                        <a href="#">多选题</a>
                        <a href="#">不定项选择题</a>
                        <a href="#">填空题</a>
                        <a href="#">问答题</a>
                        <a href="#">材料题</a>
                        <a href="#">材料题</a>
                    </dd>
                </dl>
                <dl>
                    <dt><span class=""></span>&nbsp;试题类型</dt>
                    <dd class="dis_n">
                        <a href="#">单选题</a>
                        <a href="#">多选题</a>
                        <a href="#">不定项选择题</a>
                        <a href="#">填空题</a>
                        <a href="#">问答题</a>
                        <a href="#">材料题</a>
                        <a href="#">材料题</a>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
    </div>
@section('script')
@endsection
@endsection

