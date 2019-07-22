<div class="sidebar" id="sidebar">
    <div class="brandLogo">
        <a href="{{ url('/dashboard') }}">
        <img onmousedown="return false;" src="{{ url('assets/images/web/'.$zooq[0]['logo']) }}" />
        </a>
    </div>
    <ul class="navSidebar">
        <li><a class="item-nav" href="{{ url('/view_dashboard') }}"><i class="fas fa-home icon"></i> Dashboard</a></li>
        @if (Auth::user()->roles->role_name == 'administrator')
        <li><div class="accordion"><i class="fas fa-graduation-cap icon"></i> ZooQ Website</div>
            <ul class="acc-panel">
                <li><a class="item-nav" href="{{ url('zooq/view_profile') }}">Website Profile</a></li>
                <li><a class="item-nav" href="{{ url('zooq/view_seo') }}">SEO</a></li>
            </ul>
        </li>
        <li>
            <div class="accordion"><i class="fas fa-images icon"></i> Slideshow &amp; Gallery</div>
            <ul class="acc-panel">
                <li><a class="item-nav" href="{{ url('gallery/view_slideshow') }}">Manage Slideshow</a></li>
                <li><a class="item-nav" href="{{ url('gallery/view_gallery') }}">Manage Gallery</a></li>
            </ul>
        </li>
        <li>
            <div class="accordion"><i class="fas fa-book icon"></i> Question</div>
            <ul class="acc-panel">
                <li><a class="item-nav" href="{{ url('view_question') }}">Manage Question</a></li>
            </ul>
        </li>
        @endif
        <li>
            <div class="accordion"><i class="fas fa-question icon"></i> Take Quiz</div>
            <ul class="acc-panel">
                <li><a class="item-nav" href="{{ url('view_quiz') }}">Quiz</a></li>
            </ul>
        </li>
        @if (Auth::user()->roles->role_name == 'administrator')
        <li>
            <div class="accordion" href="#"><i class="fas fa-users icon"></i> User</div>
            <ul class="acc-panel">
                <li><a class="item-nav" href="{{ url('view_user') }}">User</a></li>
            </ul>
        </li>
        <li><a class="item-nav" href="{{ url('socmed/view_socmed') }}"><i class="fas fa-comment-alt icon"></i> Social Media</a></li>
        @endif
    </ul>

</div>
