<ul class="menu">
    <li class="sidebar-item">
        <a href="{{route('dashboard')}}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>{{__('dashboard') }}</span>
        </a>
    </li>
    
    <li class="sidebar-item has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-gear-fill"></i>
            <span>{{__('Settings')}}</span>
        </a>
        <ul class="submenu">
            <li class="py-1"><a href="{{route('company.index')}}">{{__('Company Details')}}</a></li>
            <li class="py-1"><a href="{{route('role.index')}}">Role</a></li>
            <li class="submenu-item sidebar-item has-sub"><a href="#" class='sidebar-link'> {{__('User')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route('users.index')}}">{{__('List')}}</a></li>
                    <li class="py-1"><a href="{{route('users.create')}}">{{__('Add New')}}</a></li>
                </ul>
            </li>

            <li class="submenu-item sidebar-item has-sub"><a href="{{route('branch.index')}}" class='sidebar-link'>{{__('Branch')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route('branch.index')}}">{{__('List')}}</a></li>
                    <li class="py-1"><a href="{{route('branch.create')}}">{{__('Add New')}}</a></li>
                </ul>
            </li>
            <li class="submenu-item sidebar-item has-sub"><a href="{{route('warehouse.index')}}" class='sidebar-link'>{{__('Warehouse')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route('warehouse.index')}}">{{__('List')}}</a></li>
                    <li class="py-1"><a href="{{route('warehouse.create')}}">{{__('Add New')}}</a></li>
                </ul>
            </li>
		</ul>
        
    </li>



    <li class="sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-box-fill"></i><span>{{__('Products')}}</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item sidebar-item has-sub"><a href="#" class='sidebar-link'> {{__('Category')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route('category.index')}}">{{__('List')}}</a></li>
                    <li class="py-1"><a href="{{route('category.create')}}">{{__('Add New')}}</a></li>
                </ul>
            </li>
            <li class="submenu-item sidebar-item has-sub"><a href="#" class='sidebar-link'>{{__('Sub Category')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route('subcategory.index')}}">{{__('List')}}</a></li>
                    <li class="py-1"><a href="{{route('subcategory.create')}}">{{__('Add New')}}</a></li>
                </ul>
            </li>
            <li class="submenu-item sidebar-item has-sub"><a href="#" class='sidebar-link'>{{__('Child Category')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route('childcategory.index')}}">{{__('List')}}</a></li>
                    <li class="py-1"><a href="{{route('childcategory.create')}}">{{__('Add New')}}</a></li>
                </ul>
            </li>
            <li class="submenu-item sidebar-item has-sub"><a href="#" class='sidebar-link'>{{__('Brand')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route('brand.index')}}">{{__('List')}}</a></li>
                    <li class="py-1"><a href="{{route('brand.create')}}">{{__('Add New')}}</a></li>
                </ul>
            </li>
            <li class="submenu-item sidebar-item has-sub"><a href="#" class='sidebar-link'>{{__('Size')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route('size.index')}}">{{__('List')}}</a></li>
                    <li class="py-1"><a href="{{route('size.create')}}">{{__('Add New')}}</a></li>
                </ul>
            </li>
            <li class="submenu-item sidebar-item has-sub"><a href="#" class='sidebar-link'>{{__('Color')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route('color.index')}}">{{__('List')}}</a></li>
                    <li class="py-1"><a href="{{route('color.create')}}">{{__('Add New')}}</a></li>
                </ul>
            </li>
            <li class="submenu-item sidebar-item has-sub"><a href="#" class='sidebar-link'>{{__('Products')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route('product.index')}}">{{__('List')}}</a></li>
                    <li class="py-1"><a href="{{route('product.create')}}">{{__('Add New')}}</a></li>
                </ul>
            </li>
            <li><a href="{{route('plabel')}}" >{{__('Product Label')}}</a></li>
		</ul>
        
    </li>
    <li class="sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-box-fill"></i><span>{{__('Online Order')}}</span>
        </a>
        <ul class="submenu">
            <li class="py-1"><a href="{{route('shippingcharge.index')}}"> {{__('Shipping Charge')}}</a></li>
		</ul>        
    </li>

    <li class="sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-cart-plus-fill"></i><span>{{__('Purchases')}}</span></a>
        <ul class="submenu">
            <li class="py-1"><a href="{{route('purchase.index')}}">{{__('List')}}</a></li>
            <li class="py-1"><a href="{{route('purchase.create')}}">{{__('Add New')}}</a></li>
		</ul>   
    </li>

    <li class="sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-cart-fill"></i><span>{{__('Sales')}}</span></a>
        <ul class="submenu">
            <li class="py-1"><a href="{{route('sales.index')}}">{{__('List')}}</a></li>
            <li class="py-1"><a href="{{route('sales.create')}}">{{__('Add New')}}</a></li>
		</ul>   
    </li>

    
    <li class="sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-sign-turn-right-fill"></i><span>{{__('Transfer')}}</span></a>
        {{-- <ul class="submenu">
            <li class="py-1"><a href="{{route('transfer.index')}}">{{__('Transfer list')}}</a></li>
            <li class="py-1"><a href="{{route('transfer.create')}}">{{__('Transfer')}}</a></li>
		</ul>    --}}
    </li>

    <li class="sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-people-fill"></i><span>{{__('Supplier')}}</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item sidebar-item has-sub"><a href="#" class='sidebar-link'> {{__('Supplier')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route('supplier.index')}}">{{__('List')}}</a></li>
                    <li class="py-1"><a href="{{route('supplier.create')}}">{{__('Add New')}}</a></li>
                </ul>
            </li>
            
		</ul>
        
    </li>


    <li class="sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-people-fill"></i><span>{{__('Customer')}}</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item sidebar-item has-sub"><a href="#" class='sidebar-link'> {{__('Customer')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route('customer.index')}}">{{__('List')}}</a></li>
                    <li class="py-1"><a href="{{route('customer.create')}}">{{__('Add New')}}</a></li>
                </ul>
            </li>
            
		</ul>
        
    </li>

    {{-- <li class="sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-calculator"></i><span>{{__('Accounts')}}</span>
        </a>
        <ul class="submenu">
            <li class="py-1"><a href="{{route('master.index')}}" >{{__('Master Head')}}</a></li>
            <li class="py-1"><a href="{{route('sub_head.index')}}" >{{__('Sub Head')}}</a></li>
            <li class="py-1"><a href="{{route('child_one.index')}}" >{{__('Child One')}}</a></li>
            <li class="py-1"><a href="{{route('child_two.index')}}" >{{__('Child Two')}}</a></li>
            <li class="py-1"><a href="{{route('navigate.index')}}">{{__('Navigate View')}}</a></li>
            <li class="py-1"><a href="{{route('incomeStatement')}}">{{__('Income Statement')}}</a></li>
            
            <li class="submenu-item sidebar-item has-sub"><a href="#" class='sidebar-link'>{{__('Voucher')}}</a>
                <ul class="submenu">
                    <li class="py-1"><a href="{{route('credit.index')}}">{{__('Credit Voucher')}}</a></li>
                    <li class="py-1"><a href="{{route('debit.index')}}">{{__('Debit Voucher')}}</a></li>
                    <li class="py-1"><a href="{{route('journal.index')}}">{{__('Journal Voucher')}}</a></li>
                </ul>
            </li>
		</ul>
        
    </li> --}}

    <li class="sidebar-item has-sub">
        <a href="#" class='sidebar-link'><i class="bi bi-card-checklist"></i><span>{{__('Report')}}</span>
        </a>
        {{-- <ul class="submenu">
            <li class="py-1"><a href="{{route('preport')}}" >{{__('Purchase Report')}}</a></li>
            <li class="py-1"><a href="{{route('sreport')}}" >{{__('Stock Report')}}</a></li>
            <li class="py-1"><a href="{{route('salreport')}}" >{{__('Sales Report')}}</a></li>
		</ul>
         --}}
    </li>
</ul>