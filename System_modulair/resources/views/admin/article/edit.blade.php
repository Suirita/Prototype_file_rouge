@extends('layouts.admin')
    @section('content')
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Ajouter un Article</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('article.update',$article)}}" method="POST">
                @csrf <!-- Pour la sécurité CSRF -->
                @method('put')
                <div class="card-body">
                    <!-- Champ Titre -->
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $article->title }}" id="title" placeholder="Entrez le titre">
                    </div>
                    <!-- Champ Description -->
                    <div class="form-group">
                        <label for="description">Content</label>
                        <textarea name="content" class="form-control"  id="description" rows="3" placeholder="Entrez la description">{{ $article->content }}</textarea>
                    </div>

                    <!-- Champ Catégorie -->
                    <div class="form-group">
                        <label for="category">Catégorie</label>
                        <select name="category" class="form-control" id="category">

                            @foreach ($categories as $category)
                                <option value="{{$category->id}}"
                                    @selected($category->id == $article->category_id)
                                >{{$category->name}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mt-5">
                        <label for="tags" class="form-label">Sélectionnez les tags :</label>
                        <select id="tags" name="tags[]" class="form-select" multiple>
                            @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}"
                            @selected($article->tags->contains($tag->id))>{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    @endsection
