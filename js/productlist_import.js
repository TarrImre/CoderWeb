import { importProducts } from './network/network_import.js';
import { showSuccessMessage, showErrorMessage } from './sweetalert.js';

export function importProductList() {
    const importProductsButton = document.getElementById('import_products');
    importProductsButton.addEventListener('click', async () => {
        try {
            const result = await importProducts();
            showSuccessMessage("Sikeres importálás", result.message);
        } catch (error) {
            console.error("Hiba a termékek importálásakor:", error);
            const errorMessage = error.message ? error.message : 'Hiba lépett fel.';
            showErrorMessage("Hiba a termékek importálásakor", errorMessage);
        }
    });
}
