@extends('layouts.admin')
    @section('content')
        <!-- Content Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Détail</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{Route('dashboard')}}">Accueil</a></li>
                            <li class="breadcrumb-item active"><a href="{{Route('user.index')}}">user</a></li>
                            <li class="breadcrumb-item active">view</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row mb-2 justify-content-end">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ Route('user.edit',$user) }}" class="btn btn-primary btn-sm p-2 text-white"><i class="fas fa-edit mr-2"></i>Modifier</a>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    <h4>id : </h4>
                    <p>{{ $user->id }}</p>
                    <h4>name : </h4>
                    <p>{{ $user->name }}</p>
                    <h4>Email : </h4>
                    <p>{{ $user->email }}</p>
                    <h4>Role : </h4>
                    <p>{{ $user->getRoleNames()->first()}}</p>
                    <h4>Permission : </h4>
                    <div class="container mt-4 d-flex align-items-center">
                        @foreach($permissions as $permission)
                        <p class="me-3" >{{$permission->name;}} ,</p>
                        @endforeach
                    </div>
                    <h4>created at : </h4>
                    <p>{{ $user->created_at }}</p>
                    

                </div>
            </div>
        </section>
    @endsection
