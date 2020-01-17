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
                            <li>Inbox</li>
                            <li><a href="{{ URL::action('ChatController@historic', $user->id ) }}">Arquivo</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8 p-4" style="background-color: #e2e2e2; border-top-right-radius: 12px">
                <div>
                    {{ $user->name }}
                </div>

                <div style=" overflow-y: auto;">
                    <div style="display: flex;">
                        <span class="span_img">
                            <img class="user_image" src="{{ asset('images/user2-160x160.jpg') }}">
                        </span>
                        <div class="messages"></div>
                    </div>
                </div>

            <!-- THERE IS A @CSRF PROBLEM HERE, NEED TO FIX IT :) -->
                <form id="chat">
                    <input type="text" name="message" placeholder="Type your message"  id="message" class="col-md-8" />
                    <button type="submit" id="send_message" class="btn btn-primary col-md-3">Send message</button>
                </form>

            </div>
        </div>
    </div>
</div>

 @endsection


 @section('chat')

    <script>
     $(document).ready(function() {
        $('#send_message').click(function () {

            message = document.getElementById('message').value;

          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
          });
        console.log(message);

          $.ajax({
             type:'POST',
             url:'/chat/{{ $chat_id }}/send-message',
             data: { message:message },
             success:function(response){
                 // Log response
                 console.log(message);

              }
          });
        });
    });
    </script>


    <script type="text/javascript">

        var socket = io('http://127.0.0.1:3000/');

        function renderMessage(message){
            $('.messages').append('<div class="message"> <p>' + message.message + '<br> <span class="time_send"> <b style="color:gray"> <!-- current date here --></b> </span> </p> </div>');
        }

        socket.on('previousMessage', function(messages){
            for(message of messages)
            {
                renderMessage(message);
            }
        });

        socket.on('receivedMessage', function(message){
            renderMessage(message);
        });

        $('#chat').submit(function(e){
            event.preventDefault();

            var message = $('input[name=message]').val();

            if( message.length )
            {
                var messageObject = {
                    message: message,
                };

                renderMessage(messageObject);

                socket.emit('sendMessage', messageObject);
            }
        });
    </script>


@endsection
