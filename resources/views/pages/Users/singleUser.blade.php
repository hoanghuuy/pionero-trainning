@extends('layouts.app')

@section('title', 'User Information')

@section('content')
    <div id="user-list-page" class="page">
      {{-- breadcrumb --}}
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="/users">User List</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Information</li>
          </ol>
        </nav>

      {{-- page title --}}
        <div class="title-page d-flex justify-content-between">
            <h1 class="title">User Information</h1>
            <div class="sub-action">
                <button type="button" class="btn btn-secondary">
                  <a href="#">Edit user</a>
                </button>
            </div>
        </div>

        {{-- page content --}}
        <div class="content-page">
          <div class="user-information mt-5">
            <div class="mb-3 row">
              <div class="col-sm-3 fs-4 fw-bold">Name</div>
              <div class="col-sm-5 fs-4">
                {{ $user->name }}
              </div>
            </div>

            <div class="mb-3 row">
              <div class="col-sm-3 fs-4 fw-bold">Email address</div>
              <div class="col-sm-5 fs-4">
                {{ $user->email }}
              </div>
              </div>
            </div>

            <div class="mb-3 row">
              <div class="col-sm-3 fs-4 fw-bold">Phone number</div>
              <div class="col-sm-5 fs-4">
                {{ $user->phoneNumber }}
              </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection