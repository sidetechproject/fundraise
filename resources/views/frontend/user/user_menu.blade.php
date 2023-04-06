<ul>
    <li class="{{isActiveMenu('user_profile')}}">
        <a href="{{route('user_profile')}}">
            {{__('Profile')}}
        </a>
    </li>

    @if(isUserInvestor())
        <li class="{{isActiveMenu('user_wishlist')}}">
            <a href="{{route('user_wishlist')}}">
                {{__('My Startups')}}
            </a>
        </li>
    @endif
</ul>
