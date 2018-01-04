@extends('layouts.app')


@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Update Site Settings</div>

        <div class="panel-body">
            {!! Form::open(['url'=>'settings/update','method'=>'post']) !!}
            <div class="form-group">
                <label for="tilte" > Name </label>
                {!! Form::text('name',$data->name,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="tilte" > Address </label>
                {!! Form::text('address',$data->address,['class'=>'form-control']) !!}
            </div>
            <div class="form-group" >
                <label for="tilte" >Contact-Phone</label>
                {!! Form::text('phone',$data->phone,['class'=>'form-control']) !!}
            </div>
            <div class="form-group" id="summernote">
                <label for="Content" >Contact-Email </label>
                {!! Form::email('email',$data->email,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        Update Setting
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
