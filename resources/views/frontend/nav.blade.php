<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Doanh Mục</span>
                    </div>
                    <ul>
                        @foreach($nhomsanpham as $value)
                            <li><a href="{{route('frontend.sanpham.nhomsanpham',['tennhom_slug'=>$value->tennhom_slug])}}">{{$value->tennhom}}</a></li>
                        @endforeach
                       
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="{{route('frontend.timkiem')}}">
                             @csrf
                            <input type="text" name="key" placeholder="Bạn cần tìm gì ?">
                            <button type="submit" class="site-btn">Tìm Kiếm</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+84 328 789 376</h5>
                            <span>Hỗ Trợ 24/7</span>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>