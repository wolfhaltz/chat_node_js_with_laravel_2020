<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="@bridgetocross, wolfhaltz">


<link rel="icon" href="images/favicon.ico">

<title>{{ config('app.name', 'Chat') }}</title>

<!-- JQUERY AND SCOKET.IO -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js" integrity="sha256-bQmrZe4yPnQrLTY+1gYylfNMBuGfnT/HKsCGX+9Xuqo=" crossorigin="anonymous"></script>


<!-- FONT AWESOME -->
<script src="https://kit.fontawesome.com/8615a8cad2.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


@yield('styles')
<style>
    .message{
        background-color:#ffffff;
        border-radius: 30px;
        padding: 20px;
        margin: 20px;
    }
    .message p{
        color: darkgray;
        font-size: 15px;
    }
    .user_image{
        border-radius: 50px;
        width: 50px;
        height: 50px;
    }
    .span_img{
        justify-content: end;
        display: flex;
        flex-direction: column-reverse;
        margin-bottom: 20px;
    }
    .time_send{
        float: right;
    }
</style>

@section('scripts')

<script src="https://kit.fontawesome.com/a076d05399.js"></script>


@stop
