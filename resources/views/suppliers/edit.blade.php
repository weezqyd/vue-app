@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <page-header title="Update supplier" nav-page="Suppliers" page="Update"></page-header>
    <!-- END Hero -->
    <!-- Page Content -->
    <div class="content">
        <edit-supplier v-bind:supplier="{{json_encode($supplier)}}" title="Update Supplier Form"></supplier-form>
    </div>
    <!-- END Page Content -->
@endsection
