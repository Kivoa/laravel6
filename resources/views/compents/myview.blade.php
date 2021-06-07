<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>myview</title>

    </head>
    <body>
        <h1>欢迎欢迎myview</h1>
        <p>
           欢迎 {{$name}}莅临指导

            {{$name}}今年{{$age}}岁         
        </p>
        @{{{888}}}
        {{{666}}}

       @if ($name)
            你好 {{$name}}。
        @else
            你是谁?
        @endif -->

        <ui>
            @foreach($people as $person)
                <li>{{$person}}</li>
            @endforeach
        </ui>
        
    </body>


</html>