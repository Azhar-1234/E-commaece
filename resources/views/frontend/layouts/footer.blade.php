
<div class="col-12 align-self-end">
    <!-- Footer -->
    <footer class="row">
        <div class="col-12 bg-dark text-white pb-3 pt-5">
            <div class="row">
                <div class="col-lg-2 col-sm-4 text-center text-sm-left mb-sm-0 mb-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="footer-logo">
                             @foreach($header as $headers)
                                <a href='/'>{{$headers->logo_name}}</a>
                            @endforeach
                            </div>
                        </div>
                        <div class="col-12">
                            <address>
                                221B Baker Street<br>
                                London, England
                            </address>
                        </div>
                        <div class="col-12">
                            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-pinterest-p"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-8 text-center text-sm-left mb-sm-0 mb-3">
                    <div class="row">
                        <div class="col-12 text-uppercase">
                            <h4>Who are we?</h4>
                        </div>
                        <div class="col-12 text-justify">
                            @foreach($header as $headers)
                                 <p>{{$headers->footer_about}}</p>
                             @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3 col-5 ml-lg-auto ml-sm-0 ml-auto mb-sm-0 mb-3">
                    <div class="row">
                        <div class="col-12 text-uppercase">
                            <h4>Quick Links</h4>
                        </div>
                        <div class="col-12">
                            <ul class="footer-nav">
                                <li>
                                    <a href="#">Home</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1 col-sm-2 col-4 mr-auto mb-sm-0 mb-3">
                    <div class="row">
                        <div class="col-12 text-uppercase text-underline">
                            <h4>Help</h4>
                        </div>
                        <div class="col-12">
                            <ul class="footer-nav">
                                <li>
                                    <a href="#">FAQs</a>
                                </li>
                                <li>
                                    <a href="#">Shipping</a>
                                </li>
                                <li>
                                    <a href="#">Returns</a>
                                </li>
                                <li>
                                    <a href="#">Track Order</a>
                                </li>
                                <li>
                                    <a href="#">Report Fraud</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 text-center text-sm-left">
                    <div class="row">
                        <div class="col-12 text-uppercase">
                            <h4>Newsletter</h4>
                        </div>
                        <div class="col-12">
                            <form action="#">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter your email..." required>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-outline-light text-uppercase">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer -->
</div>
