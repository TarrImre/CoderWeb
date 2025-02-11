const baseUrl = `${window.location.href}/server/`;

const postJson = async ({ action, ...data }) => {
    try {
        const response = await fetch(`${baseUrl}manage.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                action,
                ...data,
            }),
        });

        const responseText = await response.text();

        if (!response.ok) {
            throw new Error('Error in response');
        }

        const jsonResponse = JSON.parse(responseText);
        return jsonResponse;

    } catch (error) {
        console.error('Network error or JSON parsing error:', error);
        throw error;
    }
};

export const httpClient = {
    postJson,
};
