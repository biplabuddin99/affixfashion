<ul class="menu">
    <li class="sidebar-item">
        <a href="{{route(currentUser().'.dashboard')}}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>{{__('dashboard') }}</span>
        </a>
    </li>
    <li class="sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-cart-fill"></i><span>{{__('Sales')}}</span></a>
        <ul class="submenu">
            <li class="py-1"><a href="{{route(currentUser().'.sales.index')}}">{{__('List')}}</a></li>
            <li class="py-1"><a href="{{route(currentUser().'.sales.create')}}">{{__('Add New')}}</a></li>
		</ul>   
    </li>
    <li class="sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-people-fill"></i><span>{{__('Customer')}}</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item sidebar-item has-sub"><a href="#" class='sidebar-link'> {{__('Customer')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route(currentUser().'.customer.index')}}">{{__('List')}}</a></li>
                    <li class="py-1"><a href="{{route(currentUser().'.customer.create')}}">{{__('Add New')}}</a></li>
                </ul>
            </li>
            
		</ul>       
    </li>

</ul>