import { httpClient } from '../httpclient/httpclient.js';

export async function editProduct(updatedProduct) {
    try {
        const response = await httpClient.postJson({
            action: 'edit_product',
            product: updatedProduct,
        });

        if (response.status !== 'success') {
            throw new Error(response.message || 'Error editing product');
        }

        return response;
    } catch (error) {
        console.error('Error editing product:', error);
        throw error;
    }
}
