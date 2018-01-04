@extends('layouts.app')


@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Create New Post</div>

        <div class="panel-body">
            {!! Form::open(['route'=>'posts.store','method'=>'post' ,'files'=>'true']) !!}
            <div class="form-group">
                <label for="tilte" > Title </label>
                {!! Form::text('title',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="tilte" > Title </label>
                {!! Form::file('image',['class'=>'form-control']) !!}
            </div>
            <div class="form-group" >
                <label for="tilte" >Select Category Type</label>
                {!! Form::select('category_id',$category,null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                <label for="tilte" >Select Tags </label>
                <br>
                @foreach($tags as $tag)

                    <label>
                    <input type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->tag}}
                    </label>
                    <span> - </span>
                    @endforeach
            </div>
            <div class="form-group" id="summernote">
                <label for="Content" > Content </label>
                {!! Form::textarea('content',null,['class'=>'form-control','id'=>'content']) !!}
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        Store Post
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection


@section('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    @endsection

@section('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
        <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>

@endsection

