<!-- 側邊選單 -->
<div class="col-12 col-lg-2 side-menu mt-5">
    <h1 class="fs-20 mb-3">系所師資</h1>
    <nav>
        <a href="{{ route('teacher') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">專任師資</span>
        </a>
        <a href="{{ route('PTteacher') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">兼任師資</span>
        </a>
        <a href="{{ route('relateteacher') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">相關師資</span>
        </a>
        <a href="{{ route('adstaff') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">行政人員</span>
        </a>
        <a href="{{ route('retiredteacher') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">退休人員</span>
        </a>

    </nav>
</div>
