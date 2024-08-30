document.addEventListener('DOMContentLoaded', function() {
    // Simulated gold rates (You would replace this with API data)
    const goldRates = {
        '24k': 7315,  // Example value in INR per gram
        '22k': 6705,  // Example value in INR per gram
        '18k': 5486   // Example value in INR per gram
    };

    // Update the gold rates on the page
    document.getElementById('rate-24k').textContent = goldRates['24k'];
    document.getElementById('rate-22k').textContent = goldRates['22k'];
    document.getElementById('rate-18k').textContent = goldRates['18k'];
});
