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
                            <li class="breadcrumb-item active"><a href="{{Route('comment.index')}}">comments</a></li>
                            <li class="breadcrumb-item active">view</li>
                        </ol>
                    </div>
                </div>
            </div>
            
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    <h4>ID:</h4>
                    <p>{{ $comment->id }}</p>

                    <h4>Content:</h4>
                    <p>{{ $comment->content }}</p>
                    <h4>User ID:</h4>
                    <p>{{ $comment->user_id }}</p>

                    <h4>Created At:</h4>
                    <p>{{ $comment->created_at }}</p>


                </div>
            </div>
        </section>



    @endsection
