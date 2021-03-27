<table class="table table-responsive" id="peopletypes-table">
    <thead>
        <th>Code</th>
        <th>Libellé</th>
        <th>Status</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($peopletypes as $peopletype)
        <tr>
            <td>{!! $peopletype->code !!}</td>
            <td>{!! $peopletype->label !!}</td>
            <td>
                @if($peopletype->is_enabled)
                    <div class="label label-success">En ligne</div>
                @else
                    <div class="label label-default">Hors ligne</div>
                @endif 
            </td>
            <td>
                {!! Form::open(['route' => ['peopletypes.destroy', $peopletype->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <!-- <a href="{!! route('peopletypes.show', [$peopletype->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                    <a href="{!! route('peopletypes.edit', [$peopletype->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i> Modifier</a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Effacer', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
