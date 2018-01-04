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
                    <th>Resore</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($trashe as $trash)
                    <tr>
                        <td> <img src="{{asset($trash->image)}}" alt="{{$trash->title}}" width="60px" height="35px"> </td>
                        <td>{{$trash->title}}</td>
                        <td>{{$trash->content}}</td>
                        <td><a href="{{url('post/restore/'.$trash->id)}}" class="btn btn-primary btn btn-xs"> Restore </a></td>
                        <td><a href="{{url('post/kill/'.$trash->id)}}" class="btn btn-danger btn btn-xs"> Delete </a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection