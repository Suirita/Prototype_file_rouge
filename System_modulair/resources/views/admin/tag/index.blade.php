@extends('layouts.admin')
    @section('content')
        <!-- Content Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Liste des tags</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{Route('dashboard')}}">Accueil</a></li>
                            <li class="breadcrumb-item active">tags</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row mb-2 justify-content-end">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ Route('tag.create') }}" class="btn btn-primary btn-sm p-2 text-white"><i class="fas fa-plus"></i> Ajouter tag</a>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Table des tag</h3>
                    </div>
                    <!-- /.card-header -->
                    @if($tags->isEmpty())
                        <p class="p-5 text-center">aucun article trouvé.</p>
                    @else
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>slug</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td>{{ $tag->name }}</td>
                                        <td>{{ $tag->slug }}</td>
                                        <td>{{ $tag->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <a href="{{ Route('tag.edit',$tag) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> </a>
                                            <form action="{{ Route('tag.destroy',$tag) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onclick="confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </button>
                                            </form>
                                            <a href="{{ Route('tag.show',$tag) }}" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i> </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    @endif
                    <!-- /.card-body -->
                </div>
                <div>
                </div>
                <!-- /.card -->
            </div>
            {{ $tags->links('pagination::bootstrap-5') }}
        </section>
    @endsection
