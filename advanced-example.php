<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php
        $time = explode(" ",microtime());
        $time = $time[1];

        // include class
        include 'SitemapGenerator.php';
        // create object
        $sitemap = new SitemapGenerator("http://your.app.com/", "../");

        // will create also compressed (gzipped) sitemap
        $sitemap->createGZipFile = true;

        // determine how many urls should be put into one file
        $sitemap->maxURLsPerSitemap = 10000;

        // sitemap file name
        $sitemap->sitemapFileName = "sitemap.xml";

        // sitemap index file name
        $sitemap->sitemapIndexFileName = "sitemap-index.xml";

        // robots file name
        $sitemap->robotsFileName = "robots.txt";

        $urls = array(
            array("http://your.app.com",                    date('c'),  'daily',    '1'),
            array("http://your.app.com/mainpage1",          date('c'),  'daily',    '0.5'),
            array("http://your.app.com/mainpage2",          date('c'),  'daily'),
            array("http://your.app.com/mainpage3",          date('c')),
            array("http://your.app.com/maonpage4"));

        // add many URLs at one time
        $sitemap->addUrls($urls);

        // add urls one by one
        $sitemap->addUrl("http://your.app.com/page1",          date('c'),  'daily',    '0.5');
        $sitemap->addUrl("http://your.app.com/page2",          date('c'),  'daily');
        $sitemap->addUrl("http://your.app.com/page3",          date('c'));
        $sitemap->addUrl("http://your.app.com/page4");
        $sitemap->addUrl("http://your.app.com/page/subpage1",  date('c'),  'daily',    '0.4');
        $sitemap->addUrl("http://your.app.com/page/subpage2",  date('c'),  'daily');
        $sitemap->addUrl("http://your.app.com/page/subpage3",  date('c'));
        $sitemap->addUrl("http://your.app.com/page/subpage4");

        try {
            // create sitemap
            $sitemap->createSitemap();

            // write sitemap as file
            $sitemap->writeSitemap();

            // update robots.txt file
            $sitemap->updateRobots();

            // submit sitemaps to search engines
            $result = $sitemap->submitSitemap("yahooAppId");
            // shows each search engine submitting status
            echo "<pre>";
            print_r($result);
            echo "</pre>";
            
        }
        catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        echo "Memory peak usage: ".number_format(memory_get_peak_usage()/(1024*1024),2)."MB";
        $time2 = explode(" ",microtime());
        $time2 = $time2[1];
        echo "<br>Execution time: ".number_format($time2-$time)."s";


        ?>
    </body>
</html>
