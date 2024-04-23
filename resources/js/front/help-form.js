document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('#modal-help form').addEventListener('submit', function (e) {
        e.preventDefault();
        let responseElement = document.querySelector('#help-response');
        let submits = e.target.querySelectorAll('button[type="submit"]');
        submits && submits.forEach((submit) => {
            submit.setAttribute('disabled', 'disabled');
        })

        fetch(e.target.getAttribute('action'), {
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
            },
            method: 'POST',
            body: JSON.stringify(Object.fromEntries(new FormData(e.target))),
        }).then((response) => {
            return response.json();
        }).then((data) => {
            let hasError = 'errors' in data || !('message' in data);
            responseElement.style.color = hasError ? 'red' : 'green';
            responseElement.innerText = data.message;
            if (! hasError) {
                e.target.reset();
            }
        }).finally(() => {
            submits && submits.forEach((submit) => {
                submit.removeAttribute('disabled');
            })
        });
    });
});
