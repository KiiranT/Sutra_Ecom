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
                    <p class="one_category active" data-category-id="all">All</p>
                    {{-- Display all parent categories --}}
                    @foreach ($parent_categories as $category)
                        <p class="one_category" data-category-id="{{ $category['id'] }}">{{ $category['title'] }}</p>
                    @endforeach
                </div>
            </div>
            <div class="row category_row">
                @include('client.category_product')
               

            </div>
            {{-- <div class="btn-box">
                <a href="">View All Products</a>
            </div> --}}
        </div>
    </section>
@endsection

@section('scripts')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <script>
        $('.one_category').click(function(event) {
            event.preventDefault();
            console.log("Category clicked!");

            // Remove the active class from all categories
            $('.one_category').removeClass('active');

            // Add the active class to the clicked category
            $(this).addClass('active');

            var categoryId = $(this).data('category-id');
            console.log("Category ID:", categoryId);

            $.ajax({
                url: '/shop/' + categoryId,
                type: 'GET',
                success: function(data) {
                    // Uncomment the following line once you confirm the data structure
                    $('.category_row').html(data);
                },
                error: function(error) {
                    console.error('Error fetching products:', error);
                }
            });
        });
    </script>
@endsection
