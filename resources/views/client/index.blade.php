@extends('layouts.client')

@section('title', 'Munal Stores')
@section('style')
    <style>
        .box {
            height: 300px;
            /* Set a fixed height for the product boxes */
            margin-bottom: 20px;
            /* Add margin between product boxes */
            position: relative;
            overflow: hidden;
        }

        .box img {
            max-height: 100%;
            width: auto;
            display: block;
            margin: 0 auto;
        }

        .detail-box {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.8);
            /* Semi-transparent white background */
            padding: 10px;
            box-sizing: border-box;
        }

        .detail-box h6 {
            margin: 0;
        }
    </style>
@endsection

@section('main-content')
    <!-- slider section -->

    <section class="slider_section">
        <div class="slider_container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="5000">
                <div class="carousel-inner">
                    @if (isset($banner_list) && count($banner_list) > 0)
                        @foreach ($banner_list as $key => $banner_data)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img class="d-block w-100" src="{{ asset('uploads/banner/Thumb-' . $banner_data->image) }}"
                                    alt="{{ $banner_data->title }}">
                            </div>
                        @endforeach
                    @endif
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>



    <!-- end slider section -->

    <!-- shop section -->

    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Latest Sale
                </h2>
            </div>
            <div id="latestProductCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" id="latestCarouselInner">
                    <!-- Carousel items will be dynamically added here -->
                </div>
                <a class="carousel-control-prev" href="#latestProductCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#latestProductCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <script>
                // Sample product data
                var latestProducts = [
                    @foreach ($latest_product_list as $product)
                        {
                            name: "{{ $product->title }}",
                            price: "{{ $product->price }}",
                            image: "{{ asset('uploads/product/' . $product->image) }}"
                        },
                    @endforeach
                ];

                var latestCarouselInner = document.getElementById("latestCarouselInner");

                // Display products in groups of 4 per carousel item
                for (var i = 0; i < latestProducts.length; i += 4) {
                    var carouselItem = document.createElement("div");
                    carouselItem.classList.add("carousel-item");

                    if (i === 0) {
                        carouselItem.classList.add("active"); // Add "active" to the first carousel item
                    }

                    var row = document.createElement("div");
                    row.classList.add("row");

                    // Display up to 4 products in each carousel item
                    for (var j = i; j < i + 4 && j < latestProducts.length; j++) {
                        var product = latestProducts[j];

                        var productColumn = document.createElement("div");
                        productColumn.classList.add("col-sm-6", "col-md-4", "col-lg-3");

                        var productBox = document.createElement("div");
                        productBox.classList.add("box");

                        productBox.innerHTML = `
                            <a href="#placeholder-url">
                                <div>
                                    <img src="${product.image}" alt="${product.name}" style="max-width: 100%; height: auto;">
                                </div>
                                <div class="detail-box">
                                    <h6>${product.name}</h6>
                                    <h6>Rs <span>${product.price}</span></h6>
                                </div>
                                <div class="new" style='background: red; color: white'>
                                    <span>Sale</span>
                                </div>
                            </a>
                        `;

                        productColumn.appendChild(productBox);
                        row.appendChild(productColumn);
                    }

                    carouselItem.appendChild(row);
                    latestCarouselInner.appendChild(carouselItem);
                }
            </script>

            <div class="btn-box">
                <a href="">
                    View All Products
                </a>
            </div>
        </div>
    </section>

    <section class="shop_section layout_padding" style="padding-top: 0px">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Just For You
                </h2>
            </div>
            <div id="seasonalProductCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" id="seasonalCarouselInner">
                    <!-- Carousel items will be dynamically added here -->
                </div>
                <a class="carousel-control-prev" href="#seasonalProductCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#seasonalProductCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <script>
                var for_you_product = [
                    @foreach ($for_you_product_list as $product)
                        {
                            name: "{{ $product->title }}",
                            price: "{{ $product->price }}",
                            image: "{{ asset('uploads/product/' . $product->image) }}"
                        },
                    @endforeach
                ];

                var seasonalCarouselInner = document.getElementById("seasonalCarouselInner");

                // Display products in groups of 4 per carousel item
                for (var i = 0; i < for_you_product.length; i += 4) {
                    var carouselItem = document.createElement("div");
                    carouselItem.classList.add("carousel-item");

                    if (i === 0) {
                        carouselItem.classList.add("active"); // Add "active" to the first carousel item
                    }

                    var row = document.createElement("div");
                    row.classList.add("row");

                    // Display up to 4 products in each carousel item
                    for (var j = i; j < i + 4 && j < for_you_product.length; j++) {
                        var product = for_you_product[j];

                        var productColumn = document.createElement("div");
                        productColumn.classList.add("col-sm-6", "col-md-4", "col-lg-3");

                        var productBox = document.createElement("div");
                        productBox.classList.add("box");

                        productBox.innerHTML = `
                            <a href="#placeholder-url">
                                <div>
                                    <img src="${product.image}" alt="${product.name}" style="max-width: 100%; height: auto;">
                                </div>
                                <div class="detail-box">
                                    <h6>${product.name}</h6>
                                    <h6>Price Rs <span>${product.price}</span></h6>
                                </div>
                            </a>
                        `;

                        productColumn.appendChild(productBox);
                        row.appendChild(productColumn);
                    }

                    carouselItem.appendChild(row);
                    seasonalCarouselInner.appendChild(carouselItem);
                }
            </script>

            <div class="btn-box">
                <a href="#placeholder-url">
                    View All Products
                </a>
            </div>
        </div>
    </section>


    <!-- end shop section -->

@endsection
