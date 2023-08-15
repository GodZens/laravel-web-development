<!-- 側邊選單 -->
<div class="col-12 col-lg-2 side-menu mt-5">
    <h1 class="fs-20 mb-3">應外風雲榜</h1>
    <nav>
        <a href="{{ route('foreign', ['year' => date('Y')-1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">學生得獎紀錄</span>
        </a>
        <a href="{{ route('f_certificate', ['year' => date('Y')-1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">證照統計表</span>
        </a>
        <a href="{{ route('f_teacher') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">教師獲獎榮譽</span>
        </a>
        <a href="{{ route('f_outstanding') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">畢業系友傑出表現</span>
        </a>
    </nav>
</div>
