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
<div id="primary" class="content-area classima-listing-single rtcl">
    <div class="container">
        <div class="row mt-5">
            <div class="col-xl-9 col-lg-8 col-sm-12 col-12">
                <div class="site-content-block classima-single-details classima-single-details-3">
                    <div class="main-content">
                        @if ($currentLocale == 'en')
                        <h2 style="text-align: left; !important" class="entry-title">{{$data->title}}</h2>
                        @else
                        <h2 style="text-align: right; !important" class="entry-title">{{$data->title}}</h2>
                        @endif


                        <div class="single-listing-meta-wrap">
                            <ul class="single-listing-meta">
                                <li>
                                    <i class="far fa-clock" aria-hidden="true"></i>{{\Carbon\Carbon::parse($data->updated_at)->format('Y M D')}}
                                </li>

                                <li>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i><a
                                        href="{{route('home.main',)}}?area_id={{$data->area_id}}"></a><span
                                        class="rtcl-delimiter">{{app()->getLocale() === 'en' ? $data->area->name_en : $data->area->name_ar}}</span> <a
                                        href="{{route('home.main')}}?area_id={{$data->area_id}}"></a>
                                </li>

                                <li>
                                    <i class="fa fa-eye" aria-hidden="true"></i>{{$data->getViews()}} views
                                </li>

                                <li class="rtin-type">
                                    <i class="fa fa-tags" aria-hidden="true"></i>For {{$data->type}}
                                </li>

                            </ul>
                            <div class="rtcl-listing-badge-wrap"></div>
                        </div>


                        {{-- <div class="rtin-slider-box">
                            <div id="rtcl-slider-wrapper" class="rtcl-slider-wrapper mb-4" data-options="">
                                <!-- Slider -->
                                <div class="rtcl-slider">
                                    <div class="swiper-wrapper">
                                        @foreach ($data->adsImage as $item )

                                        @endforeach

                                    </div>

                                </div>
                            </div>
                        </div> --}}
                        <div class="elementor-element elementor-element-eeadcca elementor-widget elementor-widget-rtcl-listing-slider"
									data-id="eeadcca" data-element_type="widget"
									data-widget_type="rtcl-listing-slider.default">
									<div class="elementor-widget-container">

										<div class="rtcl rtcl-listings-sc-wrapper rtcl-elementor-widget rtcl-el-slider-wrapper rtcl-listings-slider  rtin-unique-class-275220361  rtcl-slider-pagination-style-2 rtcl-slider-btn-style-1"
											>
											<div class="rtcl-listings-wrapper">

												<div class="rtcl-listings rtcl-listings-slider-container swiper rtcl-grid-view rtcl-style-4-view  rtcl-carousel-slider "
													data-options="{&quot;slidesPerView&quot;:4,&quot;slidesPerGroup&quot;:4,&quot;spaceBetween&quot;:20,&quot;loop&quot;:true,&quot;slideClass&quot;:&quot;swiper-slide-customize&quot;,&quot;autoplay&quot;:{&quot;delay&quot;:7000,&quot;pauseOnMouseEnter&quot;:true,&quot;disableOnInteraction&quot;:false},&quot;pagination&quot;:{&quot;el&quot;:&quot;.rtin-unique-class-275220361 .rtcl-slider-pagination&quot;,&quot;clickable&quot;:true,&quot;type&quot;:&quot;bullets&quot;},&quot;speed&quot;:2000,&quot;navigation&quot;:{&quot;nextEl&quot;:&quot;.rtin-unique-class-275220361 .button-right&quot;,&quot;prevEl&quot;:&quot;.rtin-unique-class-275220361 .button-left&quot;},&quot;autoHeight&quot;:false,&quot;breakpoints&quot;:{&quot;0&quot;:{&quot;slidesPerView&quot;:1,&quot;slidesPerGroup&quot;:1},&quot;575&quot;:{&quot;slidesPerView&quot;:2,&quot;slidesPerGroup&quot;:2},&quot;767&quot;:{&quot;slidesPerView&quot;:1,&quot;slidesPerGroup&quot;:1},&quot;991&quot;:{&quot;slidesPerView&quot;:1,&quot;slidesPerGroup&quot;:1},&quot;1199&quot;:{&quot;slidesPerView&quot;:1,&quot;slidesPerGroup&quot;:1}}}">
													<div class="rtcl-swiper-lazy-preloader">
														<svg class="spinner" viewbox="0 0 50 50">
															<circle class="path" cx="25" cy="25" r="20" fill="none"
																stroke-width="5"></circle>
														</svg>
													</div>
													<div class="swiper-wrapper">

                                                        @if (count($data->adsImage) > 0)

                                                        @foreach ($data->adsImage as $item )
                                                        <div
															class=" swiper-slide-customize text-center listing-item rtcl-listing-item  status-publish  rtcl_category-residential-lands rtcl_location-hawally rtcl_location-al-salam">
                                                            <img loading="lazy"
                                                            decoding="async"
                                                            src="https://admin.alfuraij.com/uploads/ads/{{$item->image}}"
                                                            class="image-viewer rtcl-thumbnail" width="400px" height="800px" alt="{{$item->id}}"
                                                            title="">

														</div>
                                                        @endforeach
                                                        @else
                                                        <div
															class=" swiper-slide-customize text-center listing-item rtcl-listing-item  status-publish  rtcl_category-residential-lands rtcl_location-hawally rtcl_location-al-salam">
                                                            <img loading="lazy"
                                                            decoding="async"
                                                            src="https://admin.alfuraij.com/assets/images/default.jpg"
                                                            class="image-viewer rtcl-thumbnail" width="400px" height="800px" alt="default"
                                                            title="">

														</div>
                                                        @endif



													</div>
												</div> <!-- End wiper-wrapper -->
												<!-- If we need navigation buttons -->
												<span class="rtcl-slider-btn button-left rtcl-icon-angle-left"></span>
												<span class="rtcl-slider-btn button-right rtcl-icon-angle-right"></span>

												<!-- If we need pagination -->
												<div class="rtcl-slider-pagination"></div>
											</div>
										</div>
									</div>
								</div>

                        <div class="rtin-price">
                            <div class="rtcl-price price-type-fixed"><span
                                    class="rtcl-price-amount amount">{{$data->price}}&nbsp;<span
                                        class="rtcl-price-currencySymbol">&#x62f;.&#x643;</span></span></div>
                        </div>

                        <div class="classima-custom-fields-wrap">
                            @if ($currentLocale == 'en')
                            <h3 style="text-align: left; !important" class="entry-title">@lang('lang.overview')</h3>
                            @else
                            <h3 style="text-align: right; !important" class="entry-title">@lang('lang.overview')</h3>
                            @endif
                            <div class="classima-custom-fields clearfix">
                                <ul>
                                    <li>
                                        <span class="rtin-label">@lang('lang.category') </span>
                                        <span class="rtin-title">
                                            <a
                                                href="{{route('home.main')}}?category_id={{$data->category_id}}">
                                                {{app()->getLocale() === 'en' ? $data->category->name_en : $data->category->name_ar}}
                                            </a>
                                        </span>
                                    </li>
                                    @if ($data->space != null)
                                    <li>
                                        <span class="rtin-label">@lang('lang.space') </span>
                                        <span class="rtin-title">{{$data->space}}</span>
                                    </li>
                                    @endif

                                    @if ($data->advantages != null)
                                    <li>
                                        <span class="rtin-label">@lang('lang.features') </span>
                                        <span class="rtin-title">{{$data->advantages}}</span>
                                    </li>
                                    @endif

                                    @if ($data->location != null)
                                    <li>
                                        <span class="rtin-label">: </span>
                                        <span class="rtin-title">{{$data->location}}</span>
                                    </li>
                                    @endif

                                    @if ($data->num_of_rooms != null && $data->num_of_rooms != 0 )
                                    <li>
                                        <span class="rtin-label">@lang('lang.room_num') #: </span>
                                        <span class="rtin-title">{{$data->num_of_rooms}}</span>
                                    </li>
                                    @endif

                                    @if ($data->num_of_bath != null && $data->num_of_bath != 0)
                                    <li>
                                        <span class="rtin-label">@lang('lang.bath_num') #: </span>
                                        <span class="rtin-title">{{$data->num_of_bath}}</span>
                                    </li>
                                    @endif


                                    @if ($data->num_of_apartments != null && $data->num_of_apartments != 0)
                                    <li>
                                        <span class="rtin-label">@lang('lang.num_of_apartments') #: </span>
                                        <span class="rtin-title">{{$data->num_of_apartments}}</span>
                                    </li>
                                    @endif

                                    @if ($data->num_of_floor != null && $data->num_of_floor != 0 )
                                    <li>
                                        <span class="rtin-label">@lang('lang.floor_num') #: </span>
                                        <span class="rtin-title">{{$data->num_of_floor}}</span>
                                    </li>
                                    @endif

                                </ul>
                            </div>
                        </div>

                        @if ($currentLocale == 'en')
                        <div style="text-align: left; !important " class="rtin-content-area">
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <h3 class="">@lang('lang.desc')</h3>
                                    <div class="rtin-content">
                                        <p>{{$data->description}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div style="text-align: right; !important" class="rtin-content-area">
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <h3 class="">@lang('lang.desc')</h3>
                                    <div class="rtin-content">
                                        <p>{{$data->description}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        {{-- @if ($data->advantages != null)
                        <div class="rtin-specs">
                            <h3 class="rtin-specs-title">Features:</h3>
                            <ul class="rtin-spec-items clearfix rtin-list-col-2">
                               @foreach (explode(',',$data->advantages) as $item )
                                     <li>{{$item}}</li>
                               @endforeach
                            </ul>
                        </div>
                        @endif --}}



                        <ul class="list-inline list-group-flush rtcl-single-listing-action">
                            @auth
                            @if (! $data->isFavoriteByUser(auth()->user()->id))
                            <li class="list-inline-item" id="rtcl-favourites"><a onclick="addFavourite({{$data->id}})"
                                class="rtcl-require-login "><span
                                    class="rtcl-icon rtcl-icon-heart-empty"></span><span
                                    class="favourite-label">@lang('lang.add_to_fav')</span></a></li>
                            @endif
                            @endauth



                            {{-- <li class="list-inline-item rtcl-sidebar-social">
                                <span class="rtin-share-title"><i class="fa fa-share-alt"
                                        aria-hidden="true"></i>Share:</span>
                                <a class="facebook"
                                    href="https://www.facebook.com/sharer/sharer.php?u={{route('advertisment.show',$data->id)}}"
                                    target="_blank" rel="nofollow"><span
                                        class="rtcl-icon rtcl-icon-facebook"></span></a>

                                <a class="twitter"
                                    href="https://twitter.com/intent/tweet?text=قسيمة%20للبيع&amp;url={{route('advertisment.show',$data->id)}}"
                                    target="_blank" rel="nofollow"><span
                                        class="rtcl-icon rtcl-icon-twitter"></span></a>

                                <a class="linkedin"
                                    href="https://www.linkedin.com/shareArticle?url={{route('advertisment.show',$data->id)}}&amp;title=قسيمة%20للبيع"
                                    target="_blank" rel="nofollow"><span
                                        class="rtcl-icon rtcl-icon-linkedin"></span></a>


                                <a class="whatsapp"
                                    href="https://wa.me/?text=قسيمة%20للبيع .%2F%2Flisting%2Fgreen-house%2F"
                                    data-action="share/whatsapp/share" target="_blank" rel="nofollow"><i
                                        class="rtcl-icon rtcl-icon-whatsapp"></i></a>

                            </li> --}}
                        </ul>


                        <div class="modal fade" id="rtcl-report-abuse-modal" tabindex="-1" role="dialog"
                            aria-labelledby="rtcl-report-abuse-modal-label">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form id="rtcl-report-abuse-form" class="form-vertical">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="rtcl-report-abuse-modal-label">Report
                                                Abuse</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span
                                                    aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="rtcl-report-abuse-message">Your Complain<span
                                                        class="rtcl-star">*</span></label>
                                                <textarea class="form-control" name="message"
                                                    id="rtcl-report-abuse-message" rows="3"
                                                    placeholder="Message... " required></textarea>
                                            </div>
                                            <div id="rtcl-report-abuse-g-recaptcha"></div>
                                            <div id="rtcl-report-abuse-message-display"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="classima-listing-single-mob classima-listing-single-sidebar sidebar-widget-area ">
                    <div class="content-block-gap"></div>
                    <div class="classified-seller-info widget">
                        <h3 class="widgettitle">@lang('lang.Seller Information')</h3>
                        <div class="rtin-box">

                            <div class="rtin-author">
                                <h4 class="rtin-name">{{$data->user->name}}</h4>
                            </div>


                            <div class="rtin-location rtin-box-item clearfix">
                                <i class="fa fa-fw fa-map-marker" aria-hidden="true"></i>
                                <div class="rtin-box-item-text">
                                    <div>{{app()->getLocale() === 'en' ? $data->area->name_en : $data->area->name_ar}}</div>
                                </div>
                            </div>

                            {{-- <div class="rtin-web rtin-box-item clearfix">
                                <i class="fa fa-fw fa-globe" aria-hidden="true"></i>
                                <a class="rtin-box-item-text" href="{{$data->user->instegram_link}}" rel="nofollow"
                                    target="_blank">
                                    Visit Website </a>
                            </div> --}}



                            {{-- <div class="rtin-box-item rtcl-user-status offline">
                                <span>Offline Now</span>
                            </div> --}}
                            <div class="rtin-phone">
                                <div class="rtcl-contact-reveal-wrapper reveal-phone"
                                    data-options="{&quot;safe_phone&quot;:&quot;{{$data->user->phone}}&quot;,&quot;phone_hidden&quot;:&quot;743&quot;,&quot;safe_whatsapp_number&quot;:&quot;{{$data->user->phone}}&quot;,&quot;whatsapp_hidden&quot;:&quot;743&quot;}">
                                    {{-- <div class="rtcl-contact-reveal-inner">
                                        <div class="numbers">
                                            {{$data->user->phone}} </div>
                                        <small class="text-muted">Click to reveal phone number</small>
                                    </div> --}}
                                </div>
                            </div>


                            <div class="media rtin-chat">
                                <a class="rtcl-chat-link rtcl-no-contact-seller" data-listing_id="2068"
                                    href="{{route('create.chat',$data->id)}}?user_to_id={{$data->user_id}}">
                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                    @lang('lang.chat') </a>
                            </div>



                        </div>
                    </div>
                </div>

                <!-- Business Hours  -->

                <!-- MAP  -->

                <!-- Social Profile  -->

                <div class="content-block-gap"></div>
                <div class="site-content-block classima-single-related owl-wrap">
                    {{-- @if ($currentLocale == 'en')
                    <h3 style="text-align: left; !important" class="entry-title">@lang('lang.overview')</h3>
                    @else
                    <h3 style="text-align: right; !important" class="entry-title">@lang('lang.overview')</h3>
                    @endif --}}
                    @if ($currentLocale == 'en')
                    <div style="text-align: left; !important" class="main-title-block">
                        <h3 class="main-title">@lang('lang.special_ads')</h3>
                        <div class="owl-related-nav owl-custom-nav rtin-custom-nav-31eedb1" style="display: flex; justify-content: space-between;">
                            <div style="text-align: left;" class="owl-next"><i class="fa fa-angle-left"></i></div>
                            <div style="text-align: right;" class="owl-prev"><i class="fa fa-angle-left"></i></div>
                        </div>
                    </div>
                    @else
                    <div style="text-align: right; !important" class="main-title-block">
                        <h3 class="main-title">@lang('lang.special_ads')</h3>
                        <div class="owl-related-nav owl-custom-nav rtin-custom-nav-31eedb1" style="display: flex; justify-content: space-between;">
                            <div style="text-align: left;" class="owl-prev"><i class="fa fa-angle-left"></i></div>
                            <div style="text-align: right;" class="owl-next"><i class="fa fa-angle-right"></i></div>
                        </div>
                    </div>
                    @endif
                    <div class="main-content">
                        <div class="rtcl-carousel-slider"
                            data-options="{&quot;navigation&quot;:{&quot;nextEl&quot;:&quot;.rtin-custom-nav-31eedb1 .owl-next&quot;,&quot;prevEl&quot;:&quot;.rtin-custom-nav-31eedb1 .owl-prev&quot;},&quot;loop&quot;:false,&quot;autoplay&quot;:{&quot;delay&quot;:3000,&quot;disableOnInteraction&quot;:false,&quot;pauseOnMouseEnter&quot;:true},&quot;speed&quot;:1000,&quot;spaceBetween&quot;:20,&quot;breakpoints&quot;:{&quot;0&quot;:{&quot;slidesPerView&quot;:1},&quot;500&quot;:{&quot;slidesPerView&quot;:2},&quot;1200&quot;:{&quot;slidesPerView&quot;:3}}}">
                            <div class="swiper-wrapper">
                                @foreach ($relatedData as $item )
                                <div class="swiper-slide">
                                    <div class="listing-grid-each listing-grid-each-1 rtcl-listing-item">
                                        <div class="rtin-item">
                                            <div class="rtin-thumb">
                                                <a class="rtin-thumb-inner rtcl-media"
                                                    href="{{route('advertisment.show',$item->id)}}"><img
                                                        src="
                                                        @if(count($item->adsImage) == 0)
                                						    https://admin.alfuraij.com/assets/images/default.jpg
                                						@else
                                						    https://admin.alfuraij.com/uploads/ads/{{$item->adsImage[0]->image}}
                                						@endif
                                                        "
                                                        class="rtcl-thumbnail rtcl-fallback-thumbnail"
                                                        alt=" {{$item->title}}" width="400" height="280"></a>
                                                <div class="rtin-type">
                                                    <span>For Sale</span>
                                                </div>
                                            </div>
                                            <div class="rtin-content">

                                                <a class="rtin-cat"
                                                    href="{{route('home.main')}}?category_id={{$item->category_id}}">{{app()->getLocale() === 'en' ? $item->category->name_en : $item->category->name_ar}}</a>

                                                <h3 class="rtin-title listing-title" title=" {{$item->title}}">
                                                    <a
                                                        href="#">بيت
                                                        {{$item->title}}</a></h3>

                                                <div class="rtcl-listing-badge-wrap"></div>

                                                {{-- <div class="rtcl-listable">
                                                    <div class="rtcl-listable-item">
                                                        <span class="listable-label">Land Area</span>
                                                        <span class="listable-value">{{$item->space}}</span>
                                                    </div>
                                                    <div class="rtcl-listable-item">
                                                        <span class="listable-label">Room #</span>
                                                        <span class="listable-value">{{$item->num_of_rooms}}</span>
                                                    </div>
                                                    <div class="rtcl-listable-item">
                                                        <span class="listable-label">Bathrooms #</span>
                                                        <span class="listable-value">{{$item->num_of_bath}}</span>
                                                    </div>
                                                    <div class="rtcl-listable-item">
                                                        <span class="listable-label">Features</span>
                                                        <span class="listable-value">{{$item->advantages}}</span>
                                                    </div>
                                                </div> --}}
                                                <ul class="rtin-meta">
                                                    <li>
                                                        <i class="far fa-fw fa-clock" aria-hidden="true"></i>{{\Carbon\Carbon::parse($item->updated_at)->diffForHumans()}}
                                                        days ago
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-fw fa-map-marker"
                                                            aria-hidden="true"></i><a
                                                            href="./../-location/al-assima-kuwait-city/surra/index.html"></a><span
                                                            class="rtcl-delimiter"></span> <a
                                                            href="./../-location/al-assima-kuwait-city/index.html">{{ app()->getLocale() === 'en' ? $item->area->name_en : $item->area->name_ar}}</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-fw fa-eye" aria-hidden="true"></i>{{$item->getViews()}}
                                                        Views
                                                    </li>
                                                </ul>

                                                @if ($item->price != null)
                                                <div class="rtin-price">
                                                    <div class="rtcl-price price-type-regular"><span
                                                            class="rtcl-price-amount amount">{{$item->price}}&nbsp;<span
                                                                class="rtcl-price-currencySymbol">&#x62f;.&#x643;</span></span>
                                                    </div>
                                                </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="col-xl-3 col-lg-4 col-sm-12 col-12">
                <aside class="sidebar-widget-area">
                    <div class="classima-listing-single-sidebar ">

                        <div class="rtin-price">
                            <div class="rtcl-price price-type-fixed"><span
                                    class="rtcl-price-amount amount">{{$data->price}}&nbsp;<span
                                        class="rtcl-price-currencySymbol">&#x62f;.&#x643;</span></span></div>
                        </div>

                        <div class="classified-seller-info widget">
                            <h3 class="widgettitle">@lang('lang.Seller Information')</h3>
                            <div class="rtin-box">

                                <div class="rtin-author">
                                    <h4 class="rtin-name">{{$data->user->name}}</h4>
                                </div>


                                <div class="rtin-location rtin-box-item clearfix">
                                    <i class="fa fa-fw fa-map-marker" aria-hidden="true"></i>
                                    <div class="rtin-box-item-text">
                                        <div>{{app()->getLocale() === 'ar' ? $data->category->name_ar : $data->category->name_en }}</div>
                                        <div>{{app()->getLocale() === 'ar' ? $data->area->name_ar : $data->area->name_en }}</div>
                                    </div>
                                </div>

                                {{-- <div class="rtin-web rtin-box-item clearfix">
                                    <i class="fa fa-fw fa-globe" aria-hidden="true"></i>
                                    <a class="rtin-box-item-text" href="{{$data->user->instegram_link}}" rel="nofollow"
                                        target="_blank">
                                        Visit Website </a>
                                </div> --}}



                                {{-- <div class="rtin-box-item rtcl-user-status offline">
                                    <span>Offline Now</span>
                                </div> --}}
                                <div class="rtin-phone">
                                    <div class="rtcl-contact-reveal-wrapper reveal-phone"
                                        data-options="{&quot;safe_phone&quot;:&quot;{{$data->user->phone}}&quot;,&quot;phone_hidden&quot;:&quot;743&quot;,&quot;safe_whatsapp_number&quot;:&quot;{{$data->user->phone}}&quot;,&quot;whatsapp_hidden&quot;:&quot;743&quot;}">
                                        {{-- <div class="rtcl-contact-reveal-inner">
                                            <div class="numbers">
                                                {{$data->user->phone}} </div>
                                            <small class="text-muted">Click to reveal phone number</small>
                                        </div> --}}
                                    </div>
                                </div>

                                <div class="media rtin-chat">
                                    <a class="rtcl-chat-link rtcl-no-contact-seller" data-listing_id="2068"
                                        href="{{route('create.chat',$data->id)}}?user_to_id={{$data->user_id}}">
                                        <i class="fa fa-comments" aria-hidden="true"></i>
                                        @lang('lang.chat') </a>
                                </div>

                                {{-- <div class="media rtin-email">
                                    <a data-toggle="modal" data-target="#classima-mail-to-seller" href="mailto:{{$data->user->email}}">
                                        <i class="fas fa-envelope" aria-hidden="true"></i>
                                        Email to Seller </a>
                                </div> --}}


                            </div>
                        </div>
                        <div class="modal fade" id="classima-mail-to-seller" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" data-hide="0">
                                        <form id="rtcl-contact-form" class="form-vertical">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control"
                                                    id="rtcl-contact-name" placeholder="Name *" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control"
                                                    id="rtcl-contact-email" placeholder="Email *" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="phone" class="form-control"
                                                    id="rtcl-contact-phone" placeholder="Phone">
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" name="message"
                                                    id="rtcl-contact-message" rows="3" placeholder="Message*"
                                                    required></textarea>
                                            </div>

                                            <div id="rtcl-contact-g-recaptcha"></div>
                                            <p id="rtcl-contact-message-display"></p>

                                            <button type="submit" class="btn btn-primary">@lang('lang.save') </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </aside>
            </div>
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
            // $('.image-viewer').ezPlus({
            //     zoomType: 'inner',
            //     cursor: 'crosshair'
            // });
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
