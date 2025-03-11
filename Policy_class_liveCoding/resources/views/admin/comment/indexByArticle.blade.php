@extends('layouts.admin')
    @section('content')
        <!-- Content Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Liste des Commentaires d' article <b>{{$article->title}}</b></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active">Commentaires</li>
                        </ol>
                    </div>
                </div>
            </div>
            {{-- <div class="container-fluid">
                <div class="row mb-2 justify-content-end">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ Route('article.create') }}" class="btn btn-primary btn-sm p-2 text-white"><i class="fas fa-plus"></i> Ajouter article</a>
                        </ol>
                    </div>
                </div>
            </div> --}}
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Table des Commentaires</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Commentaire</th>
                                    <th>Auteur</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->id }}</td>
                                        <td>{{ $comment->content }}</td>
                                        <td>{{ $comment->user->name }}</td>
                                        <td>{{ $comment->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <a href="{{ route('comment.show', $comment) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <form action="{{ route('comment.destroyByArticle', $comment) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </section>
    @endsection
