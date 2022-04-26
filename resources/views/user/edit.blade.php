@extends('templates.gudangNavbar')

@section('libsOnHeader')
    {{-- Write more CSS or Other Link here --}}
@endsection

@section('contentHeader')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Biodata</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/user"><span class="fas fa-undo"></span> Back</a></li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('mainContent')
    <!-- Main row -->
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                {{-- Profile --}}
                <div class="col-md-12">
                    <form action="/user/{{ $userData->id }}" method="post" enctype="multipart/form-data">
                        <div class="row">
                            @method('patch')
                            @csrf
                            {{-- Biodata --}}
                            <div class="col-md-9">
                                <div class="row mb-3">
                                    <div class="col-md-6 pr-3">
                                        <strong><i class="fas fa-user mr-1"></i> Name</strong>
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" value="{{ $userData->name, old('name') }}" name='name' id='name'>
                                        
                                        {{-- error message --}}
                                        @error('name')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 pr-3">
                                        <strong> Gender</strong>
                                        <select class="form-control" name="gender" id="gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 pr-3">
                                        <strong><i class="fas fa-envelope mr-1"></i> E-Mail</strong>
                                        <input class="form-control @error('email') is-invalid @enderror" type="email" value="{{ $userData->email, old('email') }}" name='email' id='email'>
                                    
                                        {{-- error message --}}
                                        @error('email')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 pr-3">
                                        <strong><i class="fas fa-mobile-alt mr-1"></i> Phone</strong>
                                        <input class="form-control @error('telp') is-invalid @enderror" type="text" value="{{ $userData->telp, old('telp') }}" name='telp' id='telp'>
                                    
                                        {{-- error message --}}
                                        @error('telp')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 pr-3">
                                        <strong><i class="fas fa-building"></i> Enterprise</strong>
                                        <input class="form-control @error('enterprise') is-invalid @enderror" type="text" value="{{ $userData->enterprise, old('enterprise') }}" name='enterprise' id='enterprise'>
                                    
                                        {{-- error message --}}
                                        @error('enterprise')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 pr-3">
                                        <strong><i class="fas fa-sitemap"></i> Position</strong>
                                        <input class="form-control @error('position') is-invalid @enderror" type="text" value="{{ $userData->position, old('position') }}" name='position' id='position'>
                                    
                                        {{-- error message --}}
                                        @error('position')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12 pr-3 ">
                                        <strong><i class="fas fa-map-marker-alt"></i> Address</strong>
                                        <textarea class="form-control @error('address') is-invalid @enderror" type="text" name='address' id='address' rows="4">{{ $userData->address, old('address') }}</textarea>
                                    
                                        {{-- error message --}}
                                        @error('address')
                                            <div id="" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md">
                                        <button type="reset" class="btn btn-outline-danger btn-sm mr-2"><i class="fas fa-check-circle"></i> Reset</button>
                                        <button type="submit" class="btn btn-outline-success btn-sm"><i class="fas fa-check-circle"></i> Submit</button>
                                    </div>
                                </div>
                            </div><!-- /.col -->
                            {{-- Photo Profile --}}
                            <div class="col-md-3 mt-4"><!-- col rigth -->
                                <!-- Profile Image -->
                                <div class="card">
                                    @if ($userData->photo == '')
                                        <img  class="img-fluid" src="{{ asset('assets/images/icons/user-icon-avatar.jpg') }}" class="card-img-top" alt="...">
                                    @else
                                        {{-- Photo sebelumnya --}}
                                        <input class="form-control" type="hidden" value="{{ $userData->photo }}" name='prevPhoto' id='prevPhoto'>
                                        
                                        {{-- Photo yang diupload untuk diedit  --}}
                                        <img class="img-preview img-fluid" src="{{ asset('storage/'. $userData->photo) }}" class="card-img-top" alt="...">
                                    @endif
                                    <div class="card-body pb-0">
                                        <div class="text-center ">
                                            <div class="form-group">
                                                <label for="inputPhoto" style="font-size:12px"><i class="fas fa-camera"></i> Photo 170x170p </label>
                                                <input type="file" class="form-control-file form-control-sm" name="photo" id="photo" onchange="previewImage()">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.col -->

                        </div>
                    </form>    
                </div>
                {{--  --}}

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->

    <script>
        // preview gambar sebelum di submit
        function previewImage(){
            const image = document.querySelector("#photo");
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display ='block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>

@endsection

@section('libsOnFooter')
    {{-- Write more Javascript or Other Src here --}}
@endsection