<!DOCTYPE html>
<html lang="en">
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
        <meta name='robots' content='all' />
        <meta name='robots' content='index, follow' />
        <meta name='robots' content='noodp, noydir' />
        <meta name='keywords' content='Pagination, rubikidea, rubikidea.com, php, ' />
        <meta name='description' content='PHP Pagination by RubikIdeaCom\Pagination' />
        <meta name='title' content='RubikIdea.com' />
        <meta name='HandheldFriendly' content='true'/>
        <meta name='rating' content='general' />
        <meta name='rating' content='safe for kids' />
        <meta name='revisit-after' content='7 Days' />
            
        <!-- Viewport -->
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui' />
        <meta name='apple-mobile-web-app-capable' content='yes' />
        <meta name='apple-mobile-web-app-status-bar-style' content='black' />
        <meta name='apple-mobile-web-app-title' content='RubikIdea.com' />
        
        <!-- Author -->
        <meta name='author' content='rubikidea.com' />
        <meta name='signet:authors' content='RubikIdea.com' />
        <meta name='signet:links' content='https://rubikidea.com/' />
        
        <!-- Facebook Preview -->
        <meta property='og:locale' content='en' />
        <meta property='og:site_name' content='RubikIdea.com' />
        <meta property='og:title' content='RubikIdea.com' />
        <meta property='og:description' content='PHP Pagination by RubikIdeaCom\Pagination' />
        <meta property='og:type' content='website' />
        <meta property='og:url' content='https://rubikidea.com/' />
        <meta property='og:image' content='https://rubikidea.com/assets/images/logos/fb.png' />
        <meta property='og:image:type' content='image/png' />
        <meta property='og:image:width' content='227' />
        <meta property='og:image:height' content='227' />
            
        <!-- Twitter Card -->
        <meta name='twitter:card' content='summary' />
        <meta name='twitter:site' content='@rubikideacom' />
        <meta name='twitter:title' content='rubikideacom' />
        <meta name='twitter:description' content='PHP Pagination by RubikIdeaCom\Pagination' />
        <meta name='twitter:image:src' content='https://rubikidea.com/assets/images/logos/fb.png' />
        <meta name='twitter:domain' content='https://rubikidea.com/' />

        <link rel='help' href='https://rubikidea.com/Contact.php' />
        <link rel='search' href='https://rubikidea.com/Search.php' />
        <link rel='canonical' href='https://rubikidea.com/' />
        <link rel='shortlink' href='https://rubikidea.com/' />
        <link rel='icon' type='image/png' href='https://rubikidea.com/assets/images/logos/favicon.png' />
        <link rel='shortcut icon' type='image/png' href='https://rubikidea.com/assets/images/logos/favicon.png' />
        <link rel='image_src' href='https://rubikidea.com/assets/images/logos/favicon.png' />
            
        <!-- App Icons -->
        <meta name='msapplication-TileColor' content='#fff' />
        <meta name='msapplication-TileImage' content='https://rubikidea.com/assets/images/logos/favicon.png' />
        <link rel='apple-touch-icon-precomposed' sizes='57x57' href='https://rubikidea.com/assets/images/logos/apple-touch-icon-57-precomposed.png' />
        <link rel='apple-touch-icon-precomposed' sizes='72x72' href='https://rubikidea.com/assets/images/logos/apple-touch-icon-72-precomposed.png' />
        <link rel='apple-touch-icon-precomposed' sizes='114x114' href='https://rubikidea.com/assets/images/logos/apple-touch-icon-114-precomposed.png' />
        <link rel='apple-touch-icon-precomposed' sizes='144x144' href='https://rubikidea.com/assets/images/logos/apple-touch-icon-144-precomposed.png' />
        <link rel='apple-touch-icon' sizes='60x60' href='https://rubikidea.com/assets/images/logos/apple-touch-icon-iphone.png' />
        <link rel='apple-touch-icon' sizes='76x76' href='https://rubikidea.com/assets/images/logos/touch-icon-ipad.png' />
        <link rel='apple-touch-icon' sizes='120x120' href='https://rubikidea.com/assets/images/logos/touch-icon-iphone-retina.png' />
        <link rel='apple-touch-icon' sizes='152x152' href='https://rubikidea.com/assets/images/logos/touch-icon-ipad-retina.png' />

        <!-- Styles -->
        <link rel="stylesheet" href="styles.css"/>

    <title>RubikIdea.com Pagination</title>
</head>
<body>
    <?php
        require_once './Pagination.php';
        use RubikIdeaCom\Pagination as Pagination;

        $ricPaginationObject = new Pagination();

        $rowCount = 50;
        $ricPaginationObject->init($rowCount);

        echo '<pre>';
        print_r($ricPaginationObject);
        echo '</pre>';

        $ricPaginationObject->printPageNumbers();
        
    ?>
    
</body>
</html>