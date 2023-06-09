@extends('layouts.app')

@section('title', 'Edit user')

@section('content')
    <div class="add-user-page">
        {{-- breadcrumb --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/users">User List</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
          </nav>

        {{-- page title --}}
        <div class="title-page">
            <h1>Edit</h1>
        </div>

        {{-- page content --}}
        <div class="content-page">
            <form method="POST" action="/users/{{ $user->id }}">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="inputName" class="form-label">Name</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="inputName" 
                        name="name" 
                        placeholder="Enter name..."
                        value="{{ $user->name }}"
                    >
                </div>
                
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input 
                        type="email" 
                        class="form-control" 
                        id="inputEmail" 
                        name="email" 
                        placeholder="Enter email..."
                        value="{{ $user->email }}"
                    >
                </div>

                <div class="mb-3">
                    <label for="inputPhone" class="form-label">Phone number</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="inputPhone" 
                        name="phoneNumber" 
                        placeholder="Enter phone number..."
                        value="{{ $user->phoneNumber }}"
                    >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection