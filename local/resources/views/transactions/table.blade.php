<table class="table table-responsive" id="transactions-table">
    <thead>
        <th>Type</th>
        <th>Montant</th>
        <th width="180">Desc</th>
        <th>Moyen</th>
        <th>Num Transaction</th>
        <th>Date</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($transactions as $transaction)
        <tr>
            <td>
                @if($transaction->type == 'income')
                    <div class="label label-success">Entrée d'argent</div>
                @else
                    <div class="label label-danger">Dépense</div>
                @endif 
            </td>
            <td><strong>{!! number_format($transaction->amount,0,'','.') !!}</strong>FCFA</td>
            <td>{!! substr($transaction->desc,0,100).'...' !!}</td>
            <td>{!! $transaction->way_of !!}</td>
            <td>{!! $transaction->num_transaction !!}</td>
            <td>{!! gmdate('d/m/Y \à H:i', strtotime($transaction->created_at)) !!}</td>
            <td>
                @if(Auth::user()->role=="gerant")
                {!! Form::open(['route' => ['transactions.destroy', $transaction->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <!-- <a href="{!! route('transactions.show', [$transaction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                    <a href="{!! route('transactions.edit', [$transaction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i> Modifier</a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Effacer', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>