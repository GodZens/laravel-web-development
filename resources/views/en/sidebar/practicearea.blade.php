<!-- 側邊選單 -->
<div class="col-12 col-lg-2 side-menu mt-5">
    <h1 class="fs-20 mb-3">Practical topics</h1>
    <nav>
        <a href="{{ route('en_practice', ['year' => date('Y') - 1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Implementation Measures</span>
        </a>
        <a href="{{ route('en_practive_forms') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">related form</span>
        </a>
        <a href="{{ route('en_practive_intership') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Previous internship units</span>
        </a>
        <a href="{{ route('en_practicaltopic', ['year' => date('Y') - 1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Practical Topic Results</span>
        </a>
    </nav>
</div>
