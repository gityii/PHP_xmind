
<!doctype html>
<html lang="en">
<head>
<link href="/static/toastr/toastr.css" rel="stylesheet" type="text/css"/>
<title>huhx</title>
</head>
<body>
    <button id="button1">Button1</button>
    <button id="button2">Button2</button>
    <button id="button3">Button3</button>
    <script type="text/javascript" src="/static/assets/js/vendor/jquery.min.js" ></script>
    <script type="text/javascript" src="/static/toastr/toastr.min.js" ></script>
    <script type="text/javascript">
    $('#button1').click(function () {
        toastr.options = {
            closeButton: false,
            debug: false,
            progressBar: false,
            positionClass: "toast-top-center",
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            timeOut: "5000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
        };
        toastr.info("hello world.");
    });

    $('#button2').click(function () {
        toastr.error("hello world.");
    });
    $('#button3').click(function () {
        toastr.clear();
    });
    </script>
</body>
</html>