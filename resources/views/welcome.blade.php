@extends('layout.app')
@section('body_class','home page-template page-template-templates page-template-blank page-template-templatesblank-php page page-id-1897 wp-custom-logo rtcl-no-js ehf-header ehf-footer ehf-template-classima ehf-stylesheet-classima header-style-2 footer-style-1 no-sidebar elementor-default elementor-kit-2161 elementor-page elementor-page-1897')
@section('content')
<style>
    .zoom-effect {
        transition: transform 0.3s;
    }

    .zoom-effect:hover {
        transform: scale(1.1);
    }
</style>
<br>
<br>
        <div class="container">
            <div class="row">
                @foreach ($categroy as $cat)
                    @if ($cat->parent_id == null)
                        <div class="col-lg-3 zoom-effect" style="height:305px ; background-image: url('{{ asset('uploads/categories/' . $cat->image) }}'); background-repeat: no-repeat; padding: 10px; color: white;">
                            <h1 style="color: white">{{$cat->name}}</h1>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="container">
            <h2>Featured Products</h2>
            <div class="row">
                @foreach ($products as $prd)
                <a href="{{ route('product.show', $prd->id) }}">
                    <div class="col-lg-3">
                        <div class="card">
                            <img src="{{ asset('uploads/products/' . $prd->images[0]) }}" class="card-img-top" alt="...">
                            <div class="card-body m-auto">
                                <h5 class="card-title">{{$prd->name}}</h5>
                                <h6 class="card-title">{{$prd->price}} د . ك</h6>
                                <a href="#" class="btn btn-dark">Select Options</a>
                            </div>
                        </div><br>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

        {{-- {{$ads}} --}}
        <div class="container">
        <h2>Featured Ads</h2>
        <div class="row">
            @foreach ($ads as $ad)
            <div class="col-sm-3">
              <div class="card">
                @if ($ad->images)
                @php
                    $decodedImages = json_decode($ad->images);
                @endphp

                @if ($decodedImages && is_array($decodedImages) && count($decodedImages) > 0)
                    <img src="{{ asset('uploads/advertisments/' . $decodedImages[0]) }}" class="card-img-top" alt="image">
                @else
                    <img src="{{ asset('path/to/default-image.jpg') }}" class="card-img-top" alt="default image">
                @endif
            @else
                <img src="{{ asset('path/to/default-image.jpg') }}" class="card-img-top" alt="default image">
            @endif
                            <div class="card-body">
                    <h5 class="card-title">{{$ad->name}}</h5>
                    @if ($ad->category)
                    <h5 class="card-title">{{$ad->category['name']}}</h5>
                @endif
                  <p class="card-text">{{$ad->price}} د.ك</p>
                  @if ($ad->country)
                  <p class="card-text">{{$ad->country['name']}}</p>
                  @endif
                  <p class="card-text">Age: {{$ad->age}} Years</p>
                </div>
              </div><br>
            </div>
        @endforeach
        </div>
        </div>


@endsection
@section('script')
<script>
    function isMobileDevice() {
        return (typeof window.orientation !== "undefined") || (navigator.userAgent.indexOf('IEMobile') !== -1);
    }
    var currentLocation = window.location.href;
    var mobileRedirect = 'https://play.google.com/';
    var desktopRedirect = '/';
    var redirectKey = isMobileDevice() ? 'mobileRedirected' : 'desktopRedirected';
    var redirected = sessionStorage.getItem(redirectKey);
    if (!redirected && ((isMobileDevice() && currentLocation !== mobileRedirect) || (!isMobileDevice() && currentLocation !== desktopRedirect))) {
        sessionStorage.setItem(redirectKey, 'true');
        window.location.href = isMobileDevice() ? mobileRedirect : desktopRedirect;
    }
</script>
@endsection
