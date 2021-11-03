<!-- ============================ Footer Start ================================== -->
<footer class="dark-footer skin-dark-footer">
    <div>
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-3">
                    <div class="footer-widget">
                        <img src="{{asset('storage/' . cache('footer')->logo)}}" class="img-footer" alt="" />
                        <div class="footer-add">
                            <p>{{cache('footer')->address}}</p>
                            <p><strong>{{__('footer.email')}}:</strong></br><a href="mailto:{{cache('footer')->email}}">{{cache('footer')->email}}</a></p>
                            <p><strong>{{__('footer.phone')}}:</strong></br>{{cache('footer')->phone}}</p>
                        </div>

                    </div>
                </div>
                @foreach(cache('footer')->footerMenus()->where('active', true)->limit(4)->get() as $footerMenu)
                    <div class="col-lg-2 col-md-2">
                        <div class="footer-widget">
                            <h4 class="widget-title">{{Lang::locale() == 'en' ? $footerMenu->title_en : $footerMenu->title_it}}</h4>
                            <ul class="footer-menu">
                                @foreach($footerMenu->footerMenuItems()->limit(5)->get() as $item)
                                    <li><a href="{{route('footer', ['idPage' => $item->id])}}">{{Lang::locale() == 'en' ?  $item->title_en : $item->title_it}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach

                {{--<div class="col-lg-3 col-md-3">--}}
                    {{--<div class="footer-widget">--}}
                        {{--<h4 class="widget-title">Download Apps</h4>--}}
                        {{--<a href="#" class="other-store-link">--}}
                            {{--<div class="other-store-app">--}}
                                {{--<div class="os-app-icon">--}}
                                    {{--<i class="ti-android theme-cl"></i>--}}
                                {{--</div>--}}
                                {{--<div class="os-app-caps">--}}
                                    {{--Google Play--}}
                                    {{--<span>Get It Now</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                        {{--<a href="#" class="other-store-link">--}}
                            {{--<div class="other-store-app">--}}
                                {{--<div class="os-app-icon">--}}
                                    {{--<i class="ti-apple theme-cl"></i>--}}
                                {{--</div>--}}
                                {{--<div class="os-app-caps">--}}
                                    {{--App Store--}}
                                    {{--<span>Now it Available</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 col-md-6">
                    <p class="mb-0">© 2021 Work Stocks. Designed By Enrico Monte & Marco Ovidi</p>
                </div>

                <!--<div class="col-lg-6 col-md-6 text-right">
                    <ul class="footer-bottom-social">
                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                        <li><a href="#"><i class="ti-twitter"></i></a></li>
                        <li><a href="#"><i class="ti-instagram"></i></a></li>
                        <li><a href="#"><i class="ti-linkedin"></i></a></li>
                    </ul>
                </div>-->

            </div>
        </div>
    </div>
</footer>
<!-- ============================ Footer End ================================== -->