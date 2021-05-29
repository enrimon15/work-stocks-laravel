@foreach($items as $item)
    <!--$item->link()==request()->path()-->
    @if(Request::is($item->link()) || Request::is($item->link()."/*") )
        <li class="active">
    @else
        <li>
    @endif
        <a href="{{url($item->link())}}">{{__('mainmenu.'.$item->title)}}<span class="submenu-indicator"></span></a>
    </li>
@endforeach
