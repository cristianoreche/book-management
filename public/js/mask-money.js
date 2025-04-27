document.addEventListener('DOMContentLoaded', function () {
    const moneyInputs = document.querySelectorAll('.money-mask');

    moneyInputs.forEach(input => {
        input.addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '');
            value = (parseInt(value || 0, 10) / 100).toFixed(2);
            value = value.replace('.', ',');
            e.target.value = 'R$ ' + value;
        });
    });
});
