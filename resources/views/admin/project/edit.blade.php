@extends('admin.layout.admin')
@push('projects') active @endpush
@section('content')
    <div class="row">
        <div class="col pb-5">
            <h2>Modifier projet</h2>
            <div class="row justify-content-center">
                <form action="/admin/project/{{$project->id}}" method="post" class="col-12 col-md-8" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Titre</label>
                                <input type="text"
                                       class="form-control" name="title" value="{{$project->title}}" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">Contenu</label>
                                <textarea class="form-control" name="content">{{$project->content}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Date de début</label>
                                <input type="date" name="start_date" value="{{$project->start_date}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Date de fin</label>
                                <input type="date" name="end_date" value="{{$project->end_date}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Ajouter</button>
                            </div>
                        </div>
                        @if(count($errors->all())>0)
                            <div class="card-footer">
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        <li>{{$err}}</li>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection