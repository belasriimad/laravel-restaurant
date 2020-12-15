@extends('layouts.app')


@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                                    <h3 class="text-secondary">
                                        <i class="fas fa-credit-card"></i> Ventes
                                    </h3>
                                    <a href="{{ route("payments.index") }}" class="btn btn-primary">
                                        <i class="fas fa-plus fa-x2"></i>
                                    </a>
                                </div>
                                <table class="table table-hover table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Menus</th>
                                            <th>Tables</th>
                                            <th>Sérveur</th>
                                            <th>Quantité</th>
                                            <th>Total</th>
                                            <th>Type de paiement</th>
                                            <th>Etat de paiement</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sales as $sale)
                                            <tr>
                                                <td>
                                                    {{ $sale->id }}
                                                </td>
                                                <td>
                                                    @foreach($sale->menus()->where("sales_id",$sale->id)->get() as $menu)
                                                        <div class="col-md-4 mb-2">
                                                            <div class="h-100">
                                                                <div class="d-flex
                                                                flex-column justify-content-center
                                                                align-items-center">
                                                                    <img
                                                                        src="{{ asset("images/menus/". $menu->image) }}" alt="{{ $menu->title}}"
                                                                        class="img-fluid rounded-circle"
                                                                        width="50"
                                                                        height="50"
                                                                    >
                                                                    <h5 class="font-weight-bold mt-2">
                                                                        {{ $menu->title }}
                                                                    </h5>
                                                                    <h5 class="text-muted">
                                                                        {{ $menu->price }} DH
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($sale->tables()->where("sales_id",$sale->id)->get() as $table)
                                                        <div class="col-md-4 mb-2">
                                                            <div class="h-100">
                                                                <div class="d-flex
                                                                flex-column justify-content-center
                                                                align-items-center">
                                                                    <i class="fa fa-chair fa-3x"></i>
                                                                    <h5 class="text-muted mt-2">
                                                                        {{ $table->name }}
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    {{ $sale->servant->name}}
                                                </td>
                                                <td>
                                                    {{ $sale->quantity}}
                                                </td>
                                                <td>
                                                    {{ $sale->total_received}}
                                                </td>
                                                <td>
                                                    {{ $sale->payment_type === "cash" ? "Espéce" : "Carte bancaire"}}
                                                </td>
                                                <td>
                                                    {{ $sale->payment_status === "paid" ? "Payé" : "Impayé"}}
                                                </td>
                                                <td class="d-flex flex-row justify-content-center align-items-center">
                                                    <a href="{{ route("sales.edit",$sale->id) }}" class="btn btn-warning mr-1">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form id="{{ $sale->id }}" action="{{ route("sales.destroy",$sale->id) }}" method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button
                                                            onclick="
                                                                event.preventDefault();
                                                                if(confirm('Voulez vous supprimer la vente {{ $sale->id }} ?'))
                                                                document.getElementById({{ $sale->id }}).submit()
                                                            "
                                                            class="btn btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="my-3 d-flex justify-content-center align-items-center">
                                    {{ $sales->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
