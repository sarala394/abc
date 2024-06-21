<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown Menu</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu-item {
            position: relative;
        }

        .menu-item a {
            display: block;
            padding: 10px;
            text-decoration: none;
            background: #333;
            color: #fff;
        }

        .menu-item a:hover {
            background: #555;
        }

        .submenu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: #444;
            min-width: 200px;
        }

        .submenu a {
            padding: 10px;
            color: #fff;
        }

        .submenu a:hover {
            background: #666;
        }
    </style>
</head>


<body>
    <nav>
        <ul class="menu">
            <li class="menu-item"><a href="#">Main Item 1</a>
                <ul class="submenu">
                    <li><a href="login.php">Sub Item 1</a></li>
                    <li><a href="#">Sub Item 2</a></li>
                    <li><a href="#">Sub Item 3</a></li>
                </ul>
            </li>
            <li class="menu-item"><a href="#">Main Item 2</a>
                <ul class="submenu">
                    <li><a href="login.php">Sub Item 1</a></li>
                    <li><a href="#">Sub Item 2</a></li>
                    <li><a href="#">Sub Item 3</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {
        // Toggle submenu display on main item click
        $('.menu-item > a').click(function(event) {
            event.preventDefault(); // Prevent default action
            var $submenu = $(this).siblings('.submenu');

            // Slide up all submenus except the one being clicked
            $('.submenu').not($submenu).slideUp();

            // Toggle the clicked submenu
            $submenu.slideToggle();
        });

        // Prevent submenu click from closing the main menu
        $('.submenu a').click(function(event) {
            event.stopPropagation(); // Stop event from bubbling up to parent elements
        });
    });
</script>