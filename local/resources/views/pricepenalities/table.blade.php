<table class="table table-responsive" id="pricepenalities-table">
    <thead>
        <th>Catégorie</th>
        <th>Type de client</th>
        <th>Penalité de fourrière</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($pricepenalities as $pricepenality)
        <tr>
            <td>{!! $pricepenality->vehiclecategory->fullname !!}</td>
            <td>{!! $pricepenality->peopletype->label !!}</td>
            <td>{!! $pricepenality->penality_per_day !!}
                @if($pricepenality->per_kg) / KG @endif</td>
            <td>
                {!! Form::open(['route' => ['pricepenalities.destroy', $pricepenality->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <!-- <a href="{!! route('pricepenalities.show', [$pricepenality->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                    <a href="{!! route('pricepenalities.edit', [$pricepenality->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i> Modifier</a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Effacer', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
