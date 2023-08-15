<!-- 側邊選單 -->
<div class="col-12 col-lg-2 side-menu mt-5">
    <h1 class="fs-20 mb-3">國際交換生</h1>
    <nav>
        <a href="{{ route('ex_student') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">申請資格</span>
        </a>
        <a href="{{ route('ex_activity') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">活動照片</span>
        </a>
        <a href="{{ route('ex_abroad', ['year' => date('Y')-1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">出國交換</span>
        </a>
        <a href="{{ route('ex_department', ['year' => date('Y')-1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">至本系交換</span>
        </a>
        <a href="{{ route('ex_report', ['country' => '日本']) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">交換學習心得報告</span>
        </a>
    </nav>
</div>
