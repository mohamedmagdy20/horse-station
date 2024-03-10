@extends('layout.app')
@section('body_class','rtcl_listing-template-default single single-rtcl_listing postid-2068 wp-custom-logo rtcl rtcl-page rtcl-single-no-sidebar rtcl-no-js ehf-header ehf-footer ehf-template-classima ehf-stylesheet-classima header-style-2 footer-style-1 banner-enabled has-sidebar right-sidebar elementor-default elementor-kit-2161')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.3/viewer.min.css" integrity="sha512-zdX1vpRJc7+VHCUJcExqoI7yuYbSFAbSWxscAoLF0KoUPvMSAK09BaOZ47UFdP4ABSXpevKfcD0MTVxvh0jLHQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .rtcl img.rtcl-thumbnail{
        max-height:350px ;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <br><h3>{{$product->name}}</h3>
            <img src="{{ asset('uploads/products/' . $product->images[0]) }}" class="card-img-top" alt="...">
        </div>
        <div class="col-lg-6">
            <h3 style="margin-top: 100px">{{$product->price}}</h3>
            <p>{{$product->description}}</p>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.1/viewer.min.js"></script>
<script>
     $(document).ready(function() {
        const imageElements = document.querySelectorAll('.image-viewer');
        imageElements.forEach((element) => {
            new Viewer(element);
        });
    });

    function addFavourite(id)
	{
	    $.ajax({
	        type: 'GET',
	        url: "{{route('ads.fav.create')}}",
	        data: {id:id},
	        dataType: 'JSON',
	        success: function (results) {
	            toastr.success('Advertisment Added To Favourite', 'success');
	        },
	        error:function(result){
	            console.log(result);
	            toastr.error('Error Accure', 'Error');

	        }
	    });
	}
</script>
@endsection
