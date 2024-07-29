@extends('BE.layout.baselayout')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Form Elements</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Edit Category</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Category</h5>

                        <!-- Edit Form Elements -->
                        <form method="POST" action="{{ route('categori.update', $category->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="inputName" value="{{ $category->name }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Update Category</button>
                                </div>
                            </div>
                        </form><!-- End Edit Form Elements -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
