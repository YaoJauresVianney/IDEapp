<table class="table table-responsive" id="complaints-table">
    <thead>
        <th>Lien avec le véhicule</th>
        <th>Marque</th>
        <th>Immatriculation</th>
        <th>Date enlèvement</th>
        <th>Lieu enlèvement</th>
        <th>Motifs</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($complaints as $complaint)
        <tr>
            <td>{!! $complaint->vehicle_rights !!}</td>
            <td>{!! $complaint->brand !!}</td>
            <td><a href="{!! route('complaints.show', [$complaint->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i>{!! $complaint->car_imm !!}</a></td>
            <td>{!! gmdate('d-m-Y', strtotime($complaint->date_getting)) !!}</td>
            <td>{!! $complaint->place_getting !!}</td>
            <td>{!! substr($complaint->reasons,0,30).'...' !!}</td>
            <td>
                @if(Auth::user()->role=="gerant")
                {!! Form::open(['route' => ['complaints.destroy', $complaint->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('complaints.edit', [$complaint->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i> Modifier</a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Effacer', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
