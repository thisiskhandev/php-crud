<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    <link rel="stylesheet" href="css/style.css">
    <script>
        setTimeout(function() {
            document.querySelector(".not_found") ? document.querySelector(".not_found").style.display = "none" : "";
        }, 5000);

        function InpNotEmptyHandler() {
            var valueInp = document.querySelectorAll('input[type="text"].inpEmpty')[0].value;
            var submit = document.querySelectorAll('input[type="submit"][name="confirmIdDelete"]')[0];

            if (valueInp.length > 0) {
                submit.classList.add("open_to_submit");
            } else {
                submit.classList.remove("open_to_submit");
            }
        }
    </script>
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <h1>Crud</h1>
        </div>
        <div id="menu">
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="add.php">Add</a>
                </li>
                <li>
                    <a href="update.php">Update</a>
                </li>
                <li>
                    <a href="delete.php">Delete</a>
                </li>
            </ul>
        </div>