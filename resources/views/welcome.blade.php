<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ChatGPT Laravel</title>
    <link rel="stylesheet" href="{{url('css/styles.css')}}">
</head>
<body>
    <div class="chat">
        <!-- Header -->
        <div class="author">
            <p>Author: B Thejesswini</p>
        </div>

        <!-- Chat Area -->
        <div class="message">    
            <h2>Chat with ChatGPT here!</h2>
        </div>

        <!-- Form -->
        <div class="bottom">
            <form action="/ask" method="GET">
                @csrf
                <input type="text" placeholder="Type your query" id="message" name="message" required>
                <button type="submit">Submit</button>
            </form>
        </div>

        <!-- Display ChatGPT Response -->
        @if(isset($formattedResponse))
            <div class="response">
                <h4>ChatGPT Response:</h4>
                <div>{!! $formattedResponse !!}</div>
            </div>
        @endif
    </div>
</body>
</html>
