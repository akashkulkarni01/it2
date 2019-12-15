Redirecting to CCAvenue....
<html>
<head>
    <script>
        function submitCCAvenueForm() {
            var CCAvenueForm = document.forms.CCAvenueForm;
            CCAvenueForm.submit();
        }
    </script>
</head>
<body onLoad="submitCCAvenueForm()">
    <form action="<?=$action?>" method="post" name="CCAvenueForm">
        <input type="hidden" name="encRequest" value="<?php echo $encRequest; ?>" />
		<input type="hidden" name="access_code" value="<?php echo $access_code; ?>" />

    </form>
</body>
</html>
