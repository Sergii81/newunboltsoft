<!DOCTYPE html>
<html>
	<head>
	    <title>Test</title>
	    <link rel="stylesheet" href="css/test.css" />
	    <!--<link rel="stylesheet" href="styles/kendo.common.min.css" />-->
	    <link rel="stylesheet" href="styles/kendo.default.min.css" />
	    <link rel="stylesheet" href="styles/kendo.default.mobile.min.css" />
	    
	    <meta name="csrf-token" content="{{ csrf_token() }}">

	    <script src="js/jquery.min.js"></script>
	    <script src="js/kendo.all.min.js"></script>
	    

	</head>
	<body>
    @if (empty($word))
        <script type="text/javascript">
            alert("All words are learned!");
        </script>
    @else
	<div id="example">

	    <div class="demo-section k-content">            
	        <div class="word">
             {{$word->translation}}   
            </div>
	        <div class="result">
	            <p id="result"></p>
	        </div>

            <div>               
                <div id="treeview"></div>
            </div>

            <div>
                <button class="continue">Continue</button> 
            </div>
	    </div>

	    <script>
	    	
	        $("#treeview").kendoTreeView({
	            checkboxes:  true,  
	            check: onCheck,
	            dataSource: [
	            	<?php 
	            	$str = $word->word;	            	
	            	$arr = str_split($str);	
	            	shuffle($arr);            	
	            	foreach ($arr as $key): ?>
	            		{ text: "<?php echo $key;?>" },
	            	<?php endforeach ?>
	                ]
	            
	        });

	        // 


	        function checkedNodeText(nodes, checkedNodes) {                   
	            for (var i = 0; i < nodes.length; i++) {
                    if (nodes[i].checked) {
                        checkedNodes.push(nodes[i].text);  
	                } 
	            }  

                
	        }

	        // show checked node IDs on datasource change
	        function onCheck() {
	            var checkedNodes = [],
                    //str = "{{$word->word}}",
	                treeView = $("#treeview").data("kendoTreeView"),
	                message;

                    
	            checkedNodeText(treeView.dataSource.view(), checkedNodes);
                
	            if (checkedNodes.length > 0) {
	                message = checkedNodes.join("");
	            } else {
	                message = "check letter";
	            }

	            $("#result").html(message);
                $(".continue").css('display', 'block');
	        }
	    </script>

	    

	</div>

@endif
	</body>
</html>