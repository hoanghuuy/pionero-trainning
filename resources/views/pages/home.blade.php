@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div id="home-page" class="page row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Actions</div>

                <div class="card-body content">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Users
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="/users">List</a></li>
                          <li><a class="dropdown-item" href="/users/add">Add an user</a></li>
                        </ul>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection
