<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <div class="card p-3 shadow-lg">
                    <div class="row">
                        <div class="col">
                            <h1 class="display-1">@yield('title')</h1>
                            <hr>
                        </div>
                    </div>
                    @if (session('error'))
                        <div class="row">
                            <div class="col-md-9">
                                <div class="alert alert-danger">
                                    {{ session('error')}}
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="row">
                            <div class="col-md-9">
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            </div>
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>

</html>
