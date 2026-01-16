@extends('layouts.app')
@section('title', 'Produk')
@section('page-title', 'Produk')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header pb-0 card-no-border">
                    <h3>Data Produk</h3><span>Di bawah ini adalah tabel yang berisikan data produk, anda dapat menambah,
                        mengedit, dan menghapus data</span>
                    <div class="d-flex mt-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal"
                            onclick="submit('tambah')">
                            <span class="fa-solid fa-plus"></span> Tambah data
                        </button>
                    </div>
                    <div class="mt-3 d-flex align-items-center">
                        <select id="filter_kategori" class="form-select w-auto me-2">
                            <option value="">Semua Kategori</option>
                            <option value="Kategori A">Kategori A</option>
                            <option value="Kategori B">Kategori B</option>
                            <option value="Kategori C">Kategori C</option>
                        </select>
                        <button type="button" class="btn btn-dark" onclick="get_data()">
                            Filter
                        </button>
                    </div>

                </div>
                <div class="card-body">
                    <div class="dt-ext">
                        <table class="table table-striped table-bordered" id="table" style="width:100%;">
                            <thead>
                                <tr>
                                    <th style="width:5%;">No</th>
                                    <th style="width:30%;">Nama</th>
                                    <th style="width:20%;">Kategori</th>
                                    <th style="width:15%;">Harga</th>
                                    <th style="width:10%;">Stok</th>
                                    <th style="width:20%;">#</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('pages.produk.modal')
@endsection

@section('js')
    <script>
        // deklarasi url untuk kirim data ke controller
        let url_tambah = "{{ route('produk.store') }}";
        let url_edit = "{{ route('produk.update', ['produk' => ':id']) }}";
        let url_hapus = "{{ route('produk.destroy', '') }}";

        $(document).ready(function() {
            get_data();
        });

        // fungsi ambil data dan masuk ke datatable
        function get_data() {
            var kategori = $('#filter_kategori').val();
            delete_error();
            delete_form();

            let table = $("#table").DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                responsive: true,
                ajax: {
                    url: "{{ url()->current() }}",
                    type: 'GET',
                    data: function(d) {
                        d.kategori = kategori;
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        className: 'text-center',
                        searchable: false,
                        orderable: false,
                    },
                    {
                        data: 'nama',
                        className: 'text-center',
                        name: 'nama',
                        searchable: true,
                        render: (data) => `<b>${data}</b>`
                    },
                    {
                        data: 'kategori',
                        className: 'text-center',
                        name: 'kategori',
                        searchable: false,
                    },
                    {
                        data: 'harga',
                        className: 'text-center',
                        name: 'harga',
                        searchable: false,
                        render: (data, type) => type === 'display' ? formatRupiah(data) : data
                    },
                    {
                        data: 'stok',
                        className: 'text-center',
                        name: 'stok',
                        searchable: false,
                        render: (data, type) => type === 'display' ? formatNumber(data) : data
                    },
                    {
                        data: 'aksi',
                        className: 'text-center',
                        name: 'aksi',
                        searchable: false,
                    },
                ],
                initComplete: function() {
                    var $searchInput = $('#table_filter input');
                    $searchInput.attr('placeholder', 'Cari nama produk...');
                    $searchInput.removeClass('form-control-sm');
                }
            });
        }

        // fungsi untuk tambah dan edit data (mengisi form dengan data lama)
        function submit(id) {
            delete_error();
            delete_form();
            if (id == "tambah") {
                $("#btn_tambah").show();
                $("#btn_edit").hide();
                $("#title_modal").text("Tambah data produk");
                $("#formData").attr("onsubmit", "return tambah_data()");
            } else {
                $("#btn_tambah").hide();
                $("#btn_edit").show();
                $("#title_modal").text("Edit data produk");
                $("#formData").attr("onsubmit", "return edit_data()");
                $.ajax({
                    type: "GET",
                    url: "{{ route('produk.edit', ['produk' => ':id']) }}".replace(':id', id),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: "json",
                    success: function(hasil) {
                        $("#id").val(id);
                        $("#nama").val(hasil.nama);
                        $("#kategori").val(hasil.kategori).change();
                        formatMaskMoney("#harga", hasil.harga);
                        $("#stok").val(hasil.stok);
                    },
                });
            }
        }
    </script>
    @include('js.crud')
@endsection
