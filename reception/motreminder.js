//used to generate pdf using javascript for mot
window.onload = function motReminder() {
    document.getElementById("download")
        .addEventListener("click", () => {
            //action listner triggered
            const motReminder = this.document.getElementById("motreminderreport");
            console.log(motReminder);
            console.log(window);
            //options for mot reminder
            var opt = {
                margin: 0,
                filename: 'motReminder.pdf',
                image: { type: 'jpeg', quality: 1 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'cm', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(motReminder).set(opt).save();
        })
}