<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php
        // include class
        include 'SitemapGenerator.php';

        //define your url
        $url = "http://your.app.com/";

        // create object
        $sitemap = new SitemapGenerator($url);

        // add urls
        $sitemap->addUrl($url,                date('c'),  'daily',    '1');
        $sitemap->addUrl($url."/page1",          date('c'),  'daily',    '0.5');
        $sitemap->addUrl($url."/page2",          date('c'),  'daily');
        $sitemap->addUrl($url."/page3",          date('c'));
        $sitemap->addUrl($url."/page4");
        $sitemap->addUrl($url."/page/subpage1",  date('c'),  'daily',    '0.4');
        $sitemap->addUrl($url."/page/subpage2",  date('c'),  'daily');
        $sitemap->addUrl($url."/page/subpage3",  date('c'));
        $sitemap->addUrl($url."/page/subpage4");

        // create sitemap
        $sitemap->createSitemap();

        // write sitemap as file
        $sitemap->writeSitemap();

        // update robots.txt file
        $sitemap->updateRobots();

        // submit sitemaps to search engines
        $sitemap->submitSitemap();
        ?>
    </body>
</html>
