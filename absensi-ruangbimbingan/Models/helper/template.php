<?php
// Template Login & Register my-reg
function headFirst($tittle, $href)
{
    $value = '<!DOCTYPE html>
            <html lang="en">
            
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <title>' . $tittle . '</title>
                <link rel="stylesheet" href="' . $href . 'Assets/vendors/feather/feather.css">
                <link rel="stylesheet" href="' . $href . 'Assets/vendors/ti-icons/css/themify-icons.css">
                <link rel="stylesheet" href="' . $href . 'Assets/vendors/css/vendor.bundle.base.css">
                <link rel="stylesheet" href="' . $href . 'Assets/css/vertical-layout-light/style.css">
                <link rel="shortcut icon" href="' . $href . 'Assets/images/favicon.png"/>
                <link rel="stylesheet" href="' . $href . 'Assets/vendors/select2/select2.min.css"/>
                    <link rel="stylesheet" href="' . $href . 'Assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css"/>
            </head>
            
            <body>';

    echo $value;
}

function bodyScript($src)
{
    $value = '<script src="' . $src . 'Assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="' . $src . 'Assets/js/off-canvas.js"></script>
    <script src="' . $src . 'Assets/js/hoverable-collapse.js"></script>
    <script src="' . $src . 'Assets/js/template.js"></script>
    <script src="' . $src . 'Assets/js/settings.js"></script>
    <script src="' . $src . 'Assets/js/todolist.js"></script>
    <script src="' . $src . 'Assets/js/file-upload.js"></script>
    </body>
    
    </html>';

    return $value;
}

// Template Main
function headMain($tittle, $href)
{
    $value = '<!DOCTYPE html>
               <html lang="en">
               <head>
                    <meta charset="utf-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
                    <title>' . $tittle . '</title>
                    <link rel="stylesheet" href="' . $href . 'Assets/vendors/feather/feather.css" />
                    <link rel="stylesheet" href="' . $href . 'Assets/vendors/ti-icons/css/themify-icons.css" />
                    <link rel="stylesheet" href="' . $href . 'Assets/vendors/css/vendor.bundle.base.css" />
                    <link rel="stylesheet" href="' . $href . 'Assets/vendors/ti-icons/css/themify-icons.css" />
                    <link rel="stylesheet" href="' . $href . 'Assets/vendors/mdi/css/materialdesignicons.min.css" />
                    <link rel="stylesheet" href="' . $href . 'Assets/css/vertical-layout-light/style.css" />
                    <link rel="shortcut icon" href="' . $href . 'Assets/images/favicon.png" />
                    <link rel="stylesheet" href="' . $href . 'Assets/vendors/select2/select2.min.css"/>
                    <link rel="stylesheet" href="' . $href . 'Assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css"/>
                    
               </head>
               <body>';
    echo $value;
}

function footerMain($src)
{
    $value = '<script src="' . $src . 'Assets/vendors/js/vendor.bundle.base.js"></script>
               <script src="' . $src . 'Assets/vendors/datatables.net/jquery.dataTables.js"></script>
               <script src="' . $src . 'Assets/vendors/select2/select2.min.js"></script>
               <script src="' . $src . 'Assets/js/off-canvas.js"></script>
               <script src="' . $src . 'Assets/js/hoverable-collapse.js"></script>
               <script src="' . $src . 'Assets/js/template.js"></script>
               <script src="' . $src . 'Assets/js/select2.js"></script>
               </body>
               </html>';

    return $value;
}
