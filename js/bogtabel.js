export default class BogTabel {
    constructor() {
        this.data = {
            password: "KickPHP"
        }

        this.rootElem = document.querySelector('.bogtabel'); // Finder HTML-elementet med klassen "bogtabel" og gemmer det i "rootElem."
        this.filter = this.rootElem.querySelector('.filter'); // Finder filterelementet inden for "rootElem."
        this.items = this.rootElem.querySelector('.items'); // Finder liste-elementet inden for "rootElem."

        this.nameSearch = this.filter.querySelector('.nameSearch'); // Finder inputfeltet for nameSearch inden for "filter."
    }

    async init() {
        this.nameSearch.addEventListener('input', () => { // Tilføjer en eventlytter til inputfeltet for nameSearch.
            if (this.nameSearch.value.length >= 3) { // Hvis der er mindst 3 tegn i søgefeltet, udfør følgende:
                this.render(); // Kald "render()" for at opdatere listen over bøger.
            }
        });

        await this.render(); // Kald "render()" for at vise de første bøger, når siden indlæses.
    }

    async render() {
        const data = await this.getData(); // Hent bogdata ved hjælp af "getData()" funktionen.

        const row = document.createElement('div'); // Opret et nyt HTML-element (div) for at indeholde bøgerne.
        row.classList.add('row', 'g-4'); // Tilføj nogle CSS-klasser til det oprettede element.

        for (const item of data) { // Gennemgå hvert bogobjekt i "data."

            const col = document.createElement('div'); // Opret et nyt element til hver bog.
            col.classList.add('col-md-6', 'col-lg-4', 'col-xl-6'); // Tilføj CSS-klasser til dette element.

            col.innerHTML = `
               <div class="card d-xl-none mt-4 p-3 shadow h-100">
                    <img src="uploads/${item.bogBillede}" class="card-img-top img-fluid" alt="bog">
                    <div class="card-body">
                        <h5 class="card-title">${item.bogTitel}</h5>
                        <hp class="card-text">${item.bogBeskrivelse}</hp>
                        <a href="books.php?bogId=${item.bogId}" class="btn btn-primary text-white w-100">Se bogen</a>
                    </div>
               </div>
               
               <div class="d-none d-xl-block bg-white shadow border border-1 border-light-subtle rounded-4 h-100 p-3">
                   <div class="row h-100">
                        <div class="col-lg-8 d-flex flex-column">
                            <h5 class="">${item.bogTitel}</h5>
                            
                            <div class="">${item.bogBeskrivelse}</div>  
                          
                            <a href="books.php?bogId=${item.bogId}" class="btn btn-primary text-white w-50 mt-auto">Se bogen</a>
                        </div>
                        <div class="col-lg-4">
                            <img src="uploads/${item.bogBillede}" class="card-right img-fluid" alt="bog">
                        </div>
                   </div>
               </div>               
            `;

            row.appendChild(col); // Tilføj det oprettede bogelement til listen af bøger.
        }

        this.items.innerHTML = ''; // Ryd den gamle liste af bøger.
        this.items.appendChild(row); // Tilføj den nye liste af bøger til HTML-elementet.
    }

    async getData() {
        /* Note: this.data er objektet oppe i toppen der indeholder password. Det udbygger vi med nameSearch,
           så der også kommer til at ligge en nameSearch i også - Det får så værdien af nameSearch value (inputfeltet på shop siden) */
        this.data.nameSearch = this.nameSearch.value; // Tilføj værdien fra søgefeltet til data-objektet.

        const response = await fetch('api.php', {
            method: "POST",
            body: JSON.stringify(this.data) // Send data-objektet til en API ved hjælp af POST-anmodning.
        });
        return await response.json(); // Returner resultatet fra API som JSON-data.
    }
}
