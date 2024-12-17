//1
document.getElementById('loginBtn').addEventListener('click', function() {
    document.getElementById('loginPopup').style.display = 'flex';
});

//2
document.querySelector('.close').addEventListener('click', function() {
    document.getElementById('loginPopup').style.display = 'none';
});

//3
window.addEventListener('click', function(event) {
    if (event.target == document.getElementById('loginPopup')) {
        document.getElementById('loginPopup').style.display = 'none';
    }
});

//4
document.getElementById('carSearch').addEventListener('input', function() {
    let filter = this.value.toUpperCase();
    let carList = document.getElementsByClassName('carro');
    
    for (let i = 0; i < carList.length; i++) {
        let title = carList[i].getElementsByTagName('h3')[0];
        if (title.innerHTML.toUpperCase().indexOf(filter) > -1) {
            carList[i].style.display = "";
        } else {
            carList[i].style.display = "none";
        }
    }
});

//5
document.getElementById("sortButton").addEventListener("click", function() {
    const grid = document.getElementById("carGrid");
    const carros = Array.from(grid.children);

    carros.sort((a, b) => {
        const nameA = a.getAttribute("data-name").toLowerCase();
        const nameB = b.getAttribute("data-name").toLowerCase();
        return nameA.localeCompare(nameB);
    });

    grid.innerHTML = "";
    carros.forEach(carro => grid.appendChild(carro));
});

//6
const grid = document.getElementById("carGrid");
const sortButton = document.getElementById("sortButton");

const originalOrder = Array.from(grid.children);    

let isSorted = false;

sortButton.addEventListener("click", function() {
    if (isSorted) {
        grid.innerHTML = ""; 
        originalOrder.forEach(carro => grid.appendChild(carro)); 
    } else {
        const carros = Array.from(grid.children);
        carros.sort((a, b) => {
            const nameA = a.getAttribute("data-name").toLowerCase();
            const nameB = b.getAttribute("data-name").toLowerCase();
            return nameA.localeCompare(nameB);
        });
        grid.innerHTML = ""; 
        carros.forEach(carro => grid.appendChild(carro)); 
    }
    isSorted = !isSorted; 
});