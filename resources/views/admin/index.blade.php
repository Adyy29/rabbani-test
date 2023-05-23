@extends('layouts.main')

@section('content')
    {{-- Tabel --}}
    <div class="col-12 text-end">
        <a href="/admin/create" style="color:white;" class="btn btn-sm btn-primary me-2 mb-3 col-3">
            <i class="fa-solid fa-plus"></i> Tambah
        </a>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                List Tabel Product
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Picture</th>
                            <th>Information</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($outlets as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->nama }}</td>
                                <td>{{ $product->harga }}</td>
                                <td><img class="card-img-top img-fluid justify-content-centered"
                                    style="height: 7rem" src="{{ asset('storage/' . $product->gambar) }}"
                                    ></td>
                                <td>{{ $product->keterangan }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-6 mb-2">
                                            <div class="d-grid gap-2">
                                                <a href="/admin/{{ $product->id }}/edit" class="btn btn-warning">
                                                    Edit
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <form action="/admin/{{ $product->id }}" method="post">
                                                <div class="d-grid gap-2 mb-2">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger">
                                                        Hapus
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        //message with toastr
        @if (session()->has('success'))

            alert('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            alert('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
@endsection
