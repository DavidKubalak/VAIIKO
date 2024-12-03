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
                    // Set success message in local storage
                    localStorage.setItem('successMessage', data.message);

                    // Reload the page to show the updated list and message
                    location.reload();
                })
                .catch(error => {
                    console.error('Error:', error.message);
                    alert('Error: Could not delete the idea.');
                });
        });
    });

    // Display the success message from local storage
    const successMessage = localStorage.getItem('successMessage');
    if (successMessage) {
        const alertContainer = document.querySelector('.col-6');
        const alert = document.createElement('div');
        alert.className = 'alert alert-success alert-dismissible fade show';
        alert.role = 'alert';
        alert.innerHTML = `
            ${successMessage}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `;
        alertContainer.insertBefore(alert, alertContainer.firstChild);

        // Remove the message from local storage
        localStorage.removeItem('successMessage');
    }
});
