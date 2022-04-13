//used to generate pdf using javascript for mot
window.onload = function invoice() {
    document.getElementById("download")
        .addEventListener("click", () => {
            //action listner triggered
            const invoice = this.document.getElementById("invoice");
            console.log(invoice);
            console.log(window);
            //options for mot reminder
            var opt = {
                margin: 0,
                filename: 'Invoice.pdf',
                image: { type: 'jpeg', quality: 1 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'cm', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}