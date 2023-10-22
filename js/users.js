export default class Users {
    constructor() {
        this.rootElem = document.querySelector('.users'); // Finder HTML-elementet med klassen "users" og gemmer det i "rootElem."
    }

    init() {
        this.render(); // Kald "render()" for at initialisere visningen af brugerdata.
    }

    async render() {
        const data = await this.getData(); // Hent brugerdata ved hjælp af "getData()" funktionen.

        const row = document.createElement('data'); // Opret et nyt HTML-element (fejl: skal være 'div') for at indeholde brugerne.
        row.classList.add('row'); // Tilføj en CSS-klasse til det oprettede element.

        for (const item of data) { // Gennemgå hvert brugerobjekt i "data."

            const col = document.createElement('div'); // Opret et nyt element til hver bruger.
            col.classList.add('col-6'); // Tilføj en CSS-klasse til dette element.

            col.innerHTML = `
                <div class="bg-info">
                    <p>${item.name}</p> <!-- Vis brugerens navn. -->
                    <p>${item.age}</p> <!-- Vis brugerens alder. -->
                    
                    <!-- Vis brugerens foretrukne farver ved at gennemgå "favoriteColors" array. -->
                    ${item.favoriteColors.map(color => {
                return `<p>${color}</p>`;
            }).join('')}
                    
                    <!-- Vis brugerens interesser ved at gennemgå "hobbies" objektet. -->
                    ${Object.entries(item.hobbies).map(([h, l]) => {
                return `<p>${h}: ${l}</p>`;
            }).join('')}
                </div>
            `;

            row.appendChild(col); // Tilføj det oprettede brugerelement til listen af brugere.
        }

        this.rootElem.appendChild(row); // Tilføj den nye liste af brugere til HTML-elementet "rootElem."
    }

    async getData() {
        const response = await fetch('users.json'); // Hent brugerdata fra "users.json" filen.
        return await response.json(); // Returner resultatet som JSON-data.
    }
}
