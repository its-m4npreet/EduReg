function validateForm() {
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const age = document.getElementById('age').value;
    const course = document.getElementById('course').value;
    const message = document.getElementById('message');

    message.innerHTML = '';

    if (name.length < 2) {
        showMessage('Name must be at least 2 characters.', 'error');
        return false;
    }

    if (!email.includes('@') || !email.includes('.')) {
        showMessage('Please enter a valid email.', 'error');
        return false;
    }

    if (age < 16 || age > 100) {
        showMessage('Age must be between 16 and 100.', 'error');
        return false;
    }

    if (!course) {
        showMessage('Please select a course.', 'error');
        return false;
    }

    showMessage('Submitting...', 'success');
    return true;
}

function showMessage(text, type) {
    const message = document.getElementById('message');
    message.innerHTML = `<span class="${type}">${text}</span>`;
}