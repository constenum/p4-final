<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="description" content="St. Ursula Academy Learning Commons Tutoring">
    <meta name="author" content="Mark Miller">

    <title>@yield('title', 'SUA TLC Tutoring')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/slate/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/5fc1ff2a50.css">
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
</head>

<body>
    {{-- Fixed navbar --}}
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home.index') }}">St. Ursula TLC Tutoring</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('sessions.index') }}">Sessions</a></li>
                    <li><a href="{{ route('students.index') }}">Students</a></li>
                    <li><a href="{{ route('subjects.index') }}">Subjects</a></li>
                    <li><a href="{{ route('tutors.index') }}">Tutors</a></li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Page content --}}
    @yield('content')


    {{-- Fixed footer --}}
    <footer class="navbar-default navbar-fixed-bottom footer">
        <div class="container">
            <ul class="list-unstyled">
                <li>
                    &copy; {{ date('Y') }} Mark Miller
                    <span class="pull-right">
                        Slate Bootstrap theme by <a href="https://bootswatch.com/">Bootswatch</a>
                    </span>
                </li>
            </ul>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script>window.jQuery || document.write('<script src="/js/jquery-3.1.1.min.js"><\/script>')</script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="/js/scripts.js"></script>
</body>
</html>
