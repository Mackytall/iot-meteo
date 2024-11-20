
function afficherTemp() {
    document.querySelector('.mesure-temperature').classList.remove("display-none")
    document.querySelector('.mesure-humidite').classList.add("display-none")
    
}

function cacherTemp() {
    document.querySelector('.mesure-humidite').classList.remove("display-none")
    document.querySelector('.mesure-temperature').classList.add("display-none")
    console.log(document.querySelector('.mesure-temperature').classList)
}
    
function afficherLoc() {
    document.querySelector('.graphique').classList.remove("display-none")
    document.querySelector('.localisation').classList.add("display-none")
}

function cacherLoc() {
    document.querySelector('.localisation').classList.remove("display-none")
    document.querySelector('.graphique').classList.add("display-none")
}
