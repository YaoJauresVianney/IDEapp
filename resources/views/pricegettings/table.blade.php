<table class="table table-responsive" id="pricegettings-table">
    <thead>
        <th>Catégorie</th>
        <th>Type de Client</th>
        <th>Forfait Jour</th>
        <th>Forfait Nuit</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($pricegettings as $pricegetting)
        <tr>
            <td>{!! $pricegetting->vehiclecategory->fullname !!}</td>
            <td>{!! $pricegetting->peopletype->label !!}</td>
            <td>{!! $pricegetting->price_day !!}
                @if($pricegetting->per_kg) / KG @endif
            </td>
            <td>{!! $pricegetting->price_night !!}
                @if($pricegetting->per_kg) / KG @endif
            </td>
            <td>
                {!! Form::open(['route' => ['pricegettings.destroy', $pricegetting->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <!-- <a href="{!! route('pricegettings.show', [$pricegetting->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                    <a href="{!! route('pricegettings.edit', [$pricegetting->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i>Modifier</a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Effacer', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
