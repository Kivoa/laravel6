<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>myview</title>

    </head>
    <body>
        <h1>欢迎欢迎</h1>
       

        <ui>
            @foreach($people as $person)
                <li>{{$person}}</li>
            @endforeach
        </ui>
        @for($i = 0; $i < 4; $i++)
            <h2>欢迎</h2>
        @endfor

        <!-- @while(true)
        @endwhile -->
    </body>


</html>