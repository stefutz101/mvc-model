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
                    <button id='save-product-btn'>SAVE</button>
                    <button id='cancel-product-btn'>CANCEL</button>  
                </div>
            </div>
            <hr>
        </header>
        <main>
            <form id="product_form">
                <div id="error"></div>

                <div>
                    <label for="sku">SKU</label>
                    <input type="text" id="sku"/>
                </div>

                <div>
                    <label for="name">Name</label>
                    <input type="text" id="name"/>
                </div>

                <div>
                    <label for="price">Price ($)</label>
                    <input type="text" id="price"/>
                </div>
                
                <div>
                    <label for="productType">Type Switcher</label>
                    <select id="productType">
                        <option value="dvd">DVD</option>
                        <option value="book">Book</option>
                        <option value="furniture">Furniture</option>
                    </select>   
                </div>

                <div id="insert"></div>
            </form>
        </main>
        <footer>
            <hr>
            <h2 class='center'>Scandiweb Test Assignment</h2>
        </footer>
        <script src='<?= $data['scripts']['jquery']; ?>'></script>
        <script src='<?= $data['scripts']['script']; ?>'></script>
        <script>
            const post = '<?= $data['js_config']['post_url']; ?>';
            const index = '<?= $data['js_config']['index_url']; ?>';

            const script = new Add(post, index);
        </script>
    </body>
</html>