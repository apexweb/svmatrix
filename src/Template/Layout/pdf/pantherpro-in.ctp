<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /*@page {
            margin: 1.0cm;  
        }*/
        
        * {
            box-sizing: border-box;
        }

        .row::after {
            content: "";
            clear: both;
            display: block;
        }
        [class*="col-"] {
            float: left;
            padding: 5px;
        }

        html {
            font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
        }


         /*For desktop:*/
        .col-1 {width: 8.33%;}
        .col-2 {width: 16.66%;}
        .col-3 {width: 25%;}
        .col-4 {width: 33.33%;}
        .col-5 {width: 41.66%;}
        .col-6 {width: 50%;}
        .col-7 {width: 58.33%;}
        .col-8 {width: 66.66%;}
        .col-9 {width: 75%;}
        .col-10 {width: 83.33%;}
        .col-11 {width: 91.66%;}
        .col-12 {width: 100%;}



        h1 {
            padding: 0;
            margin: 0;
        }

        .text-center {
            text-align: center;
        }

        p.no-margin {
            margin: 0;
            padding: 0;
        }

        .vertical-middle {
            vertical-align: middle;
        }

        .cuttings-customer-info {
            font-size: 13px;
            color: #434343;
        }

        .table {
            margin-bottom: 30px;
            border-collapse: collapse;
            width: 100% !important;
            border-spacing: 0 0;
            /*border: 1px solid #1f1f1f;*/
        }

        .table td,
        .table th {
            padding: 3px 4px;
            border: 1px solid #323232;
            /*border-bottom: none;*/
        }



        .table td {
            color: #1f1f1f;
            font-size: 12px;
        }

        .table th {
            color: #000000;
            font-size: 12px;
        }

        .font-bold {
            font-weight: bold;
        }

        span.big-span {
            font-weight: bold;
        }


        .printout {
            font-size: 11px !important;
            margin: 0 !important;
            padding: 0 !important;
            color: #000000 !important;
        }

        .printout table {
            margin: 0 !important;
            padding: 0 !important;
        }

        .printout th,
        .printout td {
            font-size: 11px !important;
        }

        .table-unbordered td,
        .table-unbordered th {
            border: none !important;
        }

        .customer-info {
            margin: 10px 0 !important;
            font-size 11px;
        }

        .no-border{
            border:none !important;
            vertical-align:top;
        }
        .x{
            width:5%;
        }
        
        .20_per{
           width:20%; 
        }
        
        .15_per{
            width:15%; 
        }

        .max-space{
            max-width:100%;
            white-space:nowrap;
        }

        .qty{
            width:15px;
        }
        
        .width, .height{
            width:40px;
        }
        
        .width-60{
            width:60px;
        }

        .width-70{
            width:70px;
        }
        
        .width-80{
            width:80px;
        }
        
        .width-90{
            width:90px;
        }

        .width-100{
            width: 100px;
        }

        .width-200{
            width:200px;
        }
        .at{
          font-size: 6px;  
        }
        
    </style>
</head>
<body>
<?= $this->fetch('content') ?>
</body>
</html>