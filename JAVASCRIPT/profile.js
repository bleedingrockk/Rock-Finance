    function validateForm() {
            var fullName = document.getElementById('full_name').value;
            var gender = document.getElementById('gender').value;
            var email = document.getElementById('email').value;
            var phoneNumber = document.getElementById('phone_number').value;
            var address = document.getElementById('address').value;
            var fatherName = document.getElementById('father_name').value;
            var motherName = document.getElementById('mother_name').value;
            var nomineeName = document.getElementById('nominee_name').value;
            var nationality = document.getElementById('nationality').value;

            // Check if required fields are filled
            if (fullName === '' || gender === '' || email === '' || phoneNumber === '' || address === '' ||
                fatherName === '' || motherName === '' || nomineeName === '' || nationality === '') {
                alert('Please fill in all required fields.');
                return false;
            }

            // Check if the email format is valid
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('Please enter a valid email address.');
                return false;
            }

            // Check if the phone number format is valid
            var phonePattern = /^\d{10}$/;
            if (!phonePattern.test(phoneNumber)) {
                alert('Please enter a valid 10-digit phone number.');
                return false;
            }

            // Additional validation can be added based on your requirements

            return true;
        }

// ----------------------------OVERLAY----------------------------------



function openOverlay() {
    var overlay = document.querySelector('.edit_overlay');
    var backdrop = document.getElementById('backdrop');
    
    // Apply styles before changing display to 'flex'
    overlay.style.opacity = '0';
    backdrop.style.display = 'flex';
    backdrop.style.filter = 'blur(0)';

    setTimeout(function () {
        overlay.style.display = 'flex';
        backdrop.style.filter = 'blur(5px)'; // Adjust the blur amount as needed
        overlay.style.opacity = '1';
    }, 100);
}

function closeOverlay() {
    var overlay = document.querySelector('.edit_overlay');
    var backdrop = document.getElementById('backdrop');

    overlay.style.opacity = '0';
    backdrop.style.filter = 'blur(0)';

    setTimeout(function () {
        overlay.style.display = 'none';
        backdrop.style.display = 'none';
    }, 100); // Adjust the time to match your transition duration
}
