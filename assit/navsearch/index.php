<?php
$ckdate=date("Y-m-d");
require ('../../db/admin.php');
$object=new CRUD();
$resultsetup=$object->Readsetup();
foreach($resultsetup as $rowsetup);
$resultbooking=$object->Searchbooking();
?>
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- jquery -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.js"
      integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
      crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- SWEET ALERT -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- DATATABLE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">

    <script src=https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js></script>
    <script src=https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js></script>
    <script src=https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js></script>
    <script src=https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js></script>
    <script src=https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js></script>
    <script src=https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js></script>
    <script src=https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js></script>

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Noto Sans Thai|Chonburi|Mitr|Prompt" rel="stylesheet">
<link rel="shortcut icon" href="../images/<?php echo $rowsetup['img'];?>"/>
<title><?php echo $rowsetup['office'];?></title>
</head>
    <style type="text/css">
    body{
    font-family:Noto Sans Thai,Prompt,sans-serif;
    background:#FFFFFF;
    }
    .topnav a:hover {
        border-bottom: 3px solid red;
    }

    .footer {
    left: 0;
    bottom: 0;
    width: 100%;
    background-color:lightblue;
    color: black;
    text-align: center;
  }
    </style>
<body>


