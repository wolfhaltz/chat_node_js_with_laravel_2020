@extends('layouts.default')
@section('content')


<div style="padding-bottom: 0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="m-5">

                    <div class="m-2">
                        <h3>Chats ativos</h3>

                        <ul>
                            <li><a href="{{ URL::action('ChatController@show', $user->id ) }}">Inbox</a></li>
                            <li>Arquivo</li>
                        </ul>

                    </div>

                </div>
            </div>

            <div class="col-md-8 p-4" style="background-color: #e2e2e2; border-top-right-radius: 12px">
                <div>
                    {{ $user->name }}
                </div>

                <div style=" overflow-y: auto;" >
                    @foreach($messages as $message)
                    <div style="display: flex;">
                        <span class="span_img">
                            <img class="user_image" src="{{ asset('images/user2-160x160.jpg') }}">
                        </span>


                        <div class="message">
                            <p>
                                {{ $message->message }}
                                <br>
                                <span class="time_send">
                                    <b style="color:gray">
                                        {{ $message->user->name }} -  -->{{ $message->created_at }}
                                    </b>
                                </span>
                            </p>
                        </div>

                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>

 @endsection
