@extends('admin.layout.admin')
@push('membres') active @endpush
@section('content')
    <div class="row">
        <button class="btn btn-primary"><i class="fa fa-plus"></i> Ajouter nouveau membre</button>

        <table class="table table-striped mt-4">
            <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
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
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->active===1?'Activé':'Désactivé'}}</td>

                    <td>
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
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection