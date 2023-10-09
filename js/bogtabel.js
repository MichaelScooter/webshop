export default class BogTabel{
    constructor() {
        this.data = {
            password: "KickPHP"
        }

        this.rootElem = document.querySelector('.bogtabel');
        this.filter = this.rootElem.querySelector('.filter');
        this.items = this.rootElem.querySelector('.items');

    }

     async init(){
        await this.render();
    }

    async render(){
        const data = await this.getData();
        console.log(data);

        const row = document.createElement('data');
        row.classList.add('row', 'g-4');

        for (const item of data){

            const col = document.createElement('div');
            col.classList.add('col-md-6', 'col-lg-4', 'col-xl-3');

            col.innerHTML = `
               <div class="card">
                    <img src="uploads/${item.bogBillede}" class="card-img-top" alt="bog">
                    <div class="card-body">
                        <h5 class="card-title">${item.bogTitel}</h5>
                        <hp class="card-text">${item.bogBeskrivelse}</hp>
                        <a href="api.php?bogId=${item.bogId}" class="btn btn-primary text-white w-100">Se bogen</a>
                    
                    </div>
               </div>
            `;

            row.appendChild(col);
        }

        this.items.appendChild(row)

    }

    async getData(){
        const response = await fetch('api.php', {
            method: "POST",
            body: JSON.stringify(this.data)
        });
        return await response.json();

    }
}