<!-- 側邊選單 -->
<div class="col-12 col-lg-2 side-menu mt-5">
    <h1 class="fs-20 mb-3">課程架構</h1>
    <nav>
        <a href="{{ route('curriculumplan') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">課程規劃</span>
        </a>
        <a href="{{ route('secondlang') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">第二外語</span>
        </a>
        <a href="{{ route('coursefeature') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">課程特色</span>
        </a>
        <a href="{{ route('courseflowchart', ['year' => date('Y')-1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">課程流程圖</span>
        </a>
        <a href="{{ route('coursemap', ['year' => date('Y')-1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">課程地圖</span>
        </a>
        <a href="{{ route('coursestructure', ['year' => date('Y')-1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">課程架構圖</span>
        </a>
        <a href="{{ route('graduation') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">畢業門檻</span>
        </a>
        <a href="https://webapp.yuntech.edu.tw/WebNewCAS/Course/QueryCour.aspx">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">課程查詢</span>
        </a>
    </nav>
</div>
