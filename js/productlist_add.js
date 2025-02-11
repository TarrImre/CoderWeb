import { addProduct } from './network/network_add.js';
import { showSuccessMessage, showErrorMessage } from './sweetalert.js';
import { isValidURL, isNumeric } from './validation.js';

export function addProductList() {
    const addProductButton = document.getElementById('addProductButton');
    addProductButton.addEventListener('click', async (event) => {
        event.preventDefault();

        const manufacturer = document.getElementById('manufacturer').value.trim();
        const name = document.getElementById('name').value.trim();
        const product_url = document.getElementById('product_url').value.trim();
        const price = document.getElementById('price').value.trim();
        const net_price = document.getElementById('net_price').value.trim();
        const image_url = document.getElementById('image_url').value.trim();
        const category = document.getElementById('category').value.trim();
        const description = document.getElementById('description').value.trim();
        const delivery_time = document.getElementById('delivery_time').value.trim();
        const delivery_cost = document.getElementById('delivery_cost').value.trim();
        const ean_code = document.getElementById('ean_code').value.trim();

        if (!name || !product_url || !price || !net_price || !image_url || !category || !description || !delivery_time || !delivery_cost) {
            showErrorMessage("Hiba", "Mezők kitöltése kötelező: Név, Termék URL, Ár, Nettó ár, Kép URL, Kategória, Leírás, Szállítási idő, Szállítási költség.");
            return;
        }

        if (!isValidURL(product_url)) {
            showErrorMessage("Hiba", "Érvénytelen termék URL.");
            return;
        }

        if (!isValidURL(image_url)) {
            showErrorMessage("Hiba", "Érvénytelen kép URL.");
            return;
        }

        if (!isNumeric(price)) {
            showErrorMessage("Hiba", "Az ár csak szám lehet.");
            return;
        }

        if (!isNumeric(net_price)) {
            showErrorMessage("Hiba", "A nettó ár csak szám lehet.");
            return;
        }

        if (!isNumeric(delivery_cost)) {
            showErrorMessage("Hiba", "A szállítási költség csak szám lehet.");
            return;
        }

        if (ean_code !== '' && !isNumeric(ean_code)) {
            showErrorMessage("Hiba", "Az EAN kód csak szám lehet.");
            return;
        }

        try {
            const result = await addProduct(manufacturer, name, product_url, price, net_price, image_url, category, description, delivery_time, delivery_cost, ean_code);
            showSuccessMessage("Sikeres hozzáadás", result.message);
        } catch (error) {
            console.error("Hiba a termék hozzáadásakor:", error);
            const errorMessage = error.message ? error.message : 'Hiba lépett fel.';
            showErrorMessage("Hiba a termék hozzáadásakor", errorMessage);
        }
    });
}