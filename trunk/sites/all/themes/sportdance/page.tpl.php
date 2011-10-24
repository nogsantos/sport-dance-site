<?php
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>" class="no-js" id="modernizrcom">
    <head>
        <title><?php print $head_title; ?></title>
        <?php print $head; ?>
        <?php print $styles; ?>
        <link href='http://fonts.googleapis.com/css?family=Quicksand:700' rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Sansita+One' rel='stylesheet' type='text/css' />
        <?php print $scripts; ?>
        <script type="text/javascript">var switchTo5x=true;</script><script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script><script type="text/javascript">stLight.options({publisher:'b07629d7-aa15-4b5c-8947-595864290ef5'});</script>
    </head>
    <body class="<?php print $classes; ?>">
        <?php if ($primary_links): ?>
            <div id="skip-link"><a href="#main-menu"><?php print t('Jump to Navigation'); ?></a></div>
        <?php endif; ?>
        <div id="wrapperHeader">
            <div id="header">
                <div id="posLogo">
                    <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"><img src="<?php print $logo; ?>" width="300" height="127" alt="<?php print t('Home'); ?> " /></a>
                </div>
                <div id="slogan"></div>
            </div>
        </div>
        <div id="wrapperBannerInt">
            <div id="mainBannerInt">
                Banner principal
            </div>
        </div>
        <div id="wrapperMenu">
            <div id="menu">
                <?php
                    $tree = menu_tree_page_data('primary-links');
                    $main_menu = main_menu_tree_output($tree);
                    print $main_menu;
                ?>
            </div>
        </div>
<!--        <div id="breadcrumbSportDance">
            <?php print $breadcrumb; ?>
        </div>-->
        <div id="page-wrapper">
            <div id="page">
                <div id="main-wrapper">
                    <div id="main" class="clearfix">
                        <div id="content" class="column">
                            <div class="section">
                                <?php if ($title): ?>
                                    <h1 class="title"><?php print $title; ?></h1>
                                <?php endif; ?>
<!--                                <a?php print $messages; ?>-->
                                <?php if ($tabs): ?>
                                    <div class="tabs"><?php print $tabs; ?></div>
                                <?php endif; ?>
                                    <?php print $content_top; ?>
                                <div id="content-area">
                                <?php print $content; ?>
                                </div>
                                <?php print $content_bottom; ?>
                                <?php if ($feed_icons): ?>
                                    <div class="feed-icons"><?php print $feed_icons; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php print $sidebar_second; ?>
                    </div>
                </div>
            </div>
            <div id="footer">
                <div class="section">
                    <?php if($parceiros) :?>
                    <div id="sportDanceParceiros">
                        <?php print $parceiros?>
                    </div>
                    <?php endif;?>
                    <table border="0" cellpadding="5" cellspacing="5" width="10%" align="center" >
                        <tr>
                            <td valign="middle" class="midias">
                                <a href="" target="_blank"><img src="<?php print base_path() ?>sites/all/themes/sportdance/images/facebook.png" alt=""/></a>
                            </td>
                            <td valign="middle" class="midias">
                                <a href="" target="_blank"><img src="<?php print base_path() ?>sites/all/themes/sportdance/images/twitter.png" alt=""/></a>
                            </td>
                            <td valign="middle" class="midias">
                                <a href="" target="_blank"><img src="<?php print base_path() ?>sites/all/themes/sportdance/images/youtube.png" alt=""/></a>
                            </td>
                        </tr>
                    </table>
<!--                    <div id="sportDanceSiteMap">
                        <?php
                            $tree = menu_tree_page_data('primary-links');
                            $main_menu = main_menu_tree_output($tree);
                            print $main_menu;
                        ?>
                    </div>-->
                    <?php print $footer; ?>
                </div>
            </div>
        </div>
        <div id="subFooter">
            <div id="sportDanceCpr">
                Academia Sport Dance &copy; Copyright <?php print date("Y");?> Todos os direitos reservados
            </div>
            <div id="developBy" class="linkDestaque">
                <a href="http://www.nogsantos.com.br" target="_blank">By Fabricio Nogueira</a> 
            </div>
        </div>
        <div id="mascoteMenor"></div>
        <?php print $page_closure; ?>
        <?php print $closure; ?>
        <a href="http://apycom.com/" style="display: none"></a>
    </body>
</html>