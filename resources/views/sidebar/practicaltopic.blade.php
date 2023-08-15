<!-- 側邊選單 -->
<div class="col-12 col-lg-2 side-menu mt-5">
    <h1 class="fs-20 mb-3">實務專題成果</h1>
    <nav>
        <a href="{{ route('practicaltopic', ['year' => date('Y') - 1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">實習組</span>
        </a>
        <a href="{{ route('practicaltopic_paper', ['year' => date('Y') - 1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">專題組</span>
        </a>
        <a href="{{ route('practicaltopic_video', ['year' => date('Y') - 1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">成果影片</span>
        </a>
    </nav>
</div>
