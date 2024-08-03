@extends('FE.layout.baselayout')
@section('content')


<body>
  <div class="main-banner header-text">
    <div class="container-fluid">
      <div class="owl-banner owl-carousel">
        @foreach($artikels as $artikel)
        <div class="item">
          <p>{{ $artikel->judul }}</p>
          <img src="{{ url('images/'.$artikel->image) }}" alt="{{ $artikel->judul }}">
          <div class="item-content">
            <div class="main-content">
              <div class="meta-category">
                <span>{{ $artikel->categori->name ?? 'Uncategorized' }}</span>
              </div>
              <a href="{{ route('dashboard.show', $artikel->id) }}">
                <h4>{{ $artikel->judul }}</h4>
              </a>
              <ul class="post-info">
                <li><a href="#">Admin</a></li>
                <li><a href="#">{{ $artikel->updated_at->format('F d, Y') }}</a></li>
              </ul>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>

  <section class="blog-posts">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="all-blog-posts">
            <div class="row">
              @foreach($artikels as $artikel)
              <div class="col-lg-12">
                <div class="blog-post">
                  <div class="blog-thumb">
                    <img src="{{ url('images/'.$artikel->image) }}" alt="{{ $artikel->judul }}">
                  </div>
                  <div class="down-content">
                    <span>{{ $artikel->categori->name ?? 'Uncategorized' }}</span>
                    <a href="{{ route('dashboard.show', $artikel->id) }}">
                      <h4>{{ $artikel->judul }}</h4>
                    </a>
                    <ul class="post-info">
                      <li><a href="#">Admin</a></li>
                      <li><a href="#">{{ $artikel->updated_at->format('F d, Y') }}</a></li>
                    </ul>
                    <p>{{ $artikel->deskripsi }}</p>
                    <div class="post-options">
                      <div class="row">
                        <div class="col-6">
                          <ul class="post-tags">
                            <li><i class="fa fa-tags"></i></li>
                            <li><a href="#">{{ $artikel->categori->name ?? 'Uncategorized' }}</a></li>
                          </ul>
                        </div>
                        <div class="col-6">
                          <ul class="post-share">
                            <li><i class="fa fa-share-alt"></i></li>
                            <li><a href="#">Facebook</a>,</li>
                            <li><a href="#"> Twitter</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              <div class="col-lg-12">
                <div class="main-button">
                  <a href="{{ route('dashboard.index') }}">View All Posts</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="sidebar">
            <div class="row">
              <div class="col-lg-12">
                <div class="sidebar-item search">
                  <form id="search_form" name="gs" method="GET" action="#">
                    <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                  </form>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="sidebar-item recent-posts">
                  <div class="sidebar-heading">
                    <h2>Recent Posts</h2>
                  </div>
                  <div class="content">
                    <ul>
                      @foreach($recentPosts as $post)
                      <li><a href="{{ route('dashboard.show', $post->id) }}">
                          <h5>{{ $post->judul }}</h5>
                          <span>{{ $post->updated_at->format('F d, Y') }}</span>
                        </a></li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="sidebar-item categories">
                  <div class="sidebar-heading">
                    <h2>Categories</h2>
                  </div>
                  <div class="content">
                    <ul>
                      @foreach($categories as $category)
                      <li><a {{ $category->name }}</a></li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="sidebar-item tags">
                  <div class="sidebar-heading">
                    <h2>Tag Clouds</h2>
                  </div>
                  <div class="content">
                    {{-- <ul>
                      @foreach($tags as $tag)
                      <li><a href="{{ route('tag.show', $tag->id) }}">{{ $tag->name }}</a></li>
                      @endforeach
                    </ul> --}}
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
            <p>Copyright 2020 Stand Blog Co.
              | Design: <a rel="nofollow" href="https://templatemo.com" target="_parent">TemplateMo</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
</body>
@endsection