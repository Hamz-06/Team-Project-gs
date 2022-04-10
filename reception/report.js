window.onload = function report() {
    document.getElementById("download")
        .addEventListener("click", () => {
            const stockReport = this.document.getElementById("stockReport");
            console.log(stockReport);
            console.log(window);
            var opt = {
                margin: 0,
                filename: 'Report.pdf',
                image: { type: 'jpeg', quality: 1 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'cm', format: 'letter', orientation: 'landscape' }
            };
            html2pdf().from(stockReport).set(opt).save();
        })
}

