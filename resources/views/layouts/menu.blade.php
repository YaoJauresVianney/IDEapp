<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="{!! url('home') !!}"><i class="fa fa-users"></i><span>Tableau de bord</span></a>
</li>

@if(Auth::user()->role=="facturier")
<li class="{{ Request::is('clients*') ? 'active' : '' }}">
    <a href="{!! route('clients.index') !!}"><i class="fa fa-bookmark"></i><span>Liste des Clients</span></a>
</li>

<li class="{{ Request::is('repairs*') ? 'active' : '' }}">
    <a href="{!! route('repairs.index') !!}"><i class="fa fa-cog"></i><span>Liste des dépannages</span></a>
</li>

<li class="{{ Request::is('complaints*') ? 'active' : '' }}">
    <a href="{!! route('complaints.index') !!}"><i class="fa fa-inbox"></i><span>Réclamations</span></a>
</li>
@endif

@if(Auth::user()->role=="caissiere")
<li class="{{ Request::is('repairs*') ? 'active' : '' }}">
    <a href="{!! route('repairs.index') !!}"><i class="fa fa-cog"></i><span>Liste des dépannages</span></a>
</li>

<li class="{{ Request::is('transactions*') ? 'active' : '' }}">
    <a href="{!! route('transactions.index') !!}"><i class="fa fa-bar-chart"></i><span>Entrées et Sorties</span></a>
</li>
@endif

@if(Auth::user()->role=="comptable")
<li class="{{ Request::is('transactions*') ? 'active' : '' }}">
    <a href="{!! route('transactions.index') !!}"><i class="fa fa-bar-chart"></i><span>Entrées et Sorties</span></a>
</li>
@endif

@if(Auth::user()->role=="gerant")
<li class="{{ Request::is('clients*') ? 'active' : '' }}">
    <a href="{!! route('clients.index') !!}"><i class="fa fa-bookmark"></i><span>Liste des Clients</span></a>
</li>

<li class="{{ Request::is('repairs*') ? 'active' : '' }}">
    <a href="{!! route('repairs.index') !!}"><i class="fa fa-cog"></i><span>Liste des dépannages</span></a>
</li>

<li class="{{ Request::is('complaints*') ? 'active' : '' }}">
    <a href="{!! route('complaints.index') !!}"><i class="fa fa-inbox"></i><span>Réclamations</span></a>
</li>

<li class="{{ Request::is('transactions*') ? 'active' : '' }}">
    <a href="{!! route('transactions.index') !!}"><i class="fa fa-bar-chart"></i><span>Entrées et Sorties</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>Liste des utilisateurs</span></a>
</li>

<li class="{{ Request::is('vehiclecategories*') ? 'active' : '' }}">
    <a href="{!! route('vehiclecategories.index') !!}"><i class="fa fa-car"></i><span>Catégories de véhicule</span></a>
</li>

<li class="{{ Request::is('wreckers*') ? 'active' : '' }}">
    <a href="{!! route('wreckers.index') !!}"><i class="fa fa-bus"></i><span>Liste des dépanneuses</span></a>
</li>

<li class="{{ Request::is('criterias*') ? 'active' : '' }}">
    <a href="{!! route('criterias.index') !!}"><i class="fa fa-list"></i><span>Critères inventaire</span></a>
</li>

<li class="{{ Request::is('peopletypes*') ? 'active' : '' }}">
    <a href="{!! route('peopletypes.index') !!}"><i class="fa fa-user"></i><span>Catégorie de Clients</span></a>
</li>

<li class="{{ Request::is('pricegettings*') ? 'active' : '' }}">
    <a href="{!! route('pricegettings.index') !!}"><i class="fa fa-calendar"></i><span>Tarifs enlèvement</span></a>
</li>

<li class="{{ Request::is('pricepenalities*') ? 'active' : '' }}">
    <a href="{!! route('pricepenalities.index') !!}"><i class="fa fa-money"></i><span>Tarifs penalités</span></a>
</li>

<!-- <li class="{{ Request::is('logs*') ? 'active' : '' }}">
    <a href="{!! route('logs.index') !!}"><i class="fa fa-history"></i><span>Historique</span></a>
</li> -->
@endif
