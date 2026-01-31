@extends('layouts.main')

@section('extend-css')
    <!-- Core CSS yang diperlukan -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
@endsection

@section('extend-components')
    @include('components.extends.modal')
@endsection

@section('contents')
    <div class="col">
        <div class="row">
            <div class="d-flex justify-content-between mb-3">
                <button type="button" id="create-data" class="btn btn-sm btn-outline-primary">Add Product</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Multilingual -->
                <div class="card">
                    <div class="card-datatable table-responsive">
                        <table class="dt-multilingual table">
                            <thead>
                                <tr>
                                    <th>NAMA PRODUK</th>
                                    <th>KATEGORI</th>
                                    <th>HARGA</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!--/ Multilingual -->
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <!-- SWAL -->
    <script src="{{ asset('assets/js/helpers/swal.js') }}"></script>

    <!-- BLOCKUI -->
    <script src="{{ asset('assets/js/helpers/blockui.js') }}"></script>
    
    <!-- Winform -->
    <script src="{{ asset('assets/js/extends/winform.js') }}"></script>
    
    <!-- Winform Handler-->
    <script src="{{ asset('assets/js/extends/winform-handler.js') }}"></script>

    <!-- DataTables -->
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

    <!-- Flatpickr -->
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    
    <!-- Currency -->
    <script src="{{ asset('assets/js/helpers/currency.js') }}"></script>

    <script>
        const createUrl = "{{ route('product.create') }}";
        const editUrl   = "{{ url('/product') }}/:id/edit";
        const deleteUrl = "{{ url('/product') }}/:id/";

        $("#create-data").click(() => {
            winform(createUrl, 'GET', 'Create Produk');
        });

        function editProduk(id) {
            winform(editUrl.replace(':id', id), 'GET', 'Edit Produk');
        }

        function deleteProduk(id) {
            winform(deleteUrl.replace(':id', id), 'GET', 'YAKIN INGIN HAPUS ?', 'text-danger');
        }

        window.productTable = $('.dt-multilingual').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('product.list') }}",
            columns: [
                { data: 'nama_produk', name: 'nama_produk' },
                { data: 'kategori', name: 'kategori' },
                { data: 'harga', name: 'harga' },
                { data: 'action', orderable: false, searchable: false }
            ]
        });
    </script>
@endsection
