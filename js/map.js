var map = L.map("map").setView([45.88309, 0.89213], 17.11);

L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
  attribution:
    '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);

L.marker([45.88309, 0.89213])
  .addTo(map)
  .bindPopup("Garage Pistons & Boulons")
  .openPopup();
