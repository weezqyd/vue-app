@extends('layouts.backend')
    @section('content')
        <!-- Hero -->
        <page-header title="Update Product" nav-page="Products" page="Update"></page-header>
        <!-- END Hero -->
        <!-- Page Content -->
        <div class="content">
        <edit-product title="Edit Product Form" v-bind:product="{{json_encode($product)}}"></edit-product>
        </div>
        <!-- END Page Content -->
    @endsection
