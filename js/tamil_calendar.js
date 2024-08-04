document.addEventListener('DOMContentLoaded', function() {
    // Define the times for each day of the week
    const times = {
        'Sunday': {'Rahu Kalam': '04:30 - 06:00', 'Yamagandam': '12:00 - 01:30'},
        'Monday': {'Rahu Kalam': '07:30 - 09:00', 'Yamagandam': '10:30 - 12:00'},
        'Tuesday': {'Rahu Kalam': '03:00 - 04:30', 'Yamagandam': '09:00 - 10:30'},
        'Wednesday': {'Rahu Kalam': '12:00 - 01:30', 'Yamagandam': '07:30 - 09:00'},
        'Thursday': {'Rahu Kalam': '01:30 - 03:00', 'Yamagandam': '06:00 - 07:30'},
        'Friday': {'Rahu Kalam': '10:30 - 12:00', 'Yamagandam': '03:00 - 04:30'},
        'Saturday': {'Rahu Kalam': '09:00 - 10:30', 'Yamagandam': '01:30 - 03:00'}
    };

    // Define a simple mapping of Gregorian dates to Tamil dates
    const tamilDates = {
        '2024-08-01': '17 ஆடி 2024',
        '2024-08-02': '17 ஆடி 2024',
        // Add more date mappings as needed
    };

    // Get the current date and day
    const currentDate = new Date();
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const dayName = currentDate.toLocaleDateString('en-US', { weekday: 'long' });
    const currentDateString = currentDate.toISOString().split('T')[0]; // Format: YYYY-MM-DD

    // Display the English date
    document.getElementById('english-date').textContent = 'English Date: ' + currentDate.toLocaleDateString('en-US', options);

    // Display the Tamil date based on the mapping
    const tamilDate = tamilDates[currentDateString] || 'N/A';
    document.getElementById('tamil-date').textContent = 'Tamil Date: ' + tamilDate;

    // Display the Rahu Kalam and Yamagandam times
    if (times[dayName]) {
        document.getElementById('ravukalam').textContent = 'ராவுக்காலம்: ' + times[dayName]['Rahu Kalam'];
        document.getElementById('yamagandam').textContent = 'எமகண்டம்: ' + times[dayName]['Yamagandam'];
    } else {
        document.getElementById('ravukalam').textContent = 'ராவுக்காலம்: N/A';
        document.getElementById('yamagandam').textContent = 'எமகண்டம்: N/A';
    }
});
