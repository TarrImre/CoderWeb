import { deleteProduct } from './network/network_delete.js';
import { showSuccessMessage, showErrorMessage } from './sweetalert.js';

export function deleteProductList() {
    const deleteProductButton = document.getElementById('deleteProductButton');
    deleteProductButton.addEventListener('click', async () => {
        const productId = deleteProductButton.getAttribute('data-id');
        if (!productId) {
            console.error("Hiba: Nincs termék ID megadva a törléshez.");
            return;
        }

        try {
            const result = await deleteProduct(productId);
            showSuccessMessage("Sikeres törlés", result.message);
        } catch (error) {
            console.error("Hiba a termék törlésekor:", error);
            const errorMessage = error.message ? error.message : 'Hiba lépett fel.';
            showErrorMessage("Hiba a termék törlésekor", errorMessage);
        }
    });
}
