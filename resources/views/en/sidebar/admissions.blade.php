<!-- 側邊選單 -->
<div class="col-12 col-lg-2 side-menu mt-5">
    <h1 class="fs-20 mb-3">Admissions</h1>
    <nav>
        <a href="{{ route('en_admissions', ['year' => '111學年度四技二專「甄選入學」招生選才內涵- 外語群英語類']) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">University Department</span>
        </a>
        <a href="{{ route('en_ad_master') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">master class</span>
        </a>
        <a href="{{ route('en_ad_mastercourse') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Master's course on-the-job special class</span>
        </a>
        <a href="{{ route('en_ad_promotion') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Promotion credit class</span>
        </a>
        <a href="{{ route('en_ad_guide') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Admissions brochures, previous archaeological questions</span>
        </a>
        <a href="{{ route('en_ad_industry', ['year' => date('Y')-1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Student Industry Internship</span>
        </a>
        <a href="{{ route('en_ad_alumni') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Benchmark alumni</span>
        </a>
    </nav>
</div>
