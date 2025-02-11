<!doctype html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CoderWeb Teszt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <script type="module">
        import {
            loadProducts
        } from './js/network/network_load.js';

        import {
            loadProductById
        } from './js/network/network_loadbyid.js';

        import {
            importProductList
        } from './js/productlist_import.js';
        import {
            deleteProductList
        } from './js/productlist_delete.js';
        import {
            editProductList
        } from './js/productlist_edit.js';
        import {
            addProductList
        } from './js/productlist_add.js';

        import {
            resultLoading
        } from './js/resultloading.js';


        const result = document.getElementById('result');
        const loading = document.getElementById('loading');

        function loadAndDisplayProducts() {
            document.addEventListener('DOMContentLoaded', async () => {
                const productListElement = document.getElementById('product-list');
                const productCountElement = document.getElementById('product-count');
                loading.innerHTML = resultLoading(true);
                try {
                    const products = await loadProducts();
                    productCountElement.innerHTML = products.data.length + " db";
                    if (products.length === 0) {
                        result.innerHTML = dangerText("Nincs megjeleníthető termék.");
                    } else {
                        const productCards = products.data.sort((a, b) => b.id - a.id).map(product => {
                            return `
                                <div class="col-lg-3 col-sm-5 mt-2 mb-2">
                                    <section class="mx-auto" style="max-width: 23rem; height: 100%;">
                                        <div class="card d-flex flex-column h-100">
                                            <div class="product-img-container">
                                                <img src="${product.image_url}" alt="${product.name}" title="${product.name}" draggable="false" class="img-responsive" />
                                            </div>
                                            <div class="card-body d-flex flex-column">
                                                ${product.ean_code ? '<div class="ean_code">' + product.ean_code + '</div>' : ''}
                                                <div class="category mb-2"><p>${product.category}</p></div>
                                                <div class="manufacturer"><p>${product.manufacturer}</p></div>
                                                <div class="name mb-4"><p>${product.name}</p></div>
                                                <hr class="my-4" />
                                                <div class="price"><p><strong>Ár: </strong>${product.price.replace(/\.00$/, '')} Ft</p></div>
                                                <div class="net_price mb-4"><p><strong>Nettó ár: </strong>${product.net_price.replace(/\.00$/, '')} Ft</p></div>
                                                <div class="delivery_time"><p><strong>Szállítási idő: </strong>${product.delivery_time}</p></div>
                                                <div class="delivery_cost mb-4"><p><strong>Szállítási költség: </strong>${product.delivery_cost.replace(/\.00$/, '')} Ft</p></div>

                                            </div>
                                                <div class="actions mt-auto d-flex justify-content-between flex-wrap">
                                                        <button class="eye-button" onclick="window.open('${product.product_url}', '_blank')"></button>
                                                        <button class="trash-button" data-id="${product.id}" data-bs-toggle="modal" data-bs-target="#deleteProductModal"></button>
                                                        <button class="edit-button" data-id="${product.id}" data-bs-toggle="modal" data-bs-target="#editProductModal"></button>
                                                        <button class="info-button" data-bs-toggle="modal" data-bs-target="#descriptionModal" data-id="${product.id}"></button>  
                                                </div>
                                        </div>
                                    </section>
                                </div>
                        `;
                        }).join('');

                        productListElement.innerHTML = productCards;

                        addEditEventListeners();
                        addDeleteEventListeners();
                        addDescriptionEventListeners();
                    }
                } catch (error) {
                    console.error("Hiba a termékek betöltésekor:", error);
                    const errorMessage = error.message ? error.message : 'Hiba lépett fel.';
                    result.innerHTML = dangerText(errorMessage);
                } finally {
                    loading.innerHTML = resultLoading(false);
                }
            });
        }

        async function addEditEventListeners() {
            const editButtons = document.querySelectorAll('.edit-button');
            editButtons.forEach(button => {
                button.addEventListener('click', async () => {
                    const productId = button.getAttribute('data-id');
                    document.getElementById('editProductButton').setAttribute('data-id', productId);

                    const productById = await loadProductById(productId);
                    const product = productById.data;

                    document.getElementById('edit_manufacturer').value = product.manufacturer;
                    document.getElementById('edit_name').value = product.name;
                    document.getElementById('edit_product_url').value = product.product_url;
                    document.getElementById('edit_price').value = product.price;
                    document.getElementById('edit_net_price').value = product.net_price;
                    document.getElementById('edit_image_url').value = product.image_url;
                    document.getElementById('edit_category').value = product.category;
                    document.getElementById('edit_description').value = product.description;
                    document.getElementById('edit_delivery_time').value = product.delivery_time;
                    document.getElementById('edit_delivery_cost').value = product.delivery_cost;
                    document.getElementById('edit_ean_code').value = product.ean_code;

                });
            });
        }

        async function addDescriptionEventListeners() {
            const descriptionButtons = document.querySelectorAll('.info-button');
            descriptionButtons.forEach(button => {
                button.addEventListener('click', async () => {
                    const productId = button.getAttribute('data-id');
                    const productById = await loadProductById(productId);
                    const product = productById.data;
                    document.getElementById('modalDescription').innerHTML = product.description;
                });
            });
        }

        function addDeleteEventListeners() {
            const deleteButtons = document.querySelectorAll('.trash-button');
            deleteButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const productId = button.getAttribute('data-id');
                    document.getElementById('deleteProductButton').setAttribute('data-id', productId);
                });
            });
        }

        function dangerText(message) {
            return `
            <div class="alert alert-danger" role="alert">
                ${message}
            </div>`;
        }

        function successText(message) {
            return `
            <div class="alert alert-success" role="alert">
                ${message}
            </div>`;
        }

        importProductList();
        deleteProductList();
        addProductList();
        editProductList();

        loadAndDisplayProducts();
    </script>

</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Termékek listája <span id="product-count" class="badge bg-secondary"></span></h1>

        <div class="d-flex justify-content-between flex-wrap">
            <button type="submit" class="btn btn-success mb-2" id="import_products">
                Termékek importálása
            </button>

            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addProductModal">
                Új termék hozzáadása
            </button>

        </div>

        <div id="result"></div>
        <div id="loading"></div>

        <div class="container">
            <div id="product-list" class="row"></div>
        </div>
    </div>

    <?php include('./modals/modaladd.html'); ?>
    <?php include('./modals/modaldelete.html'); ?>
    <?php include('./modals/modaledit.html'); ?>
    <?php include('./modals/modaldescription.html'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>