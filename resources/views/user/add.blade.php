@extends('layouts.master')
@section('content')



            <div class="row">

               <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">文章发布</h3></div>
                        <div class="panel-body">
                            <form class="form-horizontal m-t-10 p-20 p-b-0" action="{{url('/curd')}}" method="post">
                            <div class="row">
                                @include('public.errors')
                                {{csrf_field()}}
                                <input type="hidden" name="email" value="{{Session::get('user')->email}}">
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">文章分类</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="category">
                                                <option>PHP</option>
                                                <option>mysql</option>
                                                <option>Linux</option>
                                                <option>Java</option>
                                                <option>node</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">标题</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title" value="">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-10">
                                   内容： <textarea class="wysihtml5 form-control" name="content" rows="9"></textarea>
                                </div>

                            </div>
                            <div class="col-sm-2">
                                    <button type="submit" class="btn-success">发布</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            {{--</div> <!-- End row -->--}}















        <!-- P
@endsection
{{-- AlertInfoEnd --}}
