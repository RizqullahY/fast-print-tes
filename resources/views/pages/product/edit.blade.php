@extends('layouts.main')

@section('contents')
    <div class="col-xl mb-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Data</h5>
            </div>
            <div class="card-body">
                @include('pages.product.components.edit')
            </div>
        </div>
    </div>
@endsection