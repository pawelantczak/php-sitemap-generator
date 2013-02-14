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

        // create object
        $sitemap = new SitemapGenerator("http://your.app.com/");

        // add urls
        $sitemap->addUrl("http://your.app.com",                date('c'),  'daily',    '1');
        $sitemap->addUrl("http://your.app.com/page1",          date('c'),  'daily',    '0.5');
        $sitemap->addUrl("http://your.app.com/page2",          date('c'),  'daily');
        $sitemap->addUrl("http://your.app.com/page3",          date('c'));
        $sitemap->addUrl("http://your.app.com/page4");
        $sitemap->addUrl("http://your.app.com/page/subpage1",  date('c'),  'daily',    '0.4');
        $sitemap->addUrl("http://your.app.com/page/subpage2",  date('c'),  'daily');
        $sitemap->addUrl("http://your.app.com/page/subpage3",  date('c'));
        $sitemap->addUrl("http://your.app.com/page/subpage4");

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
