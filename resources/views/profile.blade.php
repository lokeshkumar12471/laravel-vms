@extends('dashboard')
@section('content')
    <h2 class="mt-3">Profile</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </nav>
    <div class="row mt-4">
        @if (session()->has('success'))
            <div class="alert alert-danger">{{ session()->get('success') }}</div>
        @endif
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Edit User</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.edit_validation') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label><b>User Name</b></label>
                            <input type="text" name="name" class="form-control" placeholder="Name"
                                value="{{ $data->name }}" />
                            @if ($errors->has('name'))
                                <span class="alert alert-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label><b>User Email</b></label>
                            <input type="text" name="email" placeholder="Email" value="{{ $data->email }}"
                                class="form-control" />
                            @if ($errors->has('email'))
                                <span class="alert alert-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label><b>Password</b></label>
                            <div type="password" name="password" placeholder="Password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group -mb-3">
                            <input type="submit" value="Edit" class="btn btn-primaryx">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
