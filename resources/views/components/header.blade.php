<div class="fixed top-0 w-full py-4 px-12 flex justify-between items-center z-30 sticky-header {{request()->routeIs('home') ? '' : 'general-header'}}">
    <div class="min-w-max">
        <a href="{{route('home')}}"><img width="100" src="/img/logo.png" alt=""></a>
    </div>

    <div class="w-full">
        <ul class="flex justify-center">
            <li><a class="inline-block p-4 text-white" href="{{route('properties')}}?type=land">Land</a></li>
            <li><a class="inline-block p-4 text-white" href="{{route('properties')}}?type=villa">{{__('Villa')}}</a></li>
            <li><a class="inline-block p-4 text-white" href="{{route('properties')}}?type=appartment">Apartment</a></li>
            <li><a class="inline-block p-4 text-white" href="{{route('page', 'about-us')}}">About Us</a></li>
            <li><a class="inline-block p-4 text-white" href="{{route('page', 'contact-us')}}">Contact Us</a></li>
        </ul>
    </div>

    <div class="min-w-max mr-10 text-2xl">
        <a class="inline-block mr-5 text-white" href="?currency=usd">$</a>
        <a class="inline-block mr-5 text-white" href="?currency=lira">₺</a>
    </div>

    <div class="min-w-max text-xl text-white">
        <a class="mr-2" href="{{ LaravelLocalization::getLocalizedURL('en') }}">US</a>
        <a href="{{ LaravelLocalization::getLocalizedURL('bn') }}">BN</a>
    </div>
</div>