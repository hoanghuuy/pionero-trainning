@extends('layouts.app')

@section('content')
    <div class="add-user-page">
        <div class="title-page">
            <h1>Add Users</h1>
        </div>

        <div class="content-page">
            <form method="POST" action="/users/add">
                @csrf
                <div class="mb-3">
                    <label for="inputName" class="form-label">Your name</label>
                    <input type="text" class="form-control" id="inputName" name="name" placeholder="Enter name...">
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Enter email...">
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Enter password...">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection