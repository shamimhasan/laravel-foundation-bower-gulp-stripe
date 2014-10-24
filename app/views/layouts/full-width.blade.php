<!doctype html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Foundation Template | Banded</title>

    <link rel="stylesheet" href="assets/css/vendor.min.css" />
    <link rel="stylesheet" href="assets/css/app.min.css" />
    <link rel="stylesheet" href="assets/css/custom.css" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <nav class="top-bar" data-topbar="">
        <ul class="title-area">
            <li class="name">
                <h1>
                    <a href="#">Top Bar Title</a>
                </h1>
            </li>
            <li class="toggle-topbar menu-icon">
                <a href="#"><span>Menu</span></a>
            </li>
        </ul>
        <section class="top-bar-section">
            <ul class="left">
                <li class="divider"></li>
                <li class="has-dropdown">
                    <a class="active" href="#">Main Item 1</a>
                    <ul class="dropdown">
                        <li>
                            <label>Section Name</label>
                        </li>
                        <li>
                            <a class="" href="{{ URL::to('/connect') }}">Connect</a>
                        </li>
                        <li>
                            <a href="#">Dropdown Option</a>
                        </li>
                        <li>
                            <a href="#">Dropdown Option</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <label>Section Name</label>
                        </li>
                        <li>
                            <a href="#">Dropdown Option</a>
                        </li>
                        <li>
                            <a href="#">Dropdown Option</a>
                        </li>
                        <li>
                            <a href="#">Dropdown Option</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">See all →</a>
                        </li>
                    </ul>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">Main Item 2</a>
                </li>
                <li class="divider"></li>
                <li class="has-dropdown">
                    <a href="#">Main Item 3</a>
                    <ul class="dropdown">
                        <li>
                            <a href="#">Dropdown Option</a>
                        </li>
                        <li>
                            <a href="#">Dropdown Option</a>
                        </li>
                        <li>
                            <a href="#">Dropdown Option</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">See all →</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="right">
                <li class="divider"></li>
                <li class="has-dropdown">
                    <a href="#">Main Item 4</a>
                    <ul class="dropdown">
                        <li>
                            <label>Section Name</label>
                        </li>
                        <li class="has-dropdown">
                            <a class="" href="#">Has Dropdown, Level 1</a>
                            <ul class="dropdown">
                                <li>
                                    <a href="#">Dropdown Options</a>
                                </li>
                                <li>
                                    <a href="#">Dropdown Options</a>
                                </li>
                                <li class="has-dropdown">
                                    <a href="#">Has Dropdown, Level 2</a>
                                    <ul class="dropdown test">
                                        <li>
                                            <a href="#">Subdropdown
                                            Option</a>
                                        </li>
                                        <li>
                                            <a href="#">Subdropdown
                                            Option</a>
                                        </li>
                                        <li>
                                            <a href="#">Subdropdown
                                            Option</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Subdropdown Option</a>
                                </li>
                                <li>
                                    <a href="#">Subdropdown Option</a>
                                </li>
                                <li>
                                    <a href="#">Subdropdown Option</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Dropdown Option</a>
                        </li>
                        <li>
                            <a href="#">Dropdown Option</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <label>Section Name</label>
                        </li>
                        <li>
                            <a href="#">Dropdown Option</a>
                        </li>
                        <li>
                            <a href="#">Dropdown Option</a>
                        </li>
                        <li>
                            <a href="#">Dropdown Option</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">See all →</a>
                        </li>
                    </ul>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">Main Item 5</a>
                </li>
                <li class="divider"></li>
                <li class="has-dropdown">
                    <a href="#">Main Item 6</a>
                    <ul class="dropdown">
                        <li>
                            <a href="#">Dropdown Option</a>
                        </li>
                        <li>
                            <a href="#">Dropdown Option</a>
                        </li>
                        <li>
                            <a href="#">Dropdown Option</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">See all →</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
    </nav>
    
    @yield('content')
    
    <footer class="row">
        <div class="large-12 columns">
            <hr>
            <div class="row">
                <div class="large-6 columns">
                    <p>
                        © Copyright no one at all. Go to town.
                    </p>
                </div>
                <div class="large-6 columns">
                    <ul class="inline-list right">
                        <li>
                            <a href="#">Section 1</a>
                        </li>
                        <li>
                            <a href="#">Section 2</a>
                        </li>
                        <li>
                            <a href="#">Section 3</a>
                        </li>
                        <li>
                            <a href="#">Section 4</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <script>
        $(document).foundation();
    </script>
</body>
</html>