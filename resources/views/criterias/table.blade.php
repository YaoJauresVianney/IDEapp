<table class="table table-responsive" id="criterias-table">
    <thead>
        <th>Code</th>
        <th>Libellé</th>
        <th>Status</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($criterias as $criteria)
        <tr>
            <td>{!! $criteria->code !!}</td>
            <td>{!! $criteria->label !!}</td>
            <td>
                @if($criteria->is_enabled)
                    <div class="label label-success">En ligne</div>
                @else
                    <div class="label label-default">Hors ligne</div>
                @endif 
            </td>
            <td>
                {!! Form::open(['route' => ['criterias.destroy', $criteria->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <!-- <a href="{!! route('criterias.show', [$criteria->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                    <a href="{!! route('criterias.edit', [$criteria->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i> Modifier</a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Effacer', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
