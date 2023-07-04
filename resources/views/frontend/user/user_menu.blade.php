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

        <li class="{{isActiveMenu('investor_fundslist')}}">
            <a href="{{route('investor_fundslist')}}">
                {{__('My Funds')}}
            </a>
        </li>
    @endif
</ul>
