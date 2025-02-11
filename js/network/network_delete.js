import { httpClient } from '../httpclient/httpclient.js';

export async function deleteProduct(id) {
    try {
        const response = await httpClient.postJson({
            action: 'delete_product',
            id: id,
        });

        if (response.status !== 'success') {
            throw new Error(response.message || 'Error adding product');
        }

        return response;
    } catch (error) {
        console.error('Error adding product:', error);
        throw error;
    }
};
