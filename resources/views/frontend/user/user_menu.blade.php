<ul>
    <li class="{{isActiveMenu('user_profile')}}">
        <a href="{{route('user_profile')}}">
            {{__('Profile')}}
        </a>
    </li>

    @if(user()->profile == 2)
    <li class="{{isActiveMenu('user_wishlist')}}">
        <a href="{{route('user_wishlist')}}">
            {{__('My Startups')}}
        </a>
    </li>
    @else
        <li class="{{isActiveMenu('user_my_place')}}">
            <a href="{{route('user_my_place')}}">
                {{__('Startups')}}
            </a>
        </li>
    @endif
</ul>
