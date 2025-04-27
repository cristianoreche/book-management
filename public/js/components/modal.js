document.addEventListener('DOMContentLoaded', function() {
    // Abrir modal
    document.querySelectorAll('[data-toggle="modal"]').forEach(button => {
        button.addEventListener('click', function() {
            const modalId = this.getAttribute('data-target');
            document.getElementById(modalId).style.display = 'block';
        });
    });

    // Fechar modal
    document.querySelectorAll('[data-dismiss="modal"]').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('.modal').style.display = 'none';
        });
    });
});
