@extends('admin.layout.admin')
@push('projects') active @endpush
@section('content')
    <div class="row">
        <div class="col">
            <h2>Gestion des projets</h2>
            <a href="/admin/project/create" class="btn btn-success">Ajouter un nouveau projet</a>
            <br>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th style="width: 200px">Titre</th>
                    <th>Date debut</th>
                    <th>Date de fin</th>
                    <th>Image</th>
                    <th style="width: 92px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($projects as $sn)
                    <tr>
                        <td>{{$sn->id}}</td>
                        <td class="text-justify">{{$sn->title}}</td>
                        <td><small>{{$sn->start_date}}</small></td>
                        <td><small>{{$sn->end_date}}</small></td>
                        <td>
                            @if(count($sn->images))
                                <img style="max-width: 200px" src="{{asset('storage/'.$sn->images->first()->link)}}">
                            @endif
                        </td>
                        <td class="row">
                            <a href="/admin/project/{{$sn->id}}/edit" title="Modifier" class="btn btn-warning btn-sm"><i
                                        class="fa fa-pencil"></i></a>
                            &nbsp;<div class="dropdown open">
                                <button class="btn btn-danger dropdown-toggle btn-sm" type="button" id="triggerId"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="triggerId">
                                    <form method="post" action="/admin/project/{{$sn->id}}">
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