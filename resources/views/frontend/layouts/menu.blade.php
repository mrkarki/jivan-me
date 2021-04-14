{{--
<li class="{{ (request()->is('admin/category*')) ? 'active' : '' }}">
    <a href="#" aria-expanded="false">
        <i class="fa fa-bar-chart-o"></i> <span class="nav-label">Category </span><span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
        <li class="{{ (request()->is('admin/category')) ? 'active' : '' }}"><a href="{{ route('admin.category.index') }}">List</a></li>
        <li class="{{ (request()->is('admin/category/create')) ? 'active' : '' }}"><a href="{{ route('admin.category.create') }}">Add</a></li>
    </ul>
</li> --}}

<li class="">
    <a href="#" aria-expanded="false">
        <i class="fas fa-tachometer-alt"></i> <span class="nav-label">Dashboard </span>
    </a>
</li>

<li class="">
    <a href="#" aria-expanded="false">
        <i class="fas fa-cog"></i> <span class="nav-label">Settings</span>
    </a>

</li>
<li class="">
    <a href="#" aria-expanded="false">
        <i class="far fa-file-alt"></i> <span class="nav-label">Pages </span>
    </a>

</li>
<li class="">
    <a href="#" aria-expanded="false">
        <i class="fas fa-shopping-cart"></i> <span class="nav-label">Orders </span>
    </a>

</li>

<li class="{{ (request()->is('admin/product*')) ? 'active' : '' }}">
    <a href="#" aria-expanded="false">
        <i class="fas fa-cubes"></i> <span class="nav-label">Products</span><span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
        <li class="{{ (request()->is('admin/product')) ? 'active' : '' }}"><a href="{{ route('admin.product.index') }}">List</a></li>
        <li class="{{ (request()->is('admin/product/create')) ? 'active' : '' }}"><a href="{{ route('admin.product.create') }}">Add</a></li>
    </ul>
</li>

<li class="{{ (request()->is('admin/category*')) ? 'active' : '' }}">
    <a href="#" aria-expanded="false">
        <i class="fas fa-sitemap"></i> <span class="nav-label">Category </span><span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
        <li class="{{ (request()->is('admin/category')) ? 'active' : '' }}"><a href="{{ route('admin.category.index') }}">List</a></li>
        <li class="{{ (request()->is('admin/category/create')) ? 'active' : '' }}"><a href="{{ route('admin.category.create') }}">Add</a></li>
    </ul>
</li>
<li class="{{ (request()->is('admin/tag*')) ? 'active' : '' }}">
    <a href="#" aria-expanded="false">
        <i class="fas fa-tags"></i> <span class="nav-label">Tags </span><span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
        <li class="{{ (request()->is('admin/tag')) ? 'active' : '' }}"><a href="{{ route('admin.tag.index') }}">List</a></li>
        <li class="{{ (request()->is('admin/tag/create')) ? 'active' : '' }}"><a href="{{ route('admin.tag.create') }}">Add</a></li>
    </ul>
</li>
<li class="{{ (request()->is('admin/brand*')) ? 'active' : '' }}">
    <a href="#" aria-expanded="false">
        <i class="fas fa-tags"></i> <span class="nav-label">Brands</span><span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
        <li class="{{ (request()->is('admin/brand')) ? 'active' : '' }}"><a href="{{ route('admin.tag.index') }}">List</a></li>
        <li class="{{ (request()->is('admin/brad/create')) ? 'active' : '' }}"><a href="{{ route('admin.tag.create') }}">Add</a></li>
    </ul>
</li>
<li class="{{ (request()->is('admin/user*')) ? 'active' : '' }}">
    <a href="#" aria-expanded="false">
        <i class="fas fa-users"></i> <span class="nav-label">User </span><span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
        <li class="{{ (request()->is('admin/user')) ? 'active' : '' }}"><a href="{{ route('admin.user.index') }}">List</a></li>
        <li class="{{ (request()->is('admin/user/create')) ? 'active' : '' }}"><a href="{{ route('admin.user.create') }}">Add</a></li>
    </ul>
</li>
