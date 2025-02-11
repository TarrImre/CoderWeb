import { editProduct } from './network/network_edit.js';
import { showSuccessMessage, showErrorMessage } from './sweetalert.js';
import { isValidURL, isNumeric } from './validation.js';

export function editProductList() {
    const editProductButton = document.getElementById('editProductButton');
    editProductButton.addEventListener('click', async () => {
        const productId = editProductButton.getAttribute('data-id');

        if (!productId) {
            showErrorMessage("Hiba a termék szerkesztésekor", "Nincs termék ID megadva a szerkesztéshez.");
            return;
        }

        const updatedProduct = {
            id: productId,
            manufacturer: document.getElementById('edit_manufacturer').value.trim(),
            name: document.getElementById('edit_name').value.trim(),
            product_url: document.getElementById('edit_product_url').value.trim(),
            price: document.getElementById('edit_price').value.trim(),
            net_price: document.getElementById('edit_net_price').value.trim(),
            image_url: document.getElementById('edit_image_url').value.trim(),
            category: document.getElementById('edit_category').value.trim(),
            description: document.getElementById('edit_description').value.trim(),
            delivery_time: document.getElementById('edit_delivery_time').value.trim(),
            delivery_cost: document.getElementById('edit_delivery_cost').value.trim(),
            ean_code: document.getElementById('edit_ean_code').value.trim()
        };

        if (!updatedProduct.name || !updatedProduct.product_url || !updatedProduct.price || !updatedProduct.net_price || !updatedProduct.image_url || !updatedProduct.category || !updatedProduct.description || !updatedProduct.delivery_time || !updatedProduct.delivery_cost) {
            showErrorMessage("Hiba", "Mezők kitöltése kötelező: Név, Termék URL, Ár, Nettó ár, Kép URL, Kategória, Leírás, Szállítási idő, Szállítási költség.");
            return;
        }

        if (!isValidURL(updatedProduct.product_url)) {
            showErrorMessage("Hiba", "Érvénytelen termék URL.");
            return;
        }

        if (!isValidURL(updatedProduct.image_url)) {
            showErrorMessage("Hiba", "Érvénytelen kép URL.");
            return;
        }

        if (!isNumeric(updatedProduct.price)) {
            showErrorMessage("Hiba", "Az ár csak szám lehet.");
            return;
        }

        if (!isNumeric(updatedProduct.net_price)) {
            showErrorMessage("Hiba", "A nettó ár csak szám lehet.");
            return;
        }

        if (!isNumeric(updatedProduct.delivery_cost)) {
            showErrorMessage("Hiba", "A szállítási költség csak szám lehet.");
            return;
        }

        if (updatedProduct.ean_code !== '' && !isNumeric(updatedProduct.ean_code)) {
            showErrorMessage("Hiba", "Az EAN kód csak szám lehet, vagy üresen hagyható.");
            return;
        }

        try {
            const result = await editProduct(updatedProduct);
            showSuccessMessage("Sikeres szerkesztés", result.message);
        } catch (error) {
            console.error("Hiba a termék szerkesztésekor:", error);
            const errorMessage = error.message ? error.message : 'Hiba lépett fel.';
            showErrorMessage("Hiba a termék szerkesztésekor", errorMessage);
        }
    });
}
