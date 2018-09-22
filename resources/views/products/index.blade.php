@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <page-header title="Show Products" nav-page="Products" page=""></page-header>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <product-list></product-list>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
