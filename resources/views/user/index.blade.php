@extends('layouts.master')
@section('content')







    <div class="wraper container-fluid">
        <div class="page-title">
            <h3 class="title">列表</h3>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">博客列表</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>标题</th>
                                            <th>分类</th>
                                            <th>内容</th>
                                            <th>发布时间</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $v )
                                            <tr>
                                                <td>{{ $v->title }}</td>
                                                <td>{{ $v->category }}</td>
                                                <td>{{ $v->content }}</td>
                                                <td>{{ $v->published_at }}</td>
                                            </tr>
                                        @endforeach


                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">

                                    {!! $data->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End row -->
@endsection
{{-- AlertInfoEnd --}}






