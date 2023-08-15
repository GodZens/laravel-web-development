<!-- 側邊選單 -->
<div class="col-12 col-lg-2 side-menu mt-5">
    <h1 class="fs-20 mb-3">Student Zone</h1>
    <nav>
        <a href="{{ route('en_students', ['year' => date('Y')-1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">student work</span>
        </a>
        <a href="{{ route('en_studentsactivity') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Student Activities</span>
        </a>
        <a href="{{ route('en_thesis') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Thesis</span>
        </a>
        <a href="{{ route('en_practice', ['year' => date('Y')-1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Practice area /<br>The internship</span>
        </a>
        <a href="{{ route('en_future') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">future employment</span>
        </a>
        <a href="{{ route('en_stdownload') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Downloads</span>
        </a>
    </nav>
</div>
