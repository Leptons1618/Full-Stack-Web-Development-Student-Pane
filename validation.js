function validateForm() {
    let isValid = true;

    // Validate first name
    const firstName = document.getElementById("first_name").value.trim();
    if (firstName === "") {
        alert("Please enter your first name.");
        isValid = false;
    } else if (firstName.match(/\d+/g) != null) {
        alert("Please enter a valid first name.");
        isValid = false;
    } else if (firstName.match(/[!@#$%^&*(),.?":{}|<>]/g) != null) {
        alert("Please enter a valid first name.");
        isValid = false;
    }

    // Validate last name
    const lastName = document.getElementById("last_name").value.trim();
    if (lastName === "") {
        alert("Please enter your last name.");
        isValid = false;
    }

    // Validate email
    const email = document.getElementById("email").value.trim();
    if (email === "") {
        alert("Please enter your email address.");
        isValid = false;
    } else if (!isValidEmail(email)) {
        alert("Please enter a valid email address.");
        isValid = false;
    }

    // Validate phone number
    const phone = document.getElementById("phone").value.trim();
    if (phone === "") {
        alert("Please enter your phone number.");
        isValid = false;
    } else if (phone.length !== 10 || isNaN(phone) || phone.charAt(0) === '0' || phone.charAt(0) === '1') {
        alert("Please enter a valid phone number.");
        isValid = false;
    }

    return isValid;
}

function isValidEmail(email) {
    // Basic email validation, you may need to use a more robust method
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function isValidPhone(phone) {
    // Basic phone validation, you may need to use a more robust method
    const phoneRegex = /^[0-9]+$/;
    return phoneRegex.test(phone);
}