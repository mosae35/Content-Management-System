@extends('layouts.app')

@section('content')

    <div class="col-lg-3">
        <div class="panel panel-info">
            <div class="panel panel-heading">
                Posts
            </div>
            <div class="panel panel-body">
                {{$posts}}
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="panel panel-danger">
            <div class="panel panel-heading">
                Trashed Posts
            </div>
            <div class="panel panel-body">
                {{$trashed}}
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel panel-heading">
                Users
            </div>
            <div class="panel panel-body">
                {{$users}}
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="panel panel-primary">
            <div class="panel panel-heading">
                Category
            </div>
            <div class="panel panel-body">
                {{$category}}
            </div>
        </div>
    </div>
@endsection

