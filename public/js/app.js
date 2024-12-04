document.addEventListener('DOMContentLoaded', function () {
    const deleteForms = document.querySelectorAll('.delete-form');

    deleteForms.forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const ideaId = this.dataset.id;

            fetch(`/ideas/${ideaId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                },
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to delete idea.');
                    }
                    return response.json();
                })
                .then(data => {
                    localStorage.setItem('successMessage', data.message);
                    location.reload();
                })
                .catch(error => {
                    console.error('Error:', error.message);
                    alert('Error: Could not delete the idea.');
                });
        });
    });

    const successMessage = localStorage.getItem('successMessage');
    if (successMessage) {
        const alertContainer = document.querySelector('.content-area');
        const alert = document.createElement('div');
        alert.className = 'alert alert-success alert-dismissible fade show';
        alert.role = 'alert';
        alert.innerHTML = `
            ${successMessage}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `;
        alertContainer.insertBefore(alert, alertContainer.firstChild);

        localStorage.removeItem('successMessage');
    }
});
