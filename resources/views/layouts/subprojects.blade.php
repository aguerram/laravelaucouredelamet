<div class="card">
    <div class="card-header text-center text-dark"><b>Les sous-projets des membres</b></div>
    <div class="card-body">
        @if(isset($project))
            <a href="/subproject/add/{{$project->id}}" class="btn btn-primary btn-block"><i class="fa fa-pencil"></i>
                Ajouter un sous-projet</a>
        @endif
        @if(isset($project->subprojects))
            <ul class="mt-2 list-group">
                @foreach($project->subprojects as $sb)
                    @if($sb->user_id !== Auth::user()->id)
                        <a href="/subproject/{{$sb->id}}" class="list-group-item list-group-item-action">
                            <b>{{$sb->title}}</b>
                            <br>
                            <small><i class="fa fa-clock-o"></i> {{$sb->created_at}}</small>
                        </a>
                    @endif
                @endforeach
            </ul>

        @endif
    </div>

    <div class="card-header text-center text-dark"><b><i class="fa fa-user"></i> Mes sous-projets</b></div>
    <div class="card-body">
        @if(isset($project->subprojects))
            <ul class="mt-2 list-group">
                @foreach($project->subprojects as $sb)
                    @if($sb->user_id === Auth::user()->id)
                        <a href="/subproject/{{$sb->id}}" class="list-group-item list-group-item-action">
                            <b>{{$sb->title}}</b>
                            <br>
                            <small><i class="fa fa-clock-o"></i> {{$sb->created_at}}</small>
                        </a>
                        <div class="container">
                            <div class="row justify-content-between">
                                <a href="/subproject/{{$sb->id}}/edit" class="btn btn-secondary btn-sm"><i
                                            class="fa fa-pencil"></i></a>
                                <div class="dropdown open">
                                    <button class="btn btn-danger dropdown-toggle btn-sm" type="button" id="triggerId"
                                            data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="triggerId">
                                        <form method="post" action="/subproject/{{$sb->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item" href="#"><i class="fa fa-trash"></i> Confirmer
                                                la
                                                suppression
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    @endif
                @endforeach
            </ul>

        @endif
    </div>
</div>
