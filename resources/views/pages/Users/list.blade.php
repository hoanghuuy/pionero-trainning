@extends('layouts.app')

@section('title', 'User list')

@section('content')
    <div id="user-list-page" class="page">
      {{-- breadcrumb --}}
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">User List</li>
          </ol>
        </nav>

      {{-- page title --}}
        <div class="title-page d-flex justify-content-between">
            <h1 class="title">User List</h1>
            <div class="sub-action">
              <a href="/users/add">
                <button type="button" class="btn btn-secondary">
                  Add user
                </button>
              </a>
            </div>
        </div>

        {{-- page content --}}
        <div class="content-page">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone number</th>
                <th scope="col" class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $index => $user)
                <tr>
                  <th scope="row">{{ $index + 1 }}</th>
                  <td><a href="/users/{{ $user->id }}">{{ $user->name }}</a></td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->phoneNumber }}</td>
                  <td class="text-center">
                    <a href="/users/{{ $user->id }}/edit">
                      <button type="button" class="btn btn-warning">Edit</button>
                    </a>
                    <form class="d-inline-block" method="POST" action="/users/{{ $user->id }}/delete">
                      @csrf
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
@endsection