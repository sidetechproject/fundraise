<div class="places-item hover__box">
    <div class="places-item__thumb hover__box__thumb">
        <a title="{{$place->name}}" href="{{route('fund_detail', $place->slug)}}">
            <img src="{{getImageUrl($place->thumb)}}" alt="{{$place->name}}">
        </a>
    </div>

    <div class="places-item__info">
        <div class="places-item__category">
            @foreach($place['place_types'] as $type)
                <a href="#" title="{{$type->name}}">{{$type->name}}</a>
            @endforeach
        </div>
        <h3>
            <a href="{{route('fund_detail', $place->slug)}}" title="{{$place->name}}">{{$place->name}}</a>
        </h3>
    </div>
</div>
