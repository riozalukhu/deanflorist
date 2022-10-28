@extends('layouts.guest.master')
@section('title', 'Home')
@section('content')
    <!-- Slider/Intro Section Start -->
    <div class="intro11-slider-wrap section">
        <div class="intro11-slider swiper-container">
            <div class="swiper-wrapper">
                @foreach ($sliders as $item)
                    <div class="intro11-section swiper-slide slide-bg-1 bg-position"
                        style="background-image: url({{ asset('images/slider/' . $item->image) }}); background-color: rgba(215, 177, 190,
                        0.9);">
                        <!-- Intro Content Start -->
                        <div class="intro11-content text-left">
                            <h3 class="title-slider text-uppercase">Top Trend</h3>
                            <h2 class="title">{{ $item->title }}</h2>
                            <p class="desc-content">{{ $item->description }}</p>
                        </div>
                        <!-- Intro Content End -->
                    </div>
                @endforeach
            </div>
            <!-- Slider Navigation -->
            <div class="home1-slider-prev swiper-button-prev main-slider-nav"><i class="lnr lnr-arrow-left"></i></div>
            <div class="home1-slider-next swiper-button-next main-slider-nav"><i class="lnr lnr-arrow-right"></i></div>
            <!-- Slider pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- Slider/Intro Section End -->
    <!--Product Area Start-->
    <div class="product-area mt-text-2">
        <div class="container custom-area-2 overflow-hidden">
            <div class="row">
                <!--Section Title Start-->
                <div class="col-12 col-custom">
                    <div class="section-title text-center mb-30">
                        <span class="section-title-1">Wonderful gift</span>
                        <h3 class="section-title-3">Featured Products</h3>
                    </div>
                </div>
                <!--Section Title End-->
            </div>
            <div class="row product-row">
                <div class="col-12 col-custom">
                    <div class="product-slider swiper-container anime-element-multi">
                        <div class="swiper-wrapper">
                            @php $i = 1; @endphp
                            @foreach ($galleries as $item)
                                {{-- jika item adalah index ganjil maka buat row baru --}}
                                @if ($i % 2 == 1)
                                    <div class="single-item swiper-slide">
                                @endif
                                <!--Single Product Start-->
                                <div class="single-product position-relative mb-30">
                                    <div class="product-image">
                                        <span class="d-block">
                                            <img src="{{ asset('images/gallery/' . $item->image) }}" alt=""
                                                class="product-image-1 w-100">
                                        </span>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title-2">
                                                <span>{{ $item->title }}</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <!--Single Product End-->
                                @if ($i % 2 == 0)
                        </div>
                        @endif
                        @php $i++; @endphp
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Slider pagination -->
            <div class="swiper-pagination default-pagination"></div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!--Product Area End-->
@endsection
