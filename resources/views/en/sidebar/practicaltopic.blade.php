<!-- 側邊選單 -->
<div class="col-12 col-lg-2 side-menu mt-5">
    <h1 class="fs-20 mb-3">Practical Topic Results</h1>
    <nav>
        <a href="{{ route('en_practicaltopic', ['year' => date('Y') - 1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Internship group</span>
        </a>
        <a href="{{ route('en_practicaltopic_paper', ['year' => date('Y') - 1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Thematic group</span>
        </a>
        <a href="{{ route('en_practicaltopic_video', ['year' => date('Y') - 1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Outcome video</span>
        </a>
    </nav>
</div>
