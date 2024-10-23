document.addEventListener('DOMContentLoaded', function() {
    // Simulated gold rates (You would replace this with API data)
    const goldRates = {
        '24k': 8007,  // Example value in INR per gram
        '22k': 7340,  // Example value in INR per gram
        '18k': 6055   // Example value in INR per gram
    };

    // Update the gold rates on the page
    document.getElementById('rate-24k').textContent = goldRates['24k'];
    document.getElementById('rate-22k').textContent = goldRates['22k'];
    document.getElementById('rate-18k').textContent = goldRates['18k'];
});
