@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">All tags</div>

        <div class="panel-body">
            <table class=" table-bordered table table-responsive text-center">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    @if(count($tags) != 0)
                    <tr>
                        <td>{{$tag->tag}}</td>
                        <td><a href="{{url('tags/'.$tag->id.'/edit')}}" class="btn btn-primary btn btn-xs">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </a></td>
                        <td><a href="{{url('tags/'.$tag->id.'/destroy')}}" class="btn btn-danger btn btn-xs">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a></td>
                    </tr>
                        @else
                        <tr>
                            No Tags To Show...
                        </tr>
                    @endif

                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection