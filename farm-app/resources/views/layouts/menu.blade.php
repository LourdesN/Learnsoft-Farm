<!-- need to remove -->
 <style>
    .nav-link {
        font-size:16px;
        font-family: Georgia;
    }
 </style>
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('crop.crops.index') }}" class="nav-link {{ Request::is('crop/crops*') ? 'active' : '' }}">
    <i class="fas fa-solid fa-seedling"></i>
        <p>Crops</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('crop.cropCategories.index') }}" class="nav-link {{ Request::is('crop/crop-categories*') ? 'active' : '' }}">
    <i class="fas fa-solid fa-leaf"></i>
        <p>Crop Categories</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('crop.storages.index') }}" class="nav-link {{ Request::is('crop/storages*') ? 'active' : '' }}">
    <i class="fas fa-boxes"></i>
        <p>Storages</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('crop.storedCrops.index') }}" class="nav-link {{ Request::is('crop/stored-crops*') ? 'active' : '' }}">
    <i class="fab fa-pagelines"></i>
        <p>Stored Crops</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('crop.customers.index') }}" class="nav-link {{ Request::is('crop/customers*') ? 'active' : '' }}">
    <i class="fas fa-solid fa-users"></i>
        <p>Customers</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('crop.sales.index') }}" class="nav-link {{ Request::is('crop/sales*') ? 'active' : '' }}">
    <i class="fas fa-file-invoice-dollar"></i>
        <p>Sales</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('crop.revenues.index') }}" class="nav-link {{ Request::is('crop/revenues*') ? 'active' : '' }}">
    <i class="fas fa-file-invoice"></i>
        <p>Revenues</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('crop.expenseCategories.index') }}" class="nav-link {{ Request::is('crop/expense_-categories*') ? 'active' : '' }}">
    <i class="fas fa-receipt"></i>
        <p>Expense  Categories</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('crop.expenses.index') }}" class="nav-link {{ Request::is('crop/expenses*') ? 'active' : '' }}">
    <i class="fas fa-solid fa-money-bill-wave"></i>
        <p>Expenses</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('crop.suppliers.index') }}" class="nav-link {{ Request::is('crop/suppliers*') ? 'active' : '' }}">
    <i class="fas fa-user-friends"></i>
        <p>Suppliers</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('crop.purchases.index') }}" class="nav-link {{ Request::is('crop/purchases*') ? 'active' : '' }}">
    <i class="far fa-credit-card"></i>
        <p>Purchases</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('crop.stocks.index') }}" class="nav-link {{ Request::is('crop/stocks*') ? 'active' : '' }}">
     <i class="fas fa-pallet"></i>
        <p>Stock</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('crop.harvests.index') }}" class="nav-link {{ Request::is('crop/harvests*') ? 'active' : '' }}">
    <i class="fas fa-solid fa-tractor"></i>
        <p>Harvests</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('crop.fertilizerApplications.index') }}" class="nav-link {{ Request::is('crop/fertilizer-applications*') ? 'active' : '' }}">
    <i class="fas fa-warehouse"></i>
        <p>Fertilizer Applications</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('crop.pesticideApplications.index') }}" class="nav-link {{ Request::is('crop/pesticide-applications*') ? 'active' : '' }}">
    <i class="fas fa-spray-can"></i>
        <p>Pesticide Applications</p>
    </a>
</li>


