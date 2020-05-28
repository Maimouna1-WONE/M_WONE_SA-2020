const btnAddUser = document.getElementById("btnAddUser");
const btnDbMtn = document.getElementById("btnDbMtn");
const btnAffMil = document.getElementById("btnAffMil");
const btnPlRich = document.getElementById("btnPlRich");
const btnTotal = document.getElementById("btnTotal");
const tBodyUsers = document.getElementById("tBodyUsers");
const spanTotal = document.getElementById("spanTotal");

function User(apiUser) {
    return {
        picture: apiUser.picture.thumbnail,
        name: `${apiUser.name.first} ${apiUser.name.last}`,
        nationalite: apiUser.nat,
        tel: apiUser.phone,
        money: Math.floor(Math.random() * 1000000)
    }
}

let users = [];
getData(4);
async function getData(nbre = 1) {
    const res = await fetch(`https://randomuser.me/api?results=${nbre}`);
    const data = await res.json();
    const users = data.results;
    users.forEach((apiUser) => {
        let newUser = new User(apiUser);
        addData(newUser);
    })
}

//genere un tr dans la table et d'ajouter un utilisateur dans le tableau users
function addData(user, add = true) {
    //ajouter un utilisateur dans le tableau users
    if (add) {
        users.push(user);
    }
    //genere un tr dans la table tBodyUsers
    const tr = document.createElement("tr");
    for (let key in user) {
        const td = document.createElement("td");
        if (key == "picture") {
            const divImg = document.createElement("div");
            divImg.setAttribute("class", "text - center ");
            const img = document.createElement("img");
            img.setAttribute("src", user.picture);
            img.setAttribute("class", "rounded");
            divImg.appendChild(img);
            td.appendChild(divImg);
        } else {
            td.innerText = user[key];
        }
        tr.appendChild(td);
    }
    tBodyUsers.appendChild(tr);
    total();
}

doubleMtn = () => {
    users = users.map(user => {
        user.money *= 2;
        return user;
    });
    refreshTable();
}

function refreshTable() {
    tBodyUsers.innerHTML = "";
    users.forEach((user) => {
        addData(user, false);
    })
}

function getMill() {
    users = users.filter((user) => {
        return user.money >= 300000;
    })
    refreshTable();
}

function PlusRich() {
    users.sort((a, b) => {
        return b.money - a.money;
    })
    refreshTable();
}

function total() {
    const tot = users.reduce((somme, user) => {
        return somme += user.money;
    }, 0);
    spanTotal.innerText = tot;
}

btnAddUser.addEventListener("click", getData);
btnDbMtn.addEventListener("click", doubleMtn);
btnAffMil.addEventListener("click", getMill);
btnPlRich.addEventListener("click", PlusRich);
btnTotal.addEventListener("click", total);