<?php

// this contains the application parameters that can be maintained via GUI
return array(
    // this is where feedback is sent
    'contactEmail'               => 'weralwolf@gmail.com',
    // this is used in error pages
    'adminEmail'                 => 'weralwolf@gmail.com',
    // the copyright information displayed in the footer section
    'copyrightInfo'              => 'Copyright &copy; 2011 Anatolii Koval',
    //pagesizes
    'pageSize'                   => 10,
    'languages'                  => array('uk', 'ru', 'en'),
    // google
    'googleAnalytics'            => false,
    'googleAnalyticsTracker'     => '',
    'googleApiKey'               =>
        'ABQIAAAAjU0EJWnWPMv7oQ-jjS7dYxQGj0PqsCtxKvarsoS-iqLdqZSKfxRdmoPmGl7Y9335WLC36wIGYa6o5Q',

	'co-auth_count' => 5,
	//upload directory
    'uploadDir'                  => 'upload/',
    'additionalSideMenuElements' => array(
//         array(
//             'order'            => 2,
//             'title_sm_message' => array('MenuLinks', 'registration'),
//             'url'              => array('participants/create'),
//         ),
        array(
            'order'            => 4,
            'title_sm_message' => array('Pages', 'progr_title'),
            'url'              => array('sections/programm'),
        ),
    ),
    //relative to 'protected' dir
    'upload' => array(
    	'default'            => '/../upload',
	    'reports'            => '/../upload/reports',
	    'photos'            => '/../upload/photos',
	    'photos_tmp'            => '/../upload/photos/tmp',
    ),

    'jqClEditor'                 => array(
        'width'      => 500, // width not including margins, borders or padding
        'height'     => 250, // height not including margins, borders or padding
        'controls'   => // controls to add to the toolbar
        "bold italic underline strikethrough subscript superscript | font size " .
            "style | color highlight removeformat | bullets numbering | outdent " .
            "indent | alignleft center alignright justify | undo redo | " .
            "rule image link unlink | cut copy paste pastetext | print source",
        'colors'     => // colors in the color popup
        "FFF FCC FC9 FF9 FFC 9F9 9FF CFF CCF FCF " . "CCC F66 F96 FF6 FF3 6F9 3FF 6FF 99F F9F " .
            "BBB F00 F90 FC6 FF0 3F3 6CC 3CF 66C C6C " . "999 C00 F60 FC3 FC0 3C0 0CC 36F 63F C3C " .
            "666 900 C60 C93 990 090 399 33F 60C 939 " . "333 600 930 963 660 060 366 009 339 636 " .
            "000 300 630 633 330 030 033 006 309 303",
        'fonts'      => // font names in the font popup
        "Arial,Arial Black,Comic Sans MS,Courier New,Narrow,Garamond," .
            "Georgia,Impact,Sans Serif,Serif,Tahoma,Trebuchet MS,Verdana",
        'sizes'      => // sizes in the font size popup
        "1,2,3,4,5,6,7",
        'styles'     => // styles in the style popup
        array(
            array("Paragraph", "<p>"),
            array("Header 1", "<h1>"),
            array("Header 2", "<h2>"),
            array("Header 3", "<h3>"),
            array("Header 4", "<h4>"),
            array("Header 5", "<h5>"),
            array("Header 6", "<h6>")
        ),
        'useCSS'     => false, // use CSS to style HTML when possible (not supported in ie)
        'docType'    => // Document type contained within the editor
        '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">',
        'docCSSFile' => // CSS file used to style the document contained within the editor
        "",
        'bodyStyle'  => // style to assign to document body contained within the editor
        "margin:4px; font:10pt Arial,Verdana; cursor:text"
    ),
);
