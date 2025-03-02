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

function updateQueryParameter(key, value) {
    let url = new URL(window.location.href);
    let params = new URLSearchParams(url.search);

    if (value) {
        params.append(key, value);
    } else {
        params.delete(key);
    }

    url.search = params.toString();
    window.location.href = url.toString();
}

document.getElementById('filter_colleges').addEventListener('change',
    function () {
        let college_id = this.value || this.options[this.selectedIndex].value;
        updateQueryParameter('college_id', college_id);
    })

document.getElementById('sortingFilter').addEventListener('change',
    function () {
        let sorting = this.value || this.options[this.selectedIndex].value;
        updateQueryParameter('sort', sorting);
    });

