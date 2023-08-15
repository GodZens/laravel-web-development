<!-- 側邊選單 -->
<div class="col-12 col-lg-2 side-menu mt-5">
    <h1 class="fs-20 mb-3">學生專區</h1>
    <nav>
        <a href="{{ route('students', ['year' => date('Y')-1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">學生作品</span>
        </a>
        <a href="{{ route('studentsactivity') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">學生活動</span>
        </a>
        <a href="{{ route('thesis') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">碩士論文</span>
        </a>
        <a href="{{ route('practice', ['year' => date('Y')-1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">實務專區/實習</span>
        </a>
        <a href="{{ route('future') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">未來就業</span>
        </a>
        <a href="{{ route('stdownload') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">下載專區</span>
        </a>
    </nav>
</div>
