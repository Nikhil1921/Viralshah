<?php
header("Content-type: text/css; charset: UTF-8");
?>
<style type="text/css" media="screen">
<?= link_tag('assets/plugins/fontawesome-free/css/all.min.css','stylesheet','text/css') ?>
	*{
    padding: 0px;
    margin: 0px;
    box-sizing: border-box;
    }
    body{
    padding: 10px;
    }
    table, th{
    border: 2px solid black;
    border-collapse: collapse;
    font-size: 14px;
    }
    td {
    text-align: left;
    border: 1px solid black;
    border-collapse: collapse;
    }
    table td p{
    font-size: 13px;
    padding: 2px;
    }
    table{
    width: 100%;
    }
    .ref, .date{
    display: inline-block;
    }
    .date{float:right;}
    .ref span{border:2px solid black;
    padding: 10px;
    }
    .last th, .last td,{
    border:0px;
    border-collapse: collapse;
    }
    
    .row {
    display: flex;
    flex-wrap: wrap;
    padding: 0 4px;
    }
    .column {
    flex: 45%;
    max-width: 45%;
    padding: 0 4px;
    }
    .column img {
    margin: 8px;
    width: 100%;
    }
    .tbl{ margin-left: 120px; }
    .tbl .himg img{
    width: 100%;
    }
</style>