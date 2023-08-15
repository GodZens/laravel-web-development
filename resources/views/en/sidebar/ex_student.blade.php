<!-- 側邊選單 -->
<div class="col-12 col-lg-2 side-menu mt-5">
    <h1 class="fs-20 mb-3">International exchange student</h1>
    <nav>
        <a href="{{ route('en_ex_student') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Petition form</span>
        </a>
        <a href="{{ route('en_ex_activity') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">activity photos</span>
        </a>
        <a href="{{ route('en_ex_abroad', ['year' => date('Y')-1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Exchange abroad</span>
        </a>
        <a href="{{ route('en_ex_department', ['year' => date('Y')-1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Exchange to this department</span>
        </a>
        <a href="{{ route('en_ex_report', ['country' => '日本']) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Exchange Learning Experience Report</span>
        </a>
    </nav>
</div>
