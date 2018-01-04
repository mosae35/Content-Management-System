@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">All Users</div>

        <div class="panel-body">
            <table class=" table-bordered table table-responsive text-center">
                <thead>
                <tr>
                    <th>name</th>
                    <th>Email</th>
                    <th>Permisions</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if($user->admin == 1)
                                <a href="{{url('remove_admin/'.$user->id)}}" class="btn- btn-xs btn-danger">  Remove-Permision </a>
                            @else
                                <a href="{{url('make_admin/'.$user->id)}}" class="btn- btn-xs btn-primary"> Make-Admin  </a>
                        </td>
                        @endif
                        <td><a href="{{url('user/delete/'.$user->id)}}" class="btn btn-xs btn-danger"> Delete  </a></td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection