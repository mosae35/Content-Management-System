@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Update This Post</div>

        <div class="panel-body">
            {!! Form::model($data,['route'=>['profile.update',$data->id],'method'=>'patch' ,'files'=>'true']) !!}
            <div class="form-group">
                <label for="tilte" > Name </label>
                {!! Form::text('name',$user->name,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="tilte" > Email </label>
                {!! Form::email('email',$user->email,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="tilte" > New Password </label>
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="tilte" > Image </label>
                {!! Form::file('avatar',['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="tilte" > Fasebook </label>
                {!! Form::text('facebook',$data->facebook,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                <label for="Content" > Youtube </label>
                {!! Form::text('youtube',$data->youtube,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                <label for="tilte" > About You : </label>
                {!! Form::textarea('about',$data->about,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        Update Post
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection