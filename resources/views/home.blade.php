@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Invite Link: <br><input type="text" style="width:600px" readonly value="http://t.me/test0202002_bot?start={{$user->invite_token}}"/>
                    
                </div>
                <div>

                

                </div>
            </div>
            <br>
            @if (count($invitedUsers))
            <div class="card">
                <div class="card-header">Invited users</div>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($invitedUsers as $iUser)
                        <tr>
                            <td>{{$iUser->name}}</td>
                            <td>{{$iUser->email}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
