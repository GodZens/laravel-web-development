<!-- 側邊選單 -->
<div class="col-12 col-lg-2 side-menu mt-5">
    <h1 class="fs-20 mb-3">Faculty</h1>
    <nav>
        <a href="{{ route('en_teacher') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Full-time teachers</span>
        </a>
        <a href="{{ route('en_PTteacher') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Part-time teacher</span>
        </a>
        <a href="{{ route('en_relateteacher') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Related teachers</span>
        </a>
        <a href="{{ route('en_adstaff') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">administration staff</span>
        </a>
        <a href="{{ route('en_retiredteacher') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Retirees</span>
        </a>

    </nav>
</div>
