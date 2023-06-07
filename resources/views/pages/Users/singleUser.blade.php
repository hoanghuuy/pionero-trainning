@extends('layouts.app')

@section('content')
    <div id="user-list-page" class="page">
        <div class="title-page d-flex justify-content-between">
            <h1 class="title">Single User</h1>
            <div class="sub-action">
                <button type="button" class="btn btn-secondary">
                  <a href="#">Edit user</a>
                </button>
            </div>
        </div>

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