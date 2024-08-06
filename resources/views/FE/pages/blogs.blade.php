@extends('FE.layout.baselayout')
@section('content')

<body>
  <!-- Page Content -->
  <!-- Banner Starts Here -->
  <div class="heading-page header-text">
    <section class="page-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="text-content">
              <h4>Recent Posts</h4>
              <h2>Our Recent Blog Entries</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Banner Ends Here -->

  <section class="blog-posts grid-system">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="all-blog-posts">
            <div class="row">
              @foreach($artikels as $artikel)
              <div class="col-lg-6">
                <div class="blog-post">
                  <div class="blog-thumb">
                    <img src="{{ $artikel->thumbnail_url }}" alt="{{ $artikel->title }}">
                  </div>
                  <div class="down-content">
                    <span>{{ $artikel->categori->name }}</span>
                    <a href="{{ route('dashboard.show', $artikel->id) }}">
                      <h4>{{ $artikel->title }}</h4>
                    </a>
                    <ul class="post-info">
                      <li><a href="#">Admin</a></li>
                      <li><a href="#">{{ $artikel->updated_at->format('F d, Y') }}</a></li>
                      <li><a href="#">{{ $artikel->comments_count }} Comments</a></li>
                    </ul>
                    <p>{{ Str::words($artikel->deskripsi, 50, '...') }}</p>
                    <div class="post-options">
                      <div class="row">
                        <div class="col-lg-12">
                          <ul class="post-tags">
                            <li><i class="fa fa-tags"></i></li>
                            <li><a href="#">{{ $artikel->categori->name }}</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="sidebar">
            <div class="row">
              <div class="col-lg-12">
                <div class="sidebar-item recent-posts">
                  <div class="sidebar-heading">
                    <h2>Recent Posts</h2>
                  </div>
                  <div class="content">
                    <ul>
                      @foreach($recentPosts as $recent)
                      <li><a href="{{ route('dashboard.show', $recent->id) }}">
                          <h5>{{ $recent->judul }}</h5>
                          <span>{{ $recent->updated_at->format('F d, Y') }}</span>
                        </a></li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="sidebar-item tags">
                  <div class="sidebar-heading">
                    <h2>Categories</h2>
                  </div>
                  <div class="content">
                    <ul>
                      @foreach($categories as $category)
                      <li><a href="{{ route('category.filter', $category->id) }}">{{ $category->name }}</a></li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <ul class="social-icons">
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Behance</a></li>
            <li><a href="#">Linkedin</a></li>
            <li><a href="#">Dribbble</a></li>
          </ul>
        </div>
        <div class="col-lg-12">
          <div class="copyright-text">
            <p>Copyright 2020 Stand Blog Co.</p>
          </div>
        </div>
      </div>
    </div>
  </footer>
</body>
@endsection