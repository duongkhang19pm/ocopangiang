<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Doanh Mục </span>
                    </div>
                    <ul>
                        @foreach($nhomsanpham as $value)
                            <li><a href="{{route('frontend.sanpham.nhomsanpham',['tennhom_slug'=>$value->tennhom_slug])}}">{{$value->tennhom}}</a></li>
                        @endforeach
                       
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                    <div class="hero__search__form " style="width: 500px;">
                        <form  >
                       
                            <input type="search" name="q" class="search-input" style="width: 500px;" placeholder="Bạn tìm gì ..." >
                            
                            
                        </form>  
                                       
                    </div>
                    <div class="input-group-append" style="height: 50px;"> 
                        <span class="site-btn" id="basic-addon2"><i class="fas fa-search"></i></span>
                    </div>
                <div class="hero__search">
                   
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap JS -->

    <!-- Typeahead.js Bundle -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
       <script type="text/javascript">
           $(document).ready(function($) {
              var engine1 = new Bloodhound({
                  remote: {
                      url: 'http://127.0.0.1/ocopangiang/search/tensanpham?value=%QUERY%',
                      wildcard: '%QUERY%'
                  },
                  datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
                  queryTokenizer: Bloodhound.tokenizers.whitespace
              });

              
              $(".search-input").typeahead({
                  hint: true,
                  highlight: true,
                  minLength: 1
                }, [
                    {
                        source: engine1.ttAdapter(),
                        name: 'sanpham-tensanpham',
                        display: function(data) {
                            
                            return data.tensanpham;

                        },
                       
                        templates: {

                            empty: [
                               '<div class="list-group"><a class="list-group-item list-group-item-action list-group-item-light" style="width: 600px;">Không có kết quả phù hợp.</a></div>'
                            ],
                           header: [
                            '<div class="list-group  " ><li class="list-group-item list-group-item-action list-group-item-secondary">Sản phẩm gợi ý</li></div>'
                            ],
                            suggestion: function (data) {
                                return '<a href="http://127.0.0.1/ocopangiang/san-pham/' +  data.tennhom_slug+'/'+data.tenloai_slug+'/'+data.tensanpham_slug+ '" class="list-group-item list-group-item-action list-group-item-light" style="width: 600px;"><div class="row"><div class="col-md-2"><img src="http://localhost/ocopangiang/storage/app/'+ data.hinhanh +'" width="70" height="80" alt=""></div><div class="col-md-4"> ' + data.tensanpham + ' </br><small>'+data.dongia+' <sup>VNĐ</sup></small></div></div></a>';
                            }
                        }
                    }
              ]);
            });

      </script>