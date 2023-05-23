@extends('layouts.main')

@section('content')
    {{-- Form --}}
    <div class="card-content">
        <div class="card-body">

            <form class="form form-vertical" method="post" action="/admin/{{$products->id}}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Name</label>
                                <input
                                type="text"
                                id="first-name-vertical"
                                class="form-control @error('nama') is-invalid @enderror"
                                name="nama"
                                placeholder="Masukkan Name"
                                value="{{ $products->nama }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Price</label>
                                <input
                                type="number"
                                id="first-name-vertical"
                                class="form-control @error('harga') is-invalid @enderror"
                                name="harga"
                                placeholder="Masukkan Price"
                                value="{{ $products->harga }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="contact-info-vertical">Pratinjau Gambar</label>
                                <div class="container border mt-2 py-3 d-flex justify-content-center">
                                    @if ($products->gambar)
                                        <img src="{{ asset('storage/' . $products->gambar) }}" alt="no-picture" id="imgPreview"
                                            style="max-width: 400px;" />
                                    @else
                                        <img id="imgPreview" src="#" alt="your image" style="max-width: 400px;" />
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="contact-info-vertical">Gambar</label>
                                <input
                                class="form-control @error('gambar') is-invalid @enderror"
                                type="file"
                                id="gambar"
                                name="gambar"
                                value="{{ $products->gambar }}"
                                onchange="previewImage()">
                            </div>
                            @error('gambar')
                                {{ $error }}
                            @enderror
                        </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="email-id-column">Information</label>
                                    <textarea name="keterangan"
                                    class="form-control @error('keterangan') is-invalid @enderror"
                                     id="" cols="30" rows="10">{{$products->keterangan}}</textarea>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-4 px-5 mt-1">Submit</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
