<table class="table table-responsive" id="wreckers-table">
    <thead>
        <th>Code</th>
        <th>Immatriculation</th>
        <th>Description</th>
        <th>Status</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($wreckers as $wrecker)
        <tr>
            <td>{!! $wrecker->code !!}</td>
            <td>{!! $wrecker->car_imm !!}</td>
            <td>{!! $wrecker->label !!}</td>
            <td>
                @if($wrecker->is_enabled)
                    <div class="label label-success">En ligne</div>
                @else
                    <div class="label label-default">Hors ligne</div>
                @endif 
            </td>
            <td>
                {!! Form::open(['route' => ['wreckers.destroy', $wrecker->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <!-- <a href="{!! route('wreckers.show', [$wrecker->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                    <a href="{!! route('wreckers.edit', [$wrecker->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i>Modifier</a> 
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Effacer', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>