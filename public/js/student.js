document.querySelectorAll('#btn-delete').forEach((button) => {
    button.addEventListener('click', function (event) {
        event.preventDefault();
        event.stopPropagation();
        if(confirm('Are you sure?')){
            let action = this.getAttribute('href');
            let form = document.getElementById('delete-student-form');
            form.setAttribute('action', action);
            form.submit();
        }
    });
});