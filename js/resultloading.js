export function resultLoading(status) {
    if (status) {
        return (`
            <div id="product-list" class="row">
                <div id="loading-spinner" class="d-flex justify-content-center w-100">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        `);
    } else {
        return '';
    }
}