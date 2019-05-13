@extends('admin.layout.admin')
@push('membres') active @endpush
@section('content')
    <div class="row">
        <div class="col">
            <h2>List des noms disponibles</h2>
            <a href="/admin/membername/create" class="btn btn-success">Ajouter nouveau nom</a>
            <br>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Member</th>
                    <th>Disponible</th>
                    <th>Nom</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($snames as $sn)
                    <tr>
                        <td>{{$sn->id}}</td>
                        <td>{{$sn->user_id>0?$sn->user_id:'NaN'}}</td>
                        <td>
                            @if($sn->user_id>0)
                                <span class="badge badge-pill badge-danger">No</span>
                            @else
                                <span class="badge badge-pill badge-success">Oui</span>
                            @endif
                        </td>
                        <td>{{$sn->name}}</td>
                        <td class="row">
                            <a href="/admin/membername/{{$sn->id}}/edit" title="Modifier" class="btn btn-warning btn-sm"><i
                                        class="fa fa-pencil"></i></a>
                            &nbsp;<div class="dropdown open">
                                <button class="btn btn-danger dropdown-toggle btn-sm" type="button" id="triggerId"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="triggerId">
                                    <form method="post" action="/admin/membername/{{$sn->id}}">
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