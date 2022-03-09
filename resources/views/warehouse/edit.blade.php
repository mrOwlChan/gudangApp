@extends('templates.gudangNavbar')

@section('libsOnHeader')
    {{-- Write more CSS or Other Link here --}}
@endsection

@section('contentHeader')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Warehouse</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/warehouse"><span class="fas fa-undo"></span> Back</a></li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('mainContent')
    <!-- Main row -->
    <form action="/warehouse/{{ $warehouse->id }}" method="post">
        @method('patch')
        @csrf
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-6 connectedSortable">
                <div class="card card-warning">
                    {{-- <div class="card-header"></div> --}}
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" name="name" value="{{ $warehouse->name, old('name') }}" autofocus>
                                {{-- error message --}}
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" placeholder="Type"  name="type" value="{{ $warehouse->type, old('type') }}">
                                {{-- error message --}}
                                @error('type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Address"  name="address">{{ $warehouse->address, old('address') }}</textarea>
                                {{-- error message --}}
                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="desc" class="col-sm-2 col-form-label">Desc</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control @error('desc') is-invalid @enderror" id="desc" placeholder="Description"  name="desc">{{ $warehouse->desc, old('desc') }}</textarea>
                                {{-- error message --}}
                                @error('decs')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="code" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select class="custom-select @error('statusready') is-invalid @enderror" id="statusready" name="statusready">
                                    @if ($warehouse->statusready == 1)
                                        <option value="1" selected>Open</option>
                                        <option value="0" >Idle</option>
                                    @else    
                                        <option value="0" selected>Idle</option>
                                        <option value="1" >Open</option>
                                    @endif
                                </select>
                                {{-- error message --}}
                                @error('statusready')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="code" class="col-sm-2 col-form-label">Code ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" placeholder="Auto Generate" name="code" value="{{ $warehouse->code, old('code') }}">
                                {{-- error message --}}
                                @error('code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <button type="reset" class="btn btn-danger btn-sm ml-auto">Reset</button>
                            <button type="submit" class="btn btn-primary btn-sm ml-2">Submit</button>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.Left col -->
    
            <!-- right col -->
            <section class="col-lg-6 connectedSortable">
                {{-- <div class="card card-warning"> --}}
                    {{-- <div class="card-header"></div> --}}
                    {{-- <div class="card-body">
                        <div class="form-group row">
                            <button type="reset" class="btn btn-danger btn-sm ml-auto">Reset</button>
                            <button type="submit" class="btn btn-primary btn-sm ml-2">Edit</button>
                        </div>
                    </div> --}}
                {{-- </div> --}}
            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
    </form>

    <script>
        // 
    </script>

@endsection

@section('libsOnFooter')
    {{-- Write more Javascript or Other Src here --}}
@endsection