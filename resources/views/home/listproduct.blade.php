
 <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
                <h2>Featured Product</h2>
            </div>
            <div class="featured__controls">
                <ul>
                    @foreach ($categories as $category)
                        <li class="active" data-filter="*">{{ $category->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    {{-- <h1>{{ count($products) }}  Sản phẩm mới</h1> --}}
    <div class="row featured__filter">
        @foreach ($products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
    
             <div class="featured__item">
                <div class="featured__item__pic set-bg"  data-setbg="/{{ $product->images }}" alt="">
                    
                    <img src="{{ asset($product->image)}}" alt="{{ $product->name }}" class="img-fluid">
                    <ul class="featured__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                        <li><a href="addCart({{ $product->id }})"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                </div>
                <div class="featured__item__text">
                    <h6><a href="#">{{ $product->name }}</a></h6>
                    <h5>{{ $product->price }}</h5>
                    <div class="product-buy">
                        <a href="{{ route('product.detail', $product['id']) }}" class="btn btn-primary">View More</a>
                    </div>
                </div>
                
            </div>
        </div>
        @endforeach
    </div>
</div>