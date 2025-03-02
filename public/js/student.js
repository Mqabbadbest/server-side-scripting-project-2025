document.querySelectorAll('#btn-delete').forEach((button) => {
    button.addEventListener('click', function (event) {
        event.preventDefault();
        event.stopPropagation();
        if (confirm('Are you sure?')) {
            let action = this.getAttribute('href');
            let form = document.getElementById('delete-student-form');
            form.setAttribute('action', action);
            form.submit();
        }
    });
});

document.getElementById('filter_colleges').addEventListener('change',
    function () {
        let college_id = this.value || this.options[this.selectedIndex].value;
        window.location.href = window.location.href.split('?')[0] + '?college_id=' + college_id;
})