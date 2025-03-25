import { httpClient } from '../httpclient/httpclient.js';

export async function loadProducts() {
    try {
        const response = await httpClient.postJson({
            action: 'load_products',
        });

        if (response.status !== 'success') {
            throw new Error(response.message || 'Error loading');
        }

        return response;
    } catch (error) {
        console.error('Error loading:', error);
        throw error;
    }
};