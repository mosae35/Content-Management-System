@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Create New Category</div>

        <div class="panel-body">
            {!! Form::open(['route'=>'category.store','method'=>'post']) !!}
            <div class="form-group">
                <label for="tilte" > Name </label>
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        Store Category
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection