console.log("bonjour");

var items 
var monstres

fetch("http://127.0.0.1:8000/api/items")
.then((response) => response.json())
.then((data) => {
    
    data["hydra:member"].forEach(item => {
        
        const items_container = document.querySelector(".items_container")
        let div_item = document.createElement("div")
        
        div_item.classList.add("div_item")
        div_item.innerHTML = "<div class='div_item_name'>" + item.nomItem + "</div>" + item.descriptionItem
        items_container.appendChild(div_item)
        
    })
})

fetch("http://127.0.0.1:8000/api/monstres")
.then((response) => response.json())
.then((data) => {
    
    data["hydra:member"].forEach(monstre => {
        
        const monstres_container = document.querySelector(".monstres_container")
        let div_monstre = document.createElement("div")
        
        div_monstre.classList.add("div_monstre")
        div_monstre.innerHTML = "<div class='div_monstre_name'>" + monstre.nomMonstre + "</div>PV max : " + monstre.PVmaxMonstre + "<br>Attaque : " + monstre.attaqueMonstre
        monstres_container.appendChild(div_monstre)
        
    })
})

fetch("http://127.0.0.1:8000/api/zones")
.then((response) => response.json())
.then((data) => {
        
    data["hydra:member"].forEach(zone => {
        
        const zones_container = document.querySelector(".zones_container")

        let div_zone = document.createElement("div")
        
        div_zone.classList.add("div_zone")
        div_zone.innerHTML = "<div class='div_zone_name'>" + zone.nomZone + "</div>" + zone.descriptionZone
        zones_container.appendChild(div_zone)
        
    })
})

