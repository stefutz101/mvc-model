<!doctype html>

<html lang='en'>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>

        <title><?= $data['title']; ?></title>

        <link rel='icon' href='favicon.ico'>
        <link rel='stylesheet' href='<?= $data['css']; ?>'>
    </head>

    <body>
        <header>
            <div class='navbar'>
                <h1><?= $data['title']; ?></h1>
                <div class='actions'>
                    <button id='redirect-product-btn'>ADD</button>
                    <button id='delete-product-btn'>MASS DELETE</button>  
                </div>
            </div>
            <hr>
        </header>
        <main id='products'></main>
        <footer>
            <hr>
            <h2 class='center'>Scandiweb Test Assignment</h2>
        </footer>
        <script src='<?= $data['scripts']['jquery']; ?>'></script>
        <script src='<?= $data['scripts']['script']; ?>'></script>
        <script>
            const get = '<?= $data['js_config']['get_url']; ?>';
            const del = '<?= $data['js_config']['del_url']; ?>';
            const add = '<?= $data['js_config']['add_url']; ?>';

            const script = new Index(get, del, add);
        </script>
    </body>
</html>