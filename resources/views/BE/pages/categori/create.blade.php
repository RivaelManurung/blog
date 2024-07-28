@extends('BE.layout.baselayout')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Form Elements</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">General Form Elements</h5>

                        <!-- General Form Elements -->
                        <form method="POST" action="{{ url('/admin/categori') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="inputName">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@endsection

@push('scripts')
<script>
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var img = new Image();
        img.onload = function() {
            var canvas = document.createElement('canvas');
            var ctx = canvas.getContext('2d');

            // Set the desired width and height for the resized image
            var maxWidth = 200;
            var maxHeight = 200;

            // Calculate the new width and height while maintaining the aspect ratio
            var width = img.width;
            var height = img.height;

            if (width > height) {
                if (width > maxWidth) {
                    height *= maxWidth / width;
                    width = maxWidth;
                }
            } else {
                if (height > maxHeight) {
                    width *= maxHeight / height;
                    height = maxHeight;
                }
            }

            canvas.width = width;
            canvas.height = height;
            ctx.drawImage(img, 0, 0, width, height);

            var resizedImageUrl = canvas.toDataURL('image/jpeg');
            var imagePreview = document.getElementById('imagePreview');
            imagePreview.src = resizedImageUrl;
            imagePreview.style.display = 'block';
        };
        img.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endpush
