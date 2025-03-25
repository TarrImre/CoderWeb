import { httpClient } from '../httpclient/httpclient.js';

export async function loadProductById(id) {
    try {
        const response = await httpClient.postJson({
            action: 'load_product_by_id',
            id: id,
        });

        if (response.status !== 'success') {
            throw new Error(response.message || 'Error loading product by ID');
        }

        return response;
    } catch (error) {
        console.error('Error loading product by ID:', error);
        throw error;
    }
};