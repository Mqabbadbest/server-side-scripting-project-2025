/**
 * This script is used to handle the delete button in the student list page.
 * The script is used to confirm the deletion of a student.
 * If the user confirms the deletion, the form is submitted.
 */
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

/**
 * This function is used to update the query parameters in the URL.
 * @param {*} key 
 * @param {*} value 
 */
function updateQueryParameter(key, value) {
    // Get the current URL
    let url = new URL(window.location.href);
    // Get the query parameters
    let params = new URLSearchParams(url.search);

    // If the key has a value, set the key-value pair in the query parameters
    // Otherwise, delete the key from the query parameters
    if (value) {
        params.append(key, value);
    } else {
        params.delete(key);
    }

    // Update the query parameters in the URL
    url.search = params.toString();
    // Redirect the user to the new URL
    window.location.href = url.toString();
}

/**
 * This function is used to filter the students based on the college they are associated with.
 */
document.getElementById('filter_colleges').addEventListener('change',
    function () {
        let college_id = this.value || this.options[this.selectedIndex].value;
        updateQueryParameter('college_id', college_id);
    })

/**
 * This function is used to filter the students based on the sorting criteria.
 * The sorting criteria are either by name in ascending or descending order.
 */
document.getElementById('sortingFilter').addEventListener('change',
    function () {
        let sorting = this.value || this.options[this.selectedIndex].value;
        updateQueryParameter('sort', sorting);
    });

/**
 * This function is used to time out the alert messages that are displayed on the student views.
 * The alert messages are displayed for 3 seconds before they are hidden.
 */
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