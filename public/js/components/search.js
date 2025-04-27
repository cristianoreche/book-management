class TableFilter {
    constructor(inputSelector, tableSelector) {
        this.input = document.querySelector(inputSelector);
        this.table = document.querySelector(tableSelector);
        this.rows = this.table.querySelectorAll('tbody tr');
        this.init();
    }

    init() {
        if (!this.input || !this.table) return;

        this.input.addEventListener('input', () => {
            const query = this.input.value.toLowerCase().trim();

            this.rows.forEach(row => {
                const rowText = row.innerText.toLowerCase();
                if (rowText.includes(query)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });

            this.toggleEmptyMessage();
        });
    }

    toggleEmptyMessage() {
        const tbody = this.table.querySelector('tbody');
        const visibleRows = Array.from(this.rows).filter(row => row.style.display !== 'none');
        let emptyRow = this.table.querySelector('.table__empty-message');

        if (visibleRows.length === 0) {
            if (!emptyRow) {
                emptyRow = document.createElement('tr');
                emptyRow.className = 'table__row table__empty-message';
                emptyRow.innerHTML = `<td colspan="${this.table.querySelectorAll('thead th').length}" class="table__cell table__cell--empty">
                    Nenhum registro encontrado.
                </td>`;
                tbody.appendChild(emptyRow);
            }
        } else {
            if (emptyRow) {
                emptyRow.remove();
            }
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new TableFilter('.search__input', '#livros-table');
});
