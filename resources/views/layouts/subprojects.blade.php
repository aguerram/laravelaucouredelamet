<div class="card">
    <div class="card-header text-center text-dark"><b>Les sous-projets</b></div>
    <div class="card-body">
        @if(isset($project))
            <a href="/subproject/add/{{$project->id}}" class="btn btn-primary btn-block"><i class="fa fa-pencil"></i>
                Ajouter un sous-projet</a>
        @endif
        @if(isset($project->subprojects))
            <ul class="mt-2 list-group">
                @foreach($project->subprojects as $sb)
                    <a href="/subproject" class="list-group-item list-group-item-action">
                        <b>{{$sb->title}}</b>
                        <br>
                        <small><i class="fa fa-clock-o"></i> {{$sb->created_at}}</small>
                    </a>
                @endforeach
            </ul>
        @endif
    </div>
</div>
