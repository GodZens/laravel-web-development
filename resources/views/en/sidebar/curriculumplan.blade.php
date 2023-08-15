<!-- 側邊選單 -->
<div class="col-12 col-lg-2 side-menu mt-5">
    <h1 class="fs-20 mb-3">Curriculum Structure</h1>
    <nav>
        <a href="{{ route('en_curriculumplan') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Curriculum Planning</span>
        </a>
        <a href="{{ route('en_secondlang') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">third language</span>
        </a>
        <a href="{{ route('en_coursefeature') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">course features</span>
        </a>
        <a href="{{ route('en_courseflowchart', ['year' => date('Y') - 1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Course Flowchart</span>
        </a>
        <a href="{{ route('en_coursemap', ['year' => date('Y') - 1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Course Map</span>
        </a>
        <a href="{{ route('en_coursestructure', ['year' => date('Y') - 1911]) }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Course Structure Diagram</span>
        </a>
        <a href="{{ route('en_graduation') }}">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">graduation threshold</span>
        </a>
        <a href="https://webapp.yuntech.edu.tw/WebNewCAS/Course/QueryCour.aspx">
            <i class="fa-solid fa-arrow-right-long"></i><span class="menu-text">Course Inquiry</span>
        </a>
    </nav>
</div>
