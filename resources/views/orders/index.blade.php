@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <page-header title="Show Orders" nav-page="Orders" page=""></page-header>
    <!-- END Hero -->
    <!-- Page Content -->
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <order-list></order-list>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
