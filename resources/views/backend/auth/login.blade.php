<html lang="en" class="">

<head>
    <meta charset="utf-8">
    <title>Backoffice | Ewaa.Bet</title>
    <meta name="description" content="Admin || Ewaa || BackOffice">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://netbo.gapi.lol/css/v1/login/animate.css" type="text/css">
    <link rel="stylesheet" href="https://netbo.gapi.lol/css/v1/login/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="https://netbo.gapi.lol/css/v1/login/simple-line-icons.css" type="text/css">
    <link rel="stylesheet" href="https://netbo.gapi.lol/css/v1/login/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="https://netbo.gapi.lol/css/v1/login/font.css" type="text/css">
    <link rel="stylesheet" href="https://netbo.gapi.lol/css/v1/login/app.css" type="text/css">
</head>

<body>
    <div class="app app-header-fixed">
        <div class="container w-xxl w-auto-xs">
            <a href="" class="navbar-brand block m-t">Ewaa.Bet Backoffice Management Console</a>
            <div class="m-b-lg">
                <div class="wrapper text-center">
                    <strong>Authorised personnel only<br>24*7 Monitoring</strong>
                </div>
                @include('backend.partials.messages')
                <form name="form" method="post" class="form-validation" action="<?= route('backend.auth.login.post') ?>">
                  <input type="hidden" value="<?= csrf_token() ?>" name="_token">
                  <div class="text-danger wrapper text-center" ng-show="authError">
                    </div>
                    <div class="list-group list-group-sm">
                        <div class="list-group-item">
                            <input type="text" placeholder="Username" name="username" class="form-control no-border"
                                required="">
                        </div>
                        <div class="list-group-item">
                            <input type="password" placeholder="Password" name="password" class="form-control no-border"
                                required="">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary btn-block">Log in</button>
                    <div class="line line-dashed"></div>
                </form>
            </div>
            <div class="text-center">
                <p>
                    <span class="text-center">Copyright &copy; 2022 Ewaa.Bet <br></span>
                </p>
            </div>
        </div>
    </div>


</body>

</html>












@section('scripts')
    {!! JsValidator::formRequest('VanguardLTE\Http\Requests\Auth\LoginRequest', '#login-form') !!}
@stop
