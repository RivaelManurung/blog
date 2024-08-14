@extends('BE.layout.baselayout')

<body>

  @extends('BE.layout.header')
  <!-- ======= Sidebar ======= -->
  @extends('BE.layout.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <!-- Left side columns -->
    <div class="col-lg-8">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">artikels Added Per Day</h5>

              <!-- Line Chart -->
              <div id="lineChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                              // Data from the controller
                              const artikelCountsPerDay = @json($artikelCountsPerDay);
          
                              const dates = artikelCountsPerDay.map(item => item.date);
                              const counts = artikelCountsPerDay.map(item => item.count);
          
                              echarts.init(document.querySelector("#lineChart")).setOption({
                                  xAxis: {
                                      type: 'category',
                                      data: dates
                                  },
                                  yAxis: {
                                      type: 'value'
                                  },
                                  series: [{
                                      data: counts,
                                      type: 'line',
                                      smooth: true
                                  }]
                              });
                          });
              </script>
              <!-- End Line Chart -->
            </div>
          </div>
        </div>
        <!-- Right side columns -->
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Upload Terbaru <span>| Buku</span></h5>

              <div class="news">
                @foreach($latesArtikels as $artikel)
                <div class="post-item clearfix">
                  <img src="{{ asset('images/' . $artikel->image) }}" alt="{{ $artikel->judul }}"
                    style="max-width: 50px; max-height: 50px;">
                  <h4><a href="{{ route('artikel.show', $artikel->id) }}">{{ $artikel->judul }}</a></h4>
                  <p>{{ Str::limit($artikel->description, 50) }}</p>
                </div>
                @endforeach

              </div><!-- End sidebar recent posts-->
            </div>
          </div><!-- End News & Updates -->
        </div>

      </div>
    </div><!-- End Left side columns -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->



</body>

</html>