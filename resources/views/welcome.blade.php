<!DOCTYPE html>
<html>
<head>
    <title>Table</title>
    <link rel="stylesheet" href="styles/kendo.common.min.css" />
    <link rel="stylesheet" href="styles/kendo.default.min.css" />
    <link rel="stylesheet" href="styles/kendo.default.mobile.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="js/jquery.min.js"></script>
    <script src="js/kendo.all.min.js"></script>
    

</head>
<body>
        <div id="example">
            <div id="grid"></div>
            <script type="text/javascript">
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            </script>
            <script>
                $(document).ready(function () {
                    
                        dataSource = new kendo.data.DataSource({
                            transport: {
                                read:  {
                                    url: '{{route('read')}}',
                                    type: "get",
                                    dataType: "json"
                                },
                                update: {
                                    url: '{{route('create')}}',
                                    type: "POST"
                                },
                                destroy: {
                                    url: '{{route('destroy')}}',
                                    type: "POST",
                                    dataType: "json"
                                },
                                create: {
                                    url: '{{route('create')}}',
                                    type: "POST",
                                    dataType: "json"
                                },
                                parameterMap: function(options, operation) {
                                    if (operation !== "read" && options.models) {
                                        return {models: kendo.stringify(options.models)};
                                    }
                                }
                            },
                            batch: true,
                            pageSize: 20,
                            schema: {
                                type: "json",
                                model: {
                                    id: "translation_id",
                                    fields: {
                                        word: { validation: { required: true } },
                                        translation: { validation: { required: true } }                                 
                                    }
                                }
                            }
                        });

                    $("#grid").kendoGrid({
                        dataSource: dataSource,
                        navigatable: true,
                        pageable: true,
                        //height: 550,
                        toolbar: ["create"],
                        columns: [
                            "word",
                            { field: "translation", title:"translation", width: "33%" },
                            { command: ["edit", "destroy"], title: "&nbsp;", width: "15%" }],
                        editable: "inline"
                    });
                });     
            </script>
        </div>


</body>
</html>
