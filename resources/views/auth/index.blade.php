@extends('layouts.app')

@section('title', 'Register')

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
        <h1 class="h2 fw-normal text-center mt-5"><br>Register</h1>
        <h5 class="h5 fw-normal text-center mt-2">Create your free account now and enter a world of privileges!</h5>

        <div class="card mb-5">
            <div class="row justify-content-center">
                <div class="col-8">
                <form method="post" action="/register">
            @csrf

            <div class="mb-3 mt-4">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" name="name"
             value="{{old('name') }}">
            @error('name')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">{{$message }}</div>
            @enderror
            </div>

            <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="" name="email"
             value="{{old('email') }}">
            @error('email')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">{{$message }}</div>
            @enderror
            </div>

            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="" name="password"
             value="{{old('password') }}">
            @error('password')
            <div id="validationServerpasswordFeedback" class="invalid-feedback">{{$message }}</div>
            @enderror
            </div>


            <div class="mb-3">
            <label for="alamat" class="form-label">Jabatan</label>
            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" placeholder="" name="jabatan"
             value="{{old('jabatan') }}">
            @error('jabatan')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">{{$message }}</div>
            @enderror
            </div>



            <div class="form-group">
            <label for="exampleFormControlSelect1">Level</label>
            <select name="level" class="form-control" id="exampleFormControlSelect1">
            <option value="">- Select -</option>
            <!-- <option value="admin">Admin</option> -->
            <option value="user">User</option>
            <!-- <option value="superadmin">SuperAdmin</option> -->
            </select>
            </div>


            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
            <small class="d-block text-center mt-3 mb-2">Already Registered? <a href="/login">Login<a></small>

        </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection
