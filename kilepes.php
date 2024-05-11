<script>
(function() {
    let days = ["Hétfő", "Kedd", "Szerda", "Csütörtök", "Péntek", "Szombat", "Vasárnap"];
    let currentDayIndex = new Date().getDay();
    currentDayIndex = (currentDayIndex === 0) ? 6 : currentDayIndex - 1; // Ha vasárnap (0), akkor legyen 6, különben csökkentsük 1-gyel
    console.log("A mai nap: " + days[currentDayIndex]);

    var currentDayElement = document.querySelectorAll('.list-hours li')[currentDayIndex];
    if (currentDayElement) {
        currentDayElement.classList.add('today');
    }
})();
</script>