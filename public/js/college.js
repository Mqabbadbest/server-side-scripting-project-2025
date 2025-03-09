/**
 * It is used to confirm the deletion of a college.
 * The user is asked to confirm the deletion of a college, alongside any students that are associated with the college.
 * If the user confirms the deletion, the form is submitted.
 */
document.querySelectorAll('#btn-delete').forEach((button) => {
    button.addEventListener('click', function (event) {
        event.preventDefault();
        event.stopPropagation();
        if (confirm('ATTENTION: Are you sure? Any student that is associated with this college will also be deleted.')) {
            let action = this.getAttribute('href');
            let form = document.getElementById('delete-college-form');
            form.setAttribute('action', action);
            form.submit();
        }
    });
});

/**
 * This function is used to time out the alert messages that are displayed on the college views.
 * The alert messages are displayed for 3 seconds before they are hidden.
 * This function is used to hide the alert messages after 3 seconds.
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