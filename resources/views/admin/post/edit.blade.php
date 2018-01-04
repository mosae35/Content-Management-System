@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Update This Post</div>

        <div class="panel-body">
            {!! Form::model($post,['route'=>['posts.update',$post->id],'method'=>'patch' ,'files'=>'true']) !!}
            <div class="form-group">
                <label for="tilte" > Title </label>
                {!! Form::text('title',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="tilte" > Title </label>
                {!! Form::file('image',['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="tilte" >Select Category Type</label>
                {!! Form::select('category_id',$category,null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                <label for="tilte" >Select Tags </label>
                <br>
                @foreach($tags as $tag)

                    <label>
                        <input type="checkbox" name="tags[]" value="{{$tag->id}}"
                               @foreach($post->tags as $it)
                               @if($tag->id == $it->id)
                                   checked
                                   @endif
                                @endforeach
                        >{{$tag->tag}}
                    </label>
                    <span> - </span>
                @endforeach
            </div>

            <div class="form-group">
                <label for="Content" > Content </label>
                {!! Form::textarea('content',null,['class'=>'form-control']) !!}
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