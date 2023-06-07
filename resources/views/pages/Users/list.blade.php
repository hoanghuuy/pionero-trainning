@extends('layouts.app')

@section('content')
    <div id="user-list-page" class="page">
        <div class="title-page d-flex justify-content-between">
            <h1 class="title">User List</h1>
            <div class="sub-action">
                <button type="button" class="btn btn-secondary">
                  <a href="/users/add">Add user</a>
                </button>
            </div>
        </div>

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
                    <button type="button" class="btn btn-warning">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
@endsection