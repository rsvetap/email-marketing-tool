<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                {{ date("Y") }} © {{ config('app.name') }} - {{ request()->getHost() }}
            </div>
            <div class="col-md-6">
                <div class="text-md-right footer-links d-none d-md-block">
                    <a href="#">About</a>
                    <a href="">Support</a>
                    <a href="">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</footer>