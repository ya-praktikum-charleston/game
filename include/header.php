<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8" />
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">

    <title></title>

    <link rel="icon" href="/media/img/favicon.png" type="image/x-icon" />
<!--    <link rel="stylesheet" href="/media/css/resetNormalize.min.css" type="text/css" />-->


    <?
    $url = explode('/', $_SERVER['REQUEST_URI']);

    if(!empty($url[1]) && $url[1] == 'my__vue' ):
    ?>
        <link rel="stylesheet" href="/media/css/bootstrap.min.css" type="text/css" />
        <script src="/media/js/vue.js"></script>
    <? endif; ?>


    <link rel="stylesheet" href="/media/css/style.css" type="text/css" />

    <!--скрипт SyntaxHighlighter-->
    <link type="text/css" rel="stylesheet" href="/media/js/syntax_highlighter/styles/shCoreDefault.css"/>
    <script type="text/javascript" src="/media/js/syntax_highlighter/scripts/shCore.js"></script>
    <script type="text/javascript">SyntaxHighlighter.all();</script>

    <script type="text/javascript" src="/media/js/syntax_highlighter/scripts/shBrushJScript.js"></script>
    <script type="text/javascript" src="/media/js/syntax_highlighter/scripts/shBrushPhp.js"></script>
    <script type="text/javascript" src="/media/js/syntax_highlighter/scripts/shBrushXml.js"></script>

</head>

<body>

<br>


<div class="main_wrapper">

    <div class="wrapper">

        <header class="header">

			<div class="container">
				<div class="header_main">



				</div>
			</div>

        </header>

        <div class="main">

            <?php
                if(isset($_SERVER['HTTP_REFERER'])) { ?>
                    <p class="break_list"><a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">&#8617; Назад</a></p>
                <?php
                }
            ?>


            <div class="container">
