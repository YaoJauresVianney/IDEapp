<table class="table table-responsive" id="repairs-table">
    <thead>
        <tr>
            <th width="90">Référence</th>
            <th>Client</th>
            <th>Catégorie</th>
            <th>Nbre.jours</th>
            <th>Enlèvement</th>
            <th>Status</th>
            <th width="110">Total</th>
            <th width="100">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($repairs as $repair)
        <tr>
            <td>
            <a target="blank" href="{!! route('repairs.print', [$repair->id]) !!}" class='btn btn-link'>{!! $repair->reference !!}</a></td>
            <td>{!! ($repair->client) ? $repair->client->fullname:'_' !!}</td>
            <td><div class="label label-default">{!! (isset($repair->peopletype))?$repair->peopletype->label:'_' !!}</div><br>{!! (isset($repair->vehiclecategory))?$repair->vehiclecategory->fullname:'_' !!} <br>
                {!! $repair->car_brand !!} -
                {!! $repair->car_imm !!}
            </td>

            <td class="text-center" style="font-size:20px; font-weight:bold">{!! $repair->numberDays() !!}</td>
            <td>{!! gmdate('d-m-Y', strtotime($repair->date_getting)) !!} <br>
                à {!! $repair->hour_getting !!} <br>
                {!! $repair->place_getting !!} </td>
            <td>
                @if($repair->state == 'pending')
                    <div class="label label-success">En cours</div>
                @else
                    <div class="label label-default">Terminé</div>
                @endif 
            </td>
            <td>{!! number_format($repair->sumDays()+$repair->tva(),0,'','.') !!} FCFA</td> 
            <td>
                {!! Form::open(['route' => ['repairs.destroy', $repair->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <!-- <a href="{!! route('repairs.show', [$repair->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                    @if($repair->state != 'closed')

                        @if(Auth::user()->role=="gerant" || Auth::user()->role=="caissiere")
                            <a href="{!! route('repairs.payment', [$repair->id]) !!}" class='btn btn-default' title="Payer la facture"><i class="glyphicon glyphicon-shopping-cart"></i></a>

                            <a href="{!! route('repairs.edit', [$repair->id]) !!}" class='btn btn-default' title="Modifier la facture"><i class="glyphicon glyphicon-edit"></i></a>
                        @endif
                    @else
                    <a href="{!! route('repairs.print', [$repair->id]) !!}" class='btn btn-default' target="_blank" title="Imprimer la facture"><i class="glyphicon glyphicon-print"></i></a>
                    <a href="{!! route('repairs.recu', [$repair->id]) !!}" class='btn btn-default' target="_blank" title="Imprimer le recu"><i class="glyphicon glyphicon-file"></i></a>
                    @endif
                    @if(Auth::user()->role=="gerant")
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endif
                    
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
            
    @endforeach
    </tbody>
</table>
