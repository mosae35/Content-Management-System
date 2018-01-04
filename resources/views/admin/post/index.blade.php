@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">All Posts</div>

        <div class="panel-body">
            <table class=" table-bordered table table-responsive text-center">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Edit</th>
                    <th>Trash</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td> <img src="{{asset($post->image)}}" alt="{{$post->title}}" width="60px" height="35px"> </td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->content}}</td>
                        <td><a href="{{url('posts/'.$post->id.'/edit')}}" class="btn btn-primary btn btn-xs">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </a></td>
                        <td><a href="{{url('posts/'.$post->id.'/destroy')}}" class="btn btn-danger btn btn-xs">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection