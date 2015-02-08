<html ng-app="HankieApp">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="/javascripts/angular.js"></script>
    <script src="/javascripts/application.js"></script>
    <link rel="stylesheet" href="/stylesheets/styles.css" />

    <script>
        document.querySelector("[name='keyword']").keyup = function () {


        }
    </script>
</head>
<body>
<div ng-controller="HankieController">
    {{{FacebookSession::setDefaultApplication('324431691096172', '92fdd773ab0069b9b0d850689e139de0')}}}
    <div class="container-fluid">
    <nav class="navigation">
        @section('navigation')
        @show
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <div class="sidebar">
        @yield('sidebar')
    </div>
    </div>
</div>
</body>
</html>