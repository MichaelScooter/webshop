export default class BogTabel{
    constructor() {
        this.data = {
            password: "KickPHP"
        }

        this.rootElem = document.querySelector('.bogtabel');
        this.filter = this.rootElem.querySelector('.filter');
        this.items = this.rootElem.querySelector('.items');

        this.nameSearch = this.filter.querySelector('.nameSearch');

    }

     async init(){
        this.nameSearch.addEventListener('input', () =>{
            if(this.nameSearch.value.length >= 3){
                this.render();
            }

        });

        await this.render();
    }

    async render(){
        const data = await this.getData();
        console.log(data);

        const row = document.createElement('div');
        row.classList.add('row', 'g-4');

        for (const item of data){

            const col = document.createElement('div');
            col.classList.add('col-md-6', 'col-lg-4', 'col-xl-6');

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

            row.appendChild(col);
        }

        this.items.innerHTML = '';
        this.items.appendChild(row);

    }

    async getData(){

        /* Note: this.data er objektet oppe i toppen der indeholder password. Det udbygger vi med nameSearch,
           så der også kommer til at ligge en nameSearch i også - Det får så værdien af nameSearch value (inputfeltet på shop siden) */
        this.data.nameSearch = this.nameSearch.value;

        const response = await fetch('api.php', {
            method: "POST",
            body: JSON.stringify(this.data)
        });
        return await response.json();

    }
}