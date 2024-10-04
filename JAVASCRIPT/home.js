function openOverlay() {
    var overlay = document.querySelector('.newpayment_overlap');
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
    var overlay = document.querySelector('.newpayment_overlap');
    var backdrop = document.getElementById('backdrop');

    overlay.style.opacity = '0';
    backdrop.style.filter = 'blur(0)';

    setTimeout(function () {
        overlay.style.display = 'none';
        backdrop.style.display = 'none';
    }, 100); // Adjust the time to match your transition duration
}

// Assuming you have included jQuery and Bootstrap JS
