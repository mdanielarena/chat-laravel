@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="" id='app1'>
                      <strong>Chat Room
                          <span class='badge'>@{{total_users.length}}</span>
                      </strong>
                      <chat-log :message='message'></chat-log>
                      <chat-composer v-on:messagesent='addmessage'></chat-composer>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
