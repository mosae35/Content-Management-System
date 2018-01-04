@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Create New Category</div>

        <div class="panel-body">
            <table class=" table-bordered table table-responsive text-center">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{$category->name}}</td>
                    <td>{{$category->created_at}}</td>
                    <td><a href="{{url('category/'.$category->id.'/edit')}}" class="btn btn-primary btn-xs">
                            <i class="fa fa-edit" aria-hidden="true"></i>
                        </a></td>
                    <td><a href="{{url('category/'.$category->id.'/destroy')}}" class=" btn btn-danger btn-xs">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a></td>
                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection