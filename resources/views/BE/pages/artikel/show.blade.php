@extends('BE.layout.baselayout')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>View Article</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('artikel.index') }}">Articles</a></li>
                <li class="breadcrumb-item active">View Article</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->judul }}</h5>
                        @if($article->image)
                        <img src="{{ asset('images/' . $article->image) }}" alt="{{ $article->judul }}" class="img-fluid" >
                        @endif
                        <p class="card-text">{{ $article->deskripsi }}</p>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
