@extends('templates.gudangNavbar')

@section('libsOnHeader')
    {{-- Write more CSS or Other Link here --}}
@endsection

@section('contentHeader')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">My Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard"><span class="fas fa-undo"></span> Back</a></li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('mainContent')
    <!-- Main row -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                {{-- Profile --}}
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title mt-1">My Biodata</h3>
                            <div class="card-tools">
                                <a href="/user/{{ $userData->id }}/edit" class="btn btn-outline-primary btn-sm"><span class="fas fa-edit"></span> Edit</a>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div><!-- /.card-tools -->
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                {{-- Biodata --}}
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong><i class="fas fa-user mr-1"></i> Name</strong>
                                            <p> {{ $userData->name }} </p>
                                        </div>
                                        <div class="col-md-6">
                                            <strong> Gender</strong>
                                            <p>
                                                @if ($userData->gender == 'notdefined')
                                                    Data not defined yet! Please edit your profile! <i class="fas fa-exclamation-triangle"></i> 
                                                @endif
                                                @if ($userData->gender == 'male')
                                                    <i class="fas fa-mars"></i> Male
                                                @endif
                                                @if ($userData->gender == 'female')
                                                    <i class="fas fa-venus"></i> Female
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong><i class="fas fa-envelope mr-1"></i> E-Mail</strong>
                                            <p>{{ $userData->email }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <strong><i class="fas fa-mobile-alt mr-1"></i> Phone</strong>
                                            <p>
                                                @if ($userData->telp == '')
                                                    Data not defined yet! Please edit your profile! <i class="fas fa-exclamation-triangle"></i> 
                                                @else
                                                    {{ $userData->telp }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong><i class="fas fa-building"></i> Enterprise</strong>
                                            <p>
                                                @if ($userData->enterprise == '')
                                                    Data not defined yet! Please edit your profile! <i class="fas fa-exclamation-triangle"></i> 
                                                @else
                                                    {{ $userData->enterprise }}
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <strong><i class="fas fa-sitemap"></i> Position</strong>
                                            <p>
                                                @if ($userData->position == '')
                                                    Data not defined yet! Please edit your profile! <i class="fas fa-exclamation-triangle"></i> 
                                                @else
                                                    {{ $userData->position }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <strong><i class="fas fa-map-marker-alt"></i> Address</strong>
                                            <p>
                                                @if ($userData->address == '')
                                                    Data not defined yet! Please edit your profile! <i class="fas fa-exclamation-triangle"></i>
                                                @else
                                                    {{ $userData->address }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div><!-- /.col -->

                                {{-- Photo Profile --}}
                                <div class="col-md-3">
                                    <!-- Profile Image -->
                                    <div class="card" >
                                        <div class="card-body">
                                            <div class="text-center">
                                                @if ($userData->photo == '')
                                                    <img src="{{ asset('assets/images/icons/user-icon-avatar.jpg') }}" class="card-img-top" alt="...">
                                                @else
                                                    <img src="{{ asset('storage/'.$userData->photo) }}" class="card-img-top" alt="...">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.col -->
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div><!-- /.row -->

            {{-- Delete data user ini --}}
            <div class="container">
                <div class="row">
                    <div class="ml-auto">
                        <form action="/user/{{ $userData->id }}" method="post">
                            @method('delete')
                            @csrf
                            <input type="hidden" value="{{ $userData->name }}" name="delUser" id="delUser">
                            <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i> Close Account</button>
                        </form>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section><!-- /.content -->

    <script>
        // 
    </script>

@endsection

@section('libsOnFooter')
    {{-- Write more Javascript or Other Src here --}}
@endsection