@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <page-header title="Show suppliers" navPage="Suppliers"></page-header>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <supplier-list title="Supplier Registration Form"></supplier-list>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
