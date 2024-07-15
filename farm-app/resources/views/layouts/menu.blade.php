<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('crops.index') }}" class="nav-link {{ Request::is('crops*') ? 'active' : '' }}">
    <i class="fas fa-solid fa-seedling"></i>
        <p>Crops</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('crop_categories.index') }}" class="nav-link {{ Request::is('crop_categories*') ? 'active' : '' }}">
    <i class="fas fa-solid fa-leaf"></i>
        <p>Crop Categories</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('customers.index') }}" class="nav-link {{ Request::is('customers*') ? 'active' : '' }}">
    <i class="fas fa-solid fa-users"></i>
        <p>Customers</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('expenses.index') }}" class="nav-link {{ Request::is('expenses*') ? 'active' : '' }}">
    <i class="fas fa-solid fa-money-bill-wave"></i>
        <p>Expenses</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('harvests.index') }}" class="nav-link {{ Request::is('harvests*') ? 'active' : '' }}">
    <i class="fas fa-solid fa-tractor"></i>
        <p>Harvest</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('suppliers.index') }}" class="nav-link {{ Request::is('suppliers*') ? 'active' : '' }}">
    <i class="fas fa-user-friends"></i>
        <p>Suppliers</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('fertilizer_applications.index') }}" class="nav-link {{ Request::is('fertilizer_applications*') ? 'active' : '' }}">
    <i class="fas fa-warehouse"></i>
        <p>Fertilizer Application</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('pesticide_applications.index') }}" class="nav-link {{ Request::is('pesticide_applications*') ? 'active' : '' }}">
    <i class="fas fa-spray-can"></i>
        <p>Pesticide Application</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('stocks.index') }}" class="nav-link {{ Request::is('stocks*') ? 'active' : '' }}">
    <i class="fas fa-pallet"></i>
        <p>Stock</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('storages.index') }}" class="nav-link {{ Request::is('storages*') ? 'active' : '' }}">
    <i class="fas fa-boxes"></i>
        <p>Storage</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('stored_crops.index') }}" class="nav-link {{ Request::is('stored_crops*') ? 'active' : '' }}">
    <i class="fab fa-pagelines"></i>
        <p>Stored Crops</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('sales.index') }}" class="nav-link {{ Request::is('sales*') ? 'active' : '' }}">
    <i class="fas fa-file-invoice-dollar"></i>
        <p>Sales</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('revenues.index') }}" class="nav-link {{ Request::is('revenues*') ? 'active' : '' }}">
    <i class="fas fa-file-invoice"></i>
        <p>Revenue</p>
    </a>
</li>