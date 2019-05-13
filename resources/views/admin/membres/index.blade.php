@extends('admin.layout.admin')
@push('membres') active @endpush
@section('content')
    <div class="row">
        <h2>Géstion des comptes</h2>
        <table class="table table-striped mt-4">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Créé à</th>
                <th>Etat actuel</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th>{{$user->id}}</th>
                    <td>{{substr($user->name,0,strpos($user->name,' '))}}</td>
                    <td>{{substr($user->name,strpos($user->name,' '))}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->active===1?'Activé':'Désactivé'}}</td>

                    <td class="row">
                        @if($user->active === 0)
                            <form method="post" action="{{route('admin.toggle.active',['user'=>$user->id])}}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Activer</button>
                            </form>

                        @else
                            <form method="post" action="{{route('admin.toggle.active',['user'=>$user->id])}}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Désactiver</button>
                            </form>

                        @endif

                        &nbsp;<div class="dropdown open">
                            <button class="btn btn-danger dropdown-toggle btn-sm" type="button" id="triggerId"
                                    data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                <i class="fa fa-trash"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                <form method="post" action="/admin/member/{{$user->id}}">
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
@endsection