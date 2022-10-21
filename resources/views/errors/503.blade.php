<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>503 Error</title>

    <!-- Custom Style -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Nunito+Sans');

        :root {
            --blue: #0e0620;
            --white: #fff;
            --green: #2ccf6d;
        }

        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: "Nunito Sans";
            color: var(--blue);
            font-size: 1em;
        }

        button {
            font-family: "Nunito Sans";
        }

        ul {
            list-style-type: none;
            padding-inline-start: 35px;
        }

        svg {
            width: 100%;
            visibility: hidden;
        }

        h1 {
            font-size: 7.5em;
            margin: 15px 0px;
            font-weight: bold;
        }

        h2 {
            font-weight: bold;
        }

        .hamburger-menu {
            position: absolute;
            top: 0;
            left: 0;
            padding: 35px;
            z-index: 2;
        }

        .hamburger-menu button {
            position: relative;
            width: 30px;
            height: 22px;
            border: none;
            background: none;
            padding: 0;
            cursor: pointer;
        }

        .hamburger-menu button span {
            position: absolute;
            height: 3px;
            background: #000;
            width: 100%;
            left: 0px;
            top: 0px;
            transition: 0.1s ease-in;
        }

        .hamburger-menu button span:nth-child(2) {
            top: 9px;
        }

        .hamburger-menu button span:nth-child(3) {
            top: 18px;
        }

        .hamburger-menu [data-state="open"] span:first-child {
            transform: rotate(45deg);
            top: 10px;
        }

        .hamburger-menu [data-state="open"] span:nth-child(2) {
            width: 0%;
            opacity: 0;
        }

        .hamburger-menu [data-state="open"] span:nth-child(3) {
            transform: rotate(-45deg);
            top: 10px;
        }

        nav {
            position: absolute;
            height: 100%;
            top: 0;
            left: 0;
            background: var(--green);
            color: var(--blue);
            width: 300px;
            z-index: 1;
            padding-top: 80px;
            transform: translateX(-100%);
            transition: 0.24s cubic-bezier(0.52, 0.01, 0.8, 1);
        }

        nav li {
            transform: translateX(-5px);
            transition: 0.16s cubic-bezier(0.44, 0.09, 0.46, 0.84);
            opacity: 0;
        }

        nav a {
            display: block;
            font-size: 1.75em;
            font-weight: bold;
            text-decoration: none;
            color: inherit;
            transition: 0.24s ease-in-out;
        }

        nav a:hover {
            text-decoration: none;
            color: var(--white);
        }

        nav[data-state="open"] {
            transform: translateX(0%);
        }

        nav[data-state="open"] ul li:nth-child(1) {
            transition-delay: 0.16s;
            transform: translateX(0px);
            opacity: 1;
        }

        nav[data-state="open"] ul li:nth-child(2) {
            transition-delay: 0.32s;
            transform: translateX(0px);
            opacity: 1;
        }

        nav[data-state="open"] ul li:nth-child(3) {
            transition-delay: 0.48s;
            transform: translateX(0px);
            opacity: 1;
        }

        nav[data-state="open"] ul li:nth-child(4) {
            transition-delay: 0.64s;
            transform: translateX(0px);
            opacity: 1;
        }

        .btn {
            z-index: 1;
            overflow: hidden;
            background: transparent;
            position: relative;
            padding: 8px 50px;
            border-radius: 30px;
            cursor: pointer;
            font-size: 1em;
            letter-spacing: 2px;
            transition: 0.2s ease;
            font-weight: bold;
            margin: 5px 0px;
        }

        .btn.green {
            border: 4px solid var(--green);
            color: var(--blue);
        }

        .btn.green:before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 0%;
            height: 100%;
            background: var(--green);
            z-index: -1;
            transition: 0.2s ease;
        }

        .btn.green:hover {
            color: var(--white);
            background: var(--green);
            transition: 0.2s ease;
        }

        .btn.green:hover:before {
            width: 100%;
        }

        @media screen and (max-width: 768px) {
            body {
                display: block;
            }

            .container {
                margin-top: 70px;
                margin-bottom: 70px;
            }
        }

        a {
            text-decoration: none;
        }

        a:hover,
        a:visited,
        a:active {
            color: inherit;
        }
    </style>
    <!-- End Custom Style -->
</head>

<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <img src="https://svgshare.com/i/mc5.svg">
                </div>
                <div class="col-md-6 align-self-center">
                    <h1>503</h1>
                    <h2>T-T</h2>
                    <p>Layanan tidak tersedia.</p>

                    <a href="/" class="btn green">Kembali</a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
