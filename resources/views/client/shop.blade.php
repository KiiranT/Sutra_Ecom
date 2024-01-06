@extends('layouts.client')

@section('title', 'Munal Stores')

@section('style')
    <style>
        .category_box {
            display: flex;
            width: 1140px;
            height: 63.5px;
            padding: 3px 350.7px 3px 350.69px;
            justify-content: center;
            align-items: flex-start;
            gap: 0px 20px;
            flex-shrink: 0;
            border-radius: 5px;
            background: #FFF;
        }

        .one_category {
            display: flex;
            width: 82.23px;
            height: 57.5px;
            padding: 14px 0px 13.5px 0px;
            justify-content: center;
            align-items: center;
            flex-shrink: 0;
            border-radius: 3px;
            color: #000;
            text-align: center;
            font-family: Baloo 2;
            font-size: 19px;
            font-style: normal;
            font-weight: 500;
            line-height: 28.5px;
            cursor: pointer;
        }

        .one_category.active {
            background: #000;
            color: #ffffff
        }
    </style>
@endsection

@section('main-content')
    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <div class="category_box">
                        <p class="one_category active">All</p>
                        {{-- Display all parent categories --}}
                        @foreach ($parent_categories as $category)
                            <p class="one_category">{{ $category['title'] }}</p> {{-- Adjust this according to your array structure --}}
                        @endforeach
                </div>
            </div>
            <div class="row">
                @foreach ($all_products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="box">
                            <a href="{{ $product['url'] }}"> {{-- Adjust this according to your array structure --}}
                                <div class="img-box">
                                    <img src="{{ asset('uploads/product/' . $product->image) }}" alt=""
                                        class="" style="max-width: 100%; height: auto;">
                                </div>
                                <div class="detail-box"
                                    style="background: #f0f0f0; padding: 15px; height: 68px; display: flex; align-items: center">
                                    <h6>
                                        {{ $product->title }}
                                    </h6>
                                    <h6>
                                        <span>
                                            Rs {{ $product->price }}
                                        </span>
                                    </h6>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="btn-box">
                <a href="">View All Products</a> {{-- Adjust this according to your needs --}}
            </div>
        </div>
    </section>
@endsection
