<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
        <div class="user">

          @if (count($users) === 1)
            <h1>User Information</h1>
          @elseif (count($users) > 1)
            <h1>User Information List</h1>
          @endif
            
            @foreach ($users as $user)
            <div class="single-user-infor">
              <ul>
                <li>Name: {{ $user->name }}</li>
                <li>Email: {{ $user->email }}</li>
                <li>Phone number: {{ $user->phoneNumber }}</li>
              </ul>
            </div>
            @endforeach
        </div>

    </body>
</html>
