<!-- 側邊選單 -->
<div class="col-12 col-lg-2 side-menu mt-5">
    <h1 class="fs-20 mb-3">招生專區</h1>
    <nav>
        <a href="{{ route('admissions', ['year' => '111學年度四技二專「甄選入學」招生選才內涵- 外語群英語類']) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">大學部</span>
        </a>
        <a href="{{ route('ad_master') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">碩士班</span>
        </a>
        <a href="{{ route('ad_mastercourse') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">碩士班在職專班</span>
        </a>
        <a href="{{ route('ad_promotion') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">推廣學分班</span>
        </a>
        <a href="{{ route('ad_guide') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">招生簡章、歷屆考古題</span>
        </a>
        <a href="{{ route('ad_industry', ['year' => date('Y')-1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">學生產業實習</span>
        </a>
        <a href="{{ route('ad_alumni') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">標竿校友</span>
        </a>
    </nav>
</div>
