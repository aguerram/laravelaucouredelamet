@extends('admin.layout.admin')
@push('proprojects') active @endpush
@section('content')
    <div class="row">
        <div class="col">
            <h2>Liste des projets professionnels</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Par</th>
                    <th>Date debut</th>
                    <th>Date de fin</th>
                    <th>Image</th>
                    <th style="width: 92px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sb as $s)
                    <tr>
                        <th>{{$s->id}}</th>
                        <td>{{$s->title}}</td>
                        <th>{{$s->user->name}}</th>
                        <td>
                            <small>{{$s->start_date}}</small>
                        </td>
                        <td>
                            <small>{{$s->end_date}}</small>
                        </td>
                        <td>
                            @if(count($s->images)>0)
                                <img width="200px" src="{{asset('storage/'.$s->images[0]->link)}}">
                            @endif
                        </td>
                        <td class="row">
                            <a href="/admin/{{Request::segment(2)}}/{{$s->id}}" title="Modifier" class="btn btn-warning btn-sm"><i
                                        class="fa fa-eye"></i></a>
                            <a href="/admin/{{Request::segment(2)}}/{{$s->id}}/edit" title="Modifier" class="btn btn-success btn-sm"><i
                                    class="fa fa-pencil"></i></a>
                            &nbsp;<div class="dropdown open">
                                <button class="btn btn-danger dropdown-toggle btn-sm" type="button" id="triggerId"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="triggerId">
                                    <form method="post" action="/admin/{{Request::segment(2)}}/{{$s->id}}">
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
        </div>
    </div>
@endsection