function numberWithComma(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

jQuery('.datepicker').datepicker({
    dateFormat: 'yy-mm-dd',
});