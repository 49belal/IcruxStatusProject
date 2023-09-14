<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"href="{{ asset('css/style.css') }}">
    <!-- ====== ionicons ======= -->
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('boxicons-master/css/boxicons.min.css') }}">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    @yield('head')



<body>

    <section class="navigation">
        <ul>
            <li>
                <a href="/">

                    <img class="icon" src="{{ url('logoicrux.png') }}"
                        style="padding-top: 5px;width: 5%;height: 5%;">

                    <span class="title" style="">Icrux Systems</span>

                </a>
            </li>

            <li>
                <a href="/">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <?php
            if (auth()->user()->type =='user') {


                ?>

            <li>
                <a href="{{ route('TaskCompleted') }}">
                    <span class="icon">
                        <ion-icon name="checkbox-outline"></ion-icon>
                    </span>
                    <span class="title">Task Completed</span>
                </a>
            </li>
            <li>
                <a href="{{ route('TaskInprogress') }}">
                    <span class="icon">
                        <ion-icon name="play-outline"></ion-icon>
                    </span>
                    <span class="title">Task In Progress</span>
                </a>
            </li>
            <li>
                <a href="{{ route('TaskOnhold') }}">
                    <span class="icon">
                        <ion-icon name="pause-outline"></ion-icon>
                    </span>
                    <span class="title">Task On Hold</span>
                </a>
            </li>
            <?php }else{ ?>
            <li>
                <a href="{{ route('ProjectList') }}">
                    <span class="icon">
                        <ion-icon name="list-outline"></ion-icon>
                    </span>
                    <span class="title">Project List</span>
                </a>
            </li>

            <li>
                <a href="{{ route('CreateProject') }}">
                    <span class="icon">
                        <ion-icon name="add-outline"></ion-icon>
                    </span>
                    <span class="title">Create New Project</span>
                </a>
            </li>
            <?php
                        if (auth()->user()->type =='manager') {

                            ?>
            <li>
                <a href="{{ route('UserList') }}">
                    <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                    </span>
                    <span class="title">User List</span>
                </a>
            </li>

            <li>
                <a href="{{ route('registeruser') }}">
                    <span class="icon">
                        <ion-icon name="add-outline"></ion-icon>
                    </span>
                    <span class="title">Add New User</span>
                </a>
            </li>
            <?php
        }
            ?>

            <li>
                <a href="{{ route('feedbacklist') }}">
                    <span class="icon">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </span>
                    <span class="title">Feedback</span>
                </a>
            </li>

            <?php } ?>
            {{-- <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </span>
                    <span class="title">Sign Out</span>
                </a>
            </li> --}}
        </ul>
        <!-- =========== Scripts =========  -->

    </section>

    <!-- ========================= Main ==================== -->
    <section class="container">
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                {{-- <div>
                    <button class="status inProgresss" style="margin-right:480px;" onclick="history.go(-1);">Back
                    </button>
                </div> --}}

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div>
                    <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                    </span>
                    <span class="title">
                        {{ Auth::user()->name }}

                    </span>

                </div>
            </div>
            <main>
                @yield('menu')
            </main>

    </section>

    {{-- <script src="js/main.js"></script> --}}




</body>
