<!-- 側邊選單 -->
<div class="col-12 col-lg-2 side-menu mt-5">
    <h1 class="fs-20 mb-3">Foreign Billboard</h1>
    <nav>
        <a href="{{ route('en_foreign', ['year' => date('Y')-1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Student Award Record</span>
        </a>
        <a href="{{ route('en_f_certificate', ['year' => date('Y')-1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Certificate statistics table</span>
        </a>
        <a href="{{ route('en_f_teacher') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Teacher Awards</span>
        </a>
        <a href="{{ route('en_f_outstanding') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Outstanding performance of graduates</span>
        </a>
    </nav>
</div>
