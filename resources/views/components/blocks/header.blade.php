<!-- Header -->
<header id="header" class="alt">
    <h1><a href="index.html">{{ $block->title }}</a></h1>
    <nav id="nav">
        <ul>
            <li class="special">
                <a href="#menu" class="menuToggle"><span>Menu</span></a>
                <div id="menu">
                    <ul>
                        <x-blocks-renderer :blocks="$block->nav_links" />
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</header>