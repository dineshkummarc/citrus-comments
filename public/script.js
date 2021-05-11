document.addEventListener("DOMContentLoaded", function (ev) {
    const commentForm = document.getElementById('comment__form');
    const name = commentForm.querySelector("input[name='name']");
    const email = commentForm.querySelector("input[name='email']");
    const comment = commentForm.querySelector("input[name='comment']");
    const errorElement = document.getElementById('error');

    commentForm.addEventListener('submit', function (ev) {
        let errors = [];
        if (name.value === '' || name.value == null) {
            errors.push('Fill in name');
        }
        if (email.value === '' || email.value == null) {
            errors.push('Fill in email');
        }
        if (comment.value === '' || comment.value == null) {
            errors.push('Fill in comment');
        }
        if(errors.length > 0) {
            ev.preventDefault();
            errorElement.innerText = errors.join(', ');
            errorElement.classList.add('active');
        }
    });

});