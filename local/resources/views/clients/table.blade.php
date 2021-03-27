<table class="table table-responsive" id="clients-table">
    <thead>
        <tr>
            <th>Nom et prénoms</th>
            <th>Cni</th>
            <th>Passport</th>
            <th>Permis de conduire</th>
            
            <th>Contact 1</th>
            <th>Contact 2</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clients as $client)
        <tr>
            <td>{!! $client->fullname !!}</td>
            <td>{!! $client->cni !!}</td>
            <td>{!! $client->passport !!}</td>
            <td>{!! $client->num_license !!}</td>
            
            <td>{!! $client->phone1 !!}</td>
            <td>{!! $client->phone2 !!}</td>
            <td>
                {!! Form::open(['route' => ['clients.destroy', $client->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <!-- <a href="{!! route('clients.show', [$client->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                    <a href="{!! route('clients.edit', [$client->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i>Modifier</a>
                    @if(Auth::user()->role=="gerant")
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i> supprimer', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endif
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
