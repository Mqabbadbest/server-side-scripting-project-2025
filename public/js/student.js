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

document.addEventListener('DOMContentLoaded', function () {
    const msg = document.getElementById('msg');
    const alert = document.getElementById('alert');
    const danger = document.getElementById('danger');

    if (msg) {
        setTimeout(function () {
            msg.style.opacity = '0';
            setTimeout(function () {
                msg.style.display = 'none';
            }, 500);
        }, 3000);
    }

    if (alert) {
        setTimeout(function () {
            alert.style.opacity = '0';
            setTimeout(function () {
                alert.style.display = 'none';
            }, 500);
        }, 3000);
    }

    if (danger) {
        setTimeout(function () {
            danger.style.opacity = '0';
            setTimeout(function () {
                danger.style.display = 'none';
            }, 500);
        }, 3000);
    }
});