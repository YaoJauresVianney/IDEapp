<table class="table table-responsive" id="vehiclecategories-table">
    <thead>
        <th>Code</th>
        <th>Type</th>
        <th>Description</th>
        <th>Status</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($vehiclecategories as $vehiclecategory)
        <tr>
            <td>{!! $vehiclecategory->code !!}</td>
            <td>{!! $vehiclecategory->type !!}</td>
            <td>{!! $vehiclecategory->desc !!}</td>
            <td>
                @if($vehiclecategory->is_enabled)
                    <div class="label label-success">En ligne</div>
                @else
                    <div class="label label-default">Hors ligne</div>
                @endif 
            </td>
            <td>
                {!! Form::open(['route' => ['vehiclecategories.destroy', $vehiclecategory->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <!-- <a href="{!! route('vehiclecategories.show', [$vehiclecategory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                    <a href="{!! route('vehiclecategories.edit', [$vehiclecategory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i>Modifier</a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Effacer', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
