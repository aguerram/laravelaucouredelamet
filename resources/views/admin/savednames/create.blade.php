@extends('admin.layout.admin')
@push('membres') active @endpush
@section('content')
    <div class="row">
        <div class="col">
            <h2>Ajouter nouveau nom</h2>
            <div class="row justify-content-center">
                <form action="/admin/membername" method="post" class="col-12 col-md-6">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Nom</label>
                                <input type="text"
                                       class="form-control" name="nom" value="{{old('nom')}}" aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">Prénom</label>
                                <input type="text"
                                       class="form-control" name="prenom" value="{{old('prenom')}}" aria-describedby="helpId" placeholder="">
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