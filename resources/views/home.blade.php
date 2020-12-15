@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 d-flex flex-column align-items-center justify-content-center">
                            <i class="fa fa-cog fa-5x text-danger"></i>
                            <a href="/categories" class="font-weight-bold btn btn-link">
                                Gérer
                            </a>
                        </div>
                        <div class="col-sm-4 d-flex flex-column align-items-center justify-content-center">
                            <i class="fa fa-shopping-bag fa-5x text-primary"></i>
                            <a href="/payments" class="font-weight-bold btn btn-link">
                                Ventes
                            </a>
                        </div>
                        <div class="col-sm-4 d-flex flex-column align-items-center justify-content-center">
                            <i class="fa fa-clipboard-list fa-5x text-success"></i>
                            <a href="/reports" class="font-weight-bold btn btn-link">
                                Rapports
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
