<!DOCTYPE html>
<html>
<head>
    <title>Test</title>
    <link rel="stylesheet" href="styles/kendo.common.min.css" />
    <link rel="stylesheet" href="styles/kendo.default.min.css" />
    <link rel="stylesheet" href="styles/kendo.default.mobile.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="js/jquery.min.js"></script>
    <script src="js/kendo.all.min.js"></script>
    

</head>
<body>
        {{$translation->translation}}

</body>
</html>