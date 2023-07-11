<ul class="nav nav-tabs nav-bordered mb-3">

    @foreach(LaravelLocalization::getSupportedLocales() as $iso => $locale)

        <li class="nav-item">
            <a href="#tab-{{ $iso }}" data-toggle="tab" class="nav-link {{ $loop->first ? 'active' : '' }}">
                <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                <span class="d-none d-lg-block">{{ $locale['name'] }}</span>
            </a>
        </li>

    @endforeach

</ul>