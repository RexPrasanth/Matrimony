document.addEventListener('DOMContentLoaded', function() {
     // Define the Rahu Kalam and Yamagandam times for each day of the week
     const times = {
         'Sunday': {'Rahu Kalam': '04:30 - 06:00', 'Yamagandam': '12:00 - 01:30'},
         'Monday': {'Rahu Kalam': '07:30 - 09:00', 'Yamagandam': '10:30 - 12:00'},
         'Tuesday': {'Rahu Kalam': '03:00 - 04:30', 'Yamagandam': '09:00 - 10:30'},
         'Wednesday': {'Rahu Kalam': '12:00 - 01:30', 'Yamagandam': '07:30 - 09:00'},
         'Thursday': {'Rahu Kalam': '01:30 - 03:00', 'Yamagandam': '06:00 - 07:30'},
         'Friday': {'Rahu Kalam': '10:30 - 12:00', 'Yamagandam': '03:00 - 04:30'},
         'Saturday': {'Rahu Kalam': '09:00 - 10:30', 'Yamagandam': '01:30 - 03:00'}
     };
     // Define a dataset of Tamil dates
     const tamilDates = {
         
         '2024-08-30': '14 ஆவணி 2024',
         '2024-08-31': '15 ஆவணி 2024',
         '2024-09-01': '16 ஆவணி 2024',
         '2024-10-23': '06 ஜப்பசி 2024',
         '2024-10-24': '07 ஜப்பசி 2024',
         '2024-10-25': '08 ஜப்பசி 2024',
         '2024-10-26': '09 ஜப்பசி 2024',
         '2024-10-27': '10 ஜப்பசி 2024',
         '2024-10-28': '11 ஜப்பசி 2024',
         '2024-10-29': '12 ஜப்பசி 2024',
         '2024-10-30': '13 ஜப்பசி 2024',
         '2024-10-31': '14 ஜப்பசி 2024'
        
     };
     function getTamilDate(date) {
         const dateString = date.toISOString().split('T')[0]; // Format: YYYY-MM-DD
         return tamilDates[dateString] || 'N/A'; // Return 'N/A' if date not found in dataset
     }
     // Get the current date
     const currentDate = new Date();
     const dayName = currentDate.toLocaleDateString('en-US', { weekday: 'long' });
     // Update the English date
     document.getElementById('english-date').textContent = 'English Date: ' + currentDate.toLocaleDateString('en-US', {
         weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
     });
     // Update the Tamil date
     document.getElementById('tamil-date').textContent = 'தமிழ் தேதி: ' + getTamilDate(currentDate);
     // Update the Rahu Kalam and Yamagandam times
     if (times[dayName]) {
         document.getElementById('ravukalam').textContent = 'ராவுக்காலம்: ' + times[dayName]['Rahu Kalam'];
         document.getElementById('yamagandam').textContent = 'எமகண்டம்: ' + times[dayName]['Yamagandam'];
     } else {
         document.getElementById('ravukalam').textContent = 'ராவுக்காலம்: N/A';
         document.getElementById('yamagandam').textContent = 'எமகண்டம்: N/A';
     }
 });