@extends('admin.layout.admin')
@push('comments') active @endpush
@section('content')
    <div class="row">
        <div class="col">
            <h2>Gestion des commentaires</h2>
            <table class="table table-striped mt-2">
                <thead>
                <tr>
                    <th>Ecrit par</th>
                    <th>Titre du projet</th>
                    <th>Contenu</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comment as $sn)
                    <tr>
                        <td>{{$sn->user->name}}</td>
                        <td>{{$sn->project->title}}</td>
                        <td>{{$sn->content}}</td>
                        <td class="row">
                            &nbsp;<div class="dropdown open">
                                <button class="btn btn-danger dropdown-toggle btn-sm" type="button" id="triggerId"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="triggerId">
                                    <form method="post" action="/admin/comments/{{$sn->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item" href="#"><i class="fa fa-trash"></i> Confirmer la
                                            suppression
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection