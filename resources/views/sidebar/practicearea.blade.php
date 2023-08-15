<!-- 側邊選單 -->
<div class="col-12 col-lg-2 side-menu mt-5">
    <h1 class="fs-20 mb-3">實務專題</h1>
    <nav>
        <a href="{{ route('practice', ['year' => date('Y') - 1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">實施辦法</span>
        </a>
        <a href="{{ route('practive_forms') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">相關表單</span>
        </a>
        <a href="{{ route('practive_intership') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">歷屆實習單位</span>
        </a>
        <a href="{{ route('practicaltopic', ['year' => date('Y') - 1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">實務專題成果</span>
        </a>
    </nav>
</div>
