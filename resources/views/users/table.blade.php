<table class="table table-responsive" id="users-table">
    <thead>
        <th>Nom d'utilisateur</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Fonction</th>
        <th>Status</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->name !!}</td>
            <td>{!! $user->email !!}</td>
            <td>{!! $user->phone !!}</td>
            <td><div class="label label-success" style="font-size: 13px">{!! $user->role !!}</div></td>
            <td>
                @if($user->is_enabled)
                    <div class="label label-success">En ligne</div>
                @else
                    <div class="label label-default">Hors ligne</div>
                @endif 
            </td>
            <td>
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <!-- <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                    <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i> Modifier</a>
                    {!! Form::button('<i class="glyphicon glyphicon-remove"></i> Effacer', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Êtes vous vraiment sur?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>