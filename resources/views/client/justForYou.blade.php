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

        /* Add any additional styles for displaying search results */
        .product-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }

        .product-image {
            max-width: 100px;
            max-height: 100px;
            margin-right: 10px;
        }
    </style>
@endsection

@section('main-content')
    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <div class="">
                    <h5>Search Results</h5>
                </div>
            </div>

            <div class="row">
                @forelse ($results as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="box">
                            <a href="{{ route('front.single_product', ['id' => $product->id, 'slug' => $product->title]) }}">
                                {{-- Adjust this according to your array structure --}}
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
                @empty
                    <div class="col-12">
                        <p>No results found.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection
