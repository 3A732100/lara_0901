@extends('admin.layouts.master')

@section('title', '文章管理')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                文章管理 <small>所有文章列表</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 文章管理
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row" style="margin-bottom: 20px; text-align: right">
        <div class="col-lg-12">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-success">建立新文章</a>
            @foreach($posts as $post)
                <table class="table table-bordered table-hover">
                    <form action="admin.posts" method="POST">
                        @csrf
                        @method('POST')
                        <tr>
                            <th width="100" style="text-align: center">#</th>
                            <th>標題</th>
                            <th width="100" style="text-align: center">精選？</th>
                            <th width="100" style="text-align: center">功能</th>
                        </tr>
                        <tr>
                            <td width="100" style="text-align:center">{{$post->id}}</td>
                            <td width="100" style="text-align:center">{{$post->title}}</td>
                            <td width="100" style="text-align:center">{{($post->is_feature)?'v':'x'}}</td>
                            <td style="text-align:center">
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.posts.edit', $post->id) }}">編輯</a>
                                /
                    </form>
                    <form action="{{ route('admin.posts.destroy', $post->id)}}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">刪除</button>
                    </form>
                    </td>
                    </tr>

                </table>
            @endforeach
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                //<table class="table table-bordered table-hover">
                    //<thead>

                    <tr>
                        <th width="30" style="text-align: center">#</th>
                        <th>標題</th>
                        <th width="70" style="text-align: center">精選？</th>
                        <th width="100" style="text-align: center">功能</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(range(1, 20) as $id)
                        <tr>
                            <td style="text-align: center">{{ $id }}</td>
                            <td>文章標題</td>
                            <td style="text-align: center">V</td>
                            <td>
                                <a href="{{ route('admin.posts.edit', $post->id) }}">編輯</a>
                                /
                                <a href="#">刪除</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection
