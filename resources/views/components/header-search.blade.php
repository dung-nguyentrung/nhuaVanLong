
<div class="header-left mr-md-4">
    <a href="" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
    </a>
    <a href="/" class="logo ml-lg-0">
        <img src="{{ asset('assets/images/demos/demo2/logo.png') }}" alt="logo" width="94" height="45" />
    </a>
    <form method="get" action="{{ route('products.search') }}" class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
        <div class="select-box">
            <select id="category" name="category">
                <option value="">Tất cả</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>                    
                @endforeach
            </select>
        </div>
        <input type="text" class="form-control" name="keyword"
            placeholder="Tìm kiếm..." required />
        <button class="btn btn-search" type="submit"><i class="fas fa-search"></i>
        </button>
    </form>
</div>