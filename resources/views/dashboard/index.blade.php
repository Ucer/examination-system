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
                        <th>最后更新日期</th>
                        <th style="width:200px;">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>这里是题干</td>
                        <td>这里是题型</td>
                        <td>2016-08-16</td>
                        <td><a href="#" class="btn btn-default">修改</a><a href="#" class="btn btn-default">修改</a><a
                                    href="#" class="btn btn-default">修改</a></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>这里是题干</td>
                        <td>这里是题型</td>
                        <td>2016-08-16</td>
                        <td><a href="#" class="btn btn-default">修改</a><a href="#" class="btn btn-default">修改</a><a
                                    href="#" class="btn btn-default">修改</a></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>这里是题干</td>
                        <td>这里是题型</td>
                        <td>2016-08-16</td>
                        <td><a href="#" class="btn btn-default">修改</a><a href="#" class="btn btn-default">修改</a><a
                                    href="#" class="btn btn-default">修改</a></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>这里是题干</td>
                        <td>这里是题型</td>
                        <td>2016-08-16</td>
                        <td><a href="#" class="btn btn-default">修改</a><a href="#" class="btn btn-default">修改</a><a
                                    href="#" class="btn btn-default">修改</a></td>
                    </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-xs-2 mh20">

                        <div class="input-group">

                            <span class="input-group-addon">每页显示</span>
                            <select name="" id="" class="form-control">
                                <option value="0">20</option>
                                <option value="0">10</option>
                                <option value="0">20</option>
                                <option value="0">30</option>
                            </select>
                            <span class="input-group-addon">条</span>

                        </div>
                    </div>

                    <div class="col-xs-10">
                        <nav class="pull-right">
                            <ul class="pagination">
                                <li><a href="#">&laquo;</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">&raquo;</a></li>
                            </ul>
                        </nav>
                    </div>
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

