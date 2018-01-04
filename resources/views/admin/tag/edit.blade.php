@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Edit Tag</div>

        <div class="panel-body">
            {!! Form::model($tag,['route'=>['tags.update',$tag->id],'method'=>'PATCH']) !!}
            <div class="form-group">
                <label for="tilte" > tag </label>
                {!! Form::text('tag',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        update Tag
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection