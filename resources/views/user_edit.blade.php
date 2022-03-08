@extends('main')

@section('content')
    
<div class="section-header">
    <h1>Edit User</h1>
</div>

<div class="row d-flex align-items-center justify-content-center">
    <div class="col-6 p-4 bg-white">
        <h4 class="text-center mb-4">Data User</h4>

        <form action="" method="post">
            @csrf

            <input type="hidden" name="id" value="{{$user->id}}">

            <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}" readonly required>
                </div>
            </div>

            @if(session('email_ada'))
                <div class="alert alert-danger" role="alert">
                    {{ session('email_ada') }}
                </div>
            @endif
            @error('email')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" required>
                </div>
            </div>

            @error('nama')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{$user->name}}" required>
                </div>
            </div>
            
            @error('telepon')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @enderror
            <div class="form-group row">
                <label for="telepon" class="col-sm-3 col-form-label">Telepon</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="telepon" name="telepon" value="{{$user->telepon}}" required>
                </div>
            </div>

            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-3 pt-0">Role</legend>
                    <div class="col-sm-9">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="role1" value="admin" {{$user->role=='admin'?'checked' : ''}} required>
                            <label class="form-check-label" for="role1">
                                Admin
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="role2" value="reseller" {{$user->role=='reseller'?'checked' : ''}}>
                            <label class="form-check-label" for="role2">
                                Reseller
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="role" id="role3" value="db" {{$user->role=='db'?'checked' : ''}}>
                            <label class="form-check-label" for="role3">
                                Distributor
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>

            @error('password')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @enderror
            <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label">New Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password" placeholder="password...">
                </div>
            </div>

            <div class="form-group row">
                <label for="password_confirmation" class="col-sm-3 col-form-label">Ulangi Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="password lagi...">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-danger" href="{{ url()->previous() }}">Kembali</a>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection