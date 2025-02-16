export function isValidURL(url) {
    try {
        new URL(url);
        return true;
    } catch (error) {
        return false;
    }
}

export function isNumeric(value) {
    return /^\d+(\.\d+)?$/.test(value);
}
