import { httpClient } from '../httpclient/httpclient.js';

export async function addProduct(manufacturer, name, product_url, price, net_price, image_url, category, description, delivery_time, delivery_cost, ean_code) {
    try {
        const response = await httpClient.postJson({
            action: 'add_product',
            manufacturer: manufacturer,
            name: name,
            product_url: product_url,
            price: price,
            net_price: net_price,
            image_url: image_url,
            category: category,
            description: description,
            delivery_time: delivery_time,
            delivery_cost: delivery_cost,
            ean_code: ean_code,
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
