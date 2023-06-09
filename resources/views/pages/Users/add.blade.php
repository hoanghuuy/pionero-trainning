@extends('layouts.app')

@section('title', 'Add user')

@section('content')
    <div class="add-user-page">
        {{-- breadcrumb --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/users">User List</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
          </nav>

        {{-- page title --}}
        <div class="title-page">
            <h1>Add User</h1>
        </div>

        {{-- page content --}}
        <div class="content-page">
            <form method="POST" action="/users">
                @csrf
                <div class="mb-3">
                    <label for="inputName" class="form-label">Name</label>
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